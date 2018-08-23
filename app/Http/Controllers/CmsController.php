<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;

class CmsController extends Controller {

	/**
	 *
	 * @return Response
	 */
	public function contactus()
	{
		//
		return view('contact');
	}

	/**
	 *
	 * @return Response
	 */
	public function index()
	{
		$page_name = \Request::path();

		$page = Pages::where('slug', $page_name)->firstOrFail();

		return view('empty',array('content'=>$page->content));
	}

	public function test()
	{
		//dd(\Config::get('constant.admin_email'));
	}

	public function sendEmail(Request $request)
	{
		//json response
		$response = new \stdClass();
		$response->success = false;
		$response->msg = 'Error Occured in submitting.';
		$formData = $request->all();

		$title = 'Support Email Received';
		$body  = '<p><b>User Details</b></p>';

		foreach($formData as $key=>$data)
		{
			$body  .= "<p><b>$key </b>: $data</p>";
		}
		
		unset($formData['_token']);

		$formData['title'] = $title;
		$formData['body']  = $body;


		$response->email = $formData['email'];

		\Mail::send('emails.support', $formData, function($message) use($response)
		{
		    $message->to(\Config::get('constant.admin_email'), \Config::get('constant.siteowner'))->subject('Support Email Received');
		    $response->success = true;
		    $response->msg = 'Request submitted successfully.';
		});

		return json_encode($response);
	}
}
