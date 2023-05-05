<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
class Mail extends model{


public function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  //$mail->Host       = "smtp.mail.yahoo.com";
  $mail->Username   = "foodforallgrp47@gmail.com";
  $mail->Password   = "darbfhbdjdmvlxfe";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "User");
  $mail->SetFrom("foodforallgrp47@gmail.com", "FoodForALL");
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    //echo "Error while sending Email.";
    //echo "<pre>";
    //var_dump($mail);
    return false;
  } else {
    //echo "Email sent successfully";
    return true;
  }

}

public function email_cert($recipient,$user_name,$event,$org)
    {

      $mail = new PHPMailer();
      $mail->IsSMTP();
    
      $mail->SMTPDebug  = 0;  
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      //$mail->Host       = "smtp.mail.yahoo.com";
      $mail->Username   = "foodforallgrp47@gmail.com";
      $mail->Password   = "darbfhbdjdmvlxfe";
      $subject = "testing";
      $message = "testing msg";

      $pdf = new Mail_cert();
      $pdf_attachment = $pdf->send_certificate($user_name,$event,$org);
    
      $mail->IsHTML(true);
      $mail->AddAddress($recipient, "User");
      $mail->SetFrom("foodforallgrp47@gmail.com", "FoodForALL");
      //$mail->AddReplyTo("reply-to-email", "reply-to-name");
      //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
      $mail->Subject = $subject;
      $content = $message;
      $mail->addStringAttachment($pdf_attachment,"Certificate.pdf");
      $mail->MsgHTML($content); 
      if(!$mail->Send()) {
        //echo "Error while sending Email.";
        //echo "<pre>";
        //var_dump($mail);
        return false;
      } else {
        //echo "Email sent successfully";
        return true;
      }
    }

}
?>