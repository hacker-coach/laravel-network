<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class mailer{
	var $data = array();
	var $config = array();
	var $message = 'message';
	
	function setData($data){
		$this->data =  $data;		
	}

    function setConfig($config){
        $this->config =  $config;
    }

	function message(){
		return $this->message;
	}
	
	function sendMail(){
			// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);


		try {
			#$mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = $this->config['Host'];  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = $this->config['Username'];                     // SMTP username
			$mail->Password   = $this->config['Password'];                               // SMTP password
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 25;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom($this->data['addressEmailFROM'], $this->data['addressNameFROM']);
			$mail->addAddress($this->data['addressEmailTO'], $this->data['addressNameTo']);
			$mail->ContentType = 'text/plain'; 
			// Content
			$mail->isHTML(false);                                  // Set email format to HTML
			$mail->Subject = $this->data['subjectFROM'];
			$mail->Body = $this->data['txt'];

			$mail->CharSet = "UTF-8";

			$mail->send();
			$this->message = 'true';
		} catch (Exception $e) {
			$this->message = "false";
		}
	}
}
?>