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
  private $subject = 'ejercicio AFP';
  private $greet = 'Buenas,<br> <p>En este correo se envío la siguiente información :</p><br>';

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
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'afpatlantida10@gmail.com';                     //SMTP username
      $mail->Password   = 'William$10';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('afpatlantida10@gmail.com', 'Orlin Gomez');
      $mail->addAddress($this->mainEmail);     //Add a recipient            
      if ($this->emailCc != '') {
        $mail->addCC($this->emailCc);
      }
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $this->subject;
      $mail->Body    =  $this->greet . 'Nombre: ' . $this->name . '<br>' . 
                        'Número de identidad: ' . $this->idNumber . '<br>' .
                        'Fecha de nacimiento: ' . $this->dateOfBirth . '<br>'.
                        'Dirección: ' . $this->address . '<br>'.
                        'Teléfono: ' . $this->phone . '<br>'.
                        'Correo: ' . $this->email . '<br>';

      
      if($mail->send()){        
        return true;
      }
    } catch (Exception $e) {      
      return false;
    }
  }
}
