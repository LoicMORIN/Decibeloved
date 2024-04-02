<?php

    // Import PHPMailer classes into the global namespace 
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception; 
    
    // Include PHPMailer library files 
    require 'PHPMailer/Exception.php'; 
    require 'PHPMailer/PHPMailer.php'; 
    require 'PHPMailer/SMTP.php'; 

    function email_inscription($to, $first_name,$last_name){
        $subject= "[DecibeLoved] Inscription confirmée";
        $message = file_get_contents('../email_template/inscription.php');
        $mailSent = send_mail_PHPMailer($to,$first_name.' '.$last_name,$subject,$message);
        
            
    }
    function send_mail_PHPMailer($to,$to_name,$subject,$message){        

        $mail = new PHPMailer(true); 
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                            
            $mail->isSMTP();                                                 
            $mail->Host = 'smtp.gmail.com';                                 
            $mail->SMTPAuth   = true;                                      
            $mail->Username = 'no.reply.soundsculptor@gmail.com';         
            $mail->Password = 'bkexlhwukuwmqkrh';                        
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port = 587;                                         
            $mail->SMTPSecure = "tls";
            //Recipients
            $mail->setFrom('no.reply@decibeloved.com', 'Decibeloved');
            $mail->addAddress($to,$to_name);    


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo '<br>Message has been sent';
            return true;
        } catch (Exception $e) {
            echo "<br>Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
?>
