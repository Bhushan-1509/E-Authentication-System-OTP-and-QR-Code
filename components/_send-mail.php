<?php
    include_once "PHPMailer/src/PHPMailer.php";
    include_once "PHPMailer/src/SMTP.php";
    include_once "PHPMailer/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class sendMail{ 
        public  $Mail;
        public function __construct()
        {
            $this->Mail = new PHPMailer(true);
            $this->Mail->SMTPDebug = 0;
            $this->Mail->isSMTP();
            $this->Mail->Host = "smtp.gmail.com";
            $this->Mail->SMTPAuth = true;
            $this->Mail->Username = "your_email_address";
            $this->Mail->Password = "your_password";
            $this->Mail->SMTPSecure = "tls";
            $this->SMTPAutoTLS = false;
            $this->Mail->Port = 587;
        
            $this->Mail->setFrom($this->Mail->Username,"E Authentication System");
        
        
        
        }
        public function sendOTP($inputOTP, $recieverAddr)
        {
           
           $this->Mail->addAddress($recieverAddr);
           $this->Mail->isHTML(false);                                  
           $this->Mail->Subject = 'OTP code';
           $this->Mail->Body    = 'Your One Time Passcode is '.$inputOTP;
           $this->Mail->AltBody = 'Your One Time Passcode is '.$inputOTP;
           $this->Mail->send();
        }

        public function sendAttachment($recieverAddr,$filePath){
            $this->Mail->addAddress($recieverAddr);
            $this->Mail->isHTML(false);                                  
            $this->Mail->Subject = 'QR code';
            $this->Mail->Body    = 'Please preserve this QR code for login';
            $this->Mail->AltBody = 'Please preserve this QR code for login';
            $this->Mail->addAttachment($filePath);
            $this->Mail->send();
         
        }
           

     }


?>
