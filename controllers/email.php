<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';

class Email
{
  private $name;
  private $idNumber;
  private $dateOfBirth;
  private $address;
  private $phone;
  private $email;
  private $mainEmail;
  private $emailCc;
  private $subject = 'challenge AFP';
  private $greet = 'Buenas,<br> <p>En este correo se envio la siguiente informacion :</p><br>';

  public function __construct($data, $emailClient)
  {
    $this->name  = $data['name'];
    $this->idNumber  = $data['idNumber'];
    $this->dateOfBirth  = $data['dateOfBirth'];
    $this->address  = $data['address'];
    $this->phone  = $data['phone'];
    $this->email  = $data['email'];
    $this->mainEmail  = $emailClient['mainEmail'];
    $this->emailCc  = $emailClient['emailCc'];
  }
  public function sendEmail()
  {    
    $mail = new PHPMailer(true);
    try {
      
      $mail->SMTPDebug = 0;                      
      $mail->isSMTP();                                            
      $mail->Host       = 'smtp.gmail.com';                     
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'afpatlantida10@gmail.com';             
      $mail->Password   = 'William$10';                           
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
      $mail->Port       = 587;                                    
      
      $mail->setFrom('afpatlantida10@gmail.com', 'Orlin Gomez');
      $mail->addAddress($this->mainEmail);     
      if ($this->emailCc != '') {
        $mail->addCC($this->emailCc);
      }
    
      $mail->isHTML(true);                                 
      $mail->Subject = $this->subject;
      $mail->Body    =  $this->greet . 'Nombre: ' . $this->name . '<br>' . 
                        'Numero de identidad: ' . $this->idNumber . '<br>' .
                        'Fecha de nacimiento: ' . $this->dateOfBirth . '<br>'.
                        'Direccion: ' . $this->address . '<br>'.
                        'Telefono: ' . $this->phone . '<br>'.
                        'Correo: ' . $this->email . '<br>';
      
      if($mail->send()){                
        return true;
      }
    } catch (Exception $e) {      
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
}
