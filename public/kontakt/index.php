<?php
require_once('../../config.php');
require 'mailer.php';
require 'function.php';

showError();
setNoBrowserCache();

$message = '';

if(isset($_POST) &&
!empty($_POST['mail'])  &&
!empty($_POST['name'])  &&
!empty($_POST['firma'])  &&
!empty($_POST['mitarbeiter'])  &&
!empty($_POST['problem'])  &&
!empty($_POST['art']) &&
!empty($_POST['phone']) &&
$_POST['send'] == 'on'
  ){
        $data['addressEmailTO'] =  $config['addressEmailTO'];
        $data['addressNameTo'] =  $config['addressNameTo'];

        $data['addressEmailFROM'] =   $config['addressEmailFROM'];
        $data['addressNameFROM'] = $config['addressNameFROM'];

        $data['subjectFROM'] = $config['subjectFROM'];

        $data['txt'] = getMailTxt();
        $mailer = new mailer();
        $mailer->setData($data);
        $mailer->setConfig($config);
        $mailer->sendMail();
        $message .= $mailer->message();
}

echo renderTemplate($message);


?>
