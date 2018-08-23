<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:255',
			'middle_name' => 'max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'address' => 'required',
			'city_state' => 'required',
			'postal_code' => 'required',
			'phone_1' => 'required',
			//'phone_2' => 'required',
			'answer_1' => 'required',
			'answer_1' => 'required',
			'question_1' => 'required',
			'question_2' => 'required'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		
		/*$secret = \Config::get('app.recaptcha_secret');

		//verify the recaptcha
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if($response.success == false) {
          
        } else {
          
        }*/

		return User::create([
			'first_name' => $data['first_name'],
			'middle_name' => $data['middle_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'address' => $data['address'],
			'city_state' => $data['city_state'],
			'postal_code' => $data['postal_code'],
			'phone_1' => $data['phone_1'],
			'phone_2' => $data['phone_2'],
			'answer_1' => $data['answer_1'],
			'answer_2' => $data['answer_2'],
			'question_1' => $data['question_1'],
			'question_2' => $data['question_2']
		]);
	}

}
