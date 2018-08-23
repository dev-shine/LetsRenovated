<?php

class MapInstance {
	
	//-----------------------------------------------------------------------------------------------
	// Class Variables
	//-----------------------------------------------------------------------------------------------	
	var $data;
	var $user_id;
	
	/**
	 * Constructor
	 */
	public function __construct() {

	}


	public function initialize(){

		$this->data = $_POST;

		$this->user = $this->get_user($this->user_id);

		
		///validate acceleration
		$this->hard_aceleration();

		/// out of geo fence
		$this->out_geo_fence();

		/// in destincation
		$this->in_destination();
	}	
	
	private function hard_aceleration(){

		$formData = $this->data;
		
		if($this->user['alerts'] && ($formData['z_axis'] > 3 || $formData['y_axis'] > 3) && $this->user['overspeed_alert']) {
			/// send email
			$this->sendemail('Acceleration Alert',"Axis acceleation is x-axis: {$formData['x_axis']} , y-axis: {$formData['y_axis']} and z-axis: {$formData['z_axis']}.");
			$this->update_user('overspeed_alert',0);
		}
	}

	private function out_geo_fence(){

		$formData = $this->data;
		
		if(isset($formData['out_geofence']) && $this->user['alerts'] && $this->user['geofence_alert']) {
			

			/// send email
			$this->sendemail('Geofence Alert','You have crossed out of geofence.');
			$this->update_user('geofence_alert',0);
		}
	}


	private function in_destination(){

		$formData = $this->data;
		
		if(isset($formData['in_dest']) && $this->user['alerts'] && $this->user['dest_alert']) {
			
			/// send email
			$this->sendemail('Destination Alert','You have reached in destination region.');
			$this->update_user('dest_alert',0);
		}
	}
	
	private function update_user($column,$value) {

		global $db;

		///update the item
		$query = "UPDATE tbl_userdetails SET $column = :value WHERE user_id = :user_id";
			
		$query_params = array( 
		':user_id' => $this->user_id,
		':value' => $value
		); 

		try { 
			$stmt = $db->prepare($query); 
			$result = $stmt->execute($query_params);
			$response->success = true;
		} 
		catch(PDOException $ex){ $response->error =  $ex->getMessage(); } 
	}

	private function get_user($user_id) {

		global $db;

		 /*Get all my previous saved markers*/
	    $query = "SELECT u.*, d.alerts,d.dest_alert,d.overspeed_alert,d.geofence_alert FROM users u INNER JOIN tbl_userdetails d 
				ON u.`id` = d.`user_id`
 				WHERE u.id = :user_id";

	    $query_params = array( ':user_id' => $user_id); 

	    try { 
	      $stmt = $db->prepare($query); 
	      $result = $stmt->execute($query_params); 
	    } 
	    catch(PDOException $ex){} 
	    return $stmt->fetch();
	}

	public function get_previous_gps($path_id) {

		global $db;

		 /*Get all my previous saved markers*/
	    $query = "SELECT gps_time FROM `tbl_routemarks` WHERE path_id = :path_id";

	    $query_params = array( ':path_id' => $path_id); 

	    try { 
	      $stmt = $db->prepare($query); 
	      $result = $stmt->execute($query_params); 
	    } 
	    catch(PDOException $ex){} 
	    return $stmt->fetch();
	}


	public function sendemail($subject,$message) {

		$email = $this->user['email'];
		$user_name = $this->user['username'];

		if(!$email)return false;

		//echo 'sending email';

		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Set who the message is to be sent from
		$mail->setFrom(SUPPORT_EMAIL, SUPPORT_NAME);
		/*//Set an alternative reply-to address
		$mail->addReplyTo('replyto@example.com', 'First Last');*/
		//Set who the message is to be sent to
		$mail->addAddress($email, $user_name);
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		$mail->msgHTML($message);
		
		/*//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		$mail->addAttachment('images/phpmailer_mini.png');*/

		//send the message, check for errors
		if (!$mail->send()) {
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		    return false;
		} else {
		    //echo "Message sent!";
		    return true;
		}
	}

	public function __destruct() {
	}


} // end class
?>