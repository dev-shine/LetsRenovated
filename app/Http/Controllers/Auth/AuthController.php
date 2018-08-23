<?php namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;


class AuthController extends Controller {

	protected $redirectTo = '/auth/successful';

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	public function getRegister()
	{
		$questions = User::getSecurityQuestions();
		return view('auth.register',compact('questions'));
	}


	public function postLogin(\Illuminate\Http\Request $request)	
	{
		/*Response Object*/
		$response  = [];
		$response['success'] = false;

		$validator = Validator::make($request->all(), [
			'email' => 'required|email', 'password' => 'required',
		]);

		if (!$validator->fails())
		{
			$credentials = $request->only('email', 'password');

			if ($this->auth->attempt($credentials, true))//$request->has('remember')
			{
				$response['success'] = true;
				$response['href'] 	 = '/event-center';
			}
			else
				$response['errors']  = 'Invalid email or password'; 
		}
		else {

			$response['errors'] = $validator->errors()->all();
		}
		
		

		return $response;
	}


	
	/**
	 * Handle a registration request for the application.
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister()
	{
		$formData  = Request::all(); 

		/*Response Object*/
		$response  = [];
		$response['success'] = false;

		$validator = $this->registrar->validator($formData);

		if (!$validator->fails())
		{
			$this->auth->login($this->registrar->create($formData));	
			$response['success'] = true;
			$response['href'] = '/account/successful';
			\Session::flash('registered',true);
		}
		else {

			$response['errors'] = $validator->errors()->all();
			//$response['errors'] = $validator->messages()->toArray();
		}
		
		return $response;
	}


	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
