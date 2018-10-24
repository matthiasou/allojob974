
<?php
require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
                   $message = file_get_contents('validation_Job/content.html'); 
                            $message = str_replace('%nom%', 'test', $message); 
                            $message = str_replace('%prenom%', 'test', $message);
                            $message = str_replace('%prenomJob%', 'test', $message); 
                            $mail = new PHPMailer(); 
                            $mail->IsSendMail(); // This is the SMTP mail server 
                            $mail->SMTPSecure = 'tls';
                            $mail->Host = "auth.smtp.1and1.fr";
                            $mail->Port = 465; 
                            $mail->SMTPAuth = true; 
                            $mail->Username = 'test@alloJob974.fr'; 
                            $mail->Password = 'Asterix1'; 
                            $mail->SetFrom('matthiasou@yahoo.fr', 'Allo Job 974'); 
                            $mail->AddReplyTo('matthiasou@yahoo.fr', 'Allo Job 974');
                            $mail->AddAddress('matthiasou@laposte.net'); 
                            $mail->Subject = "test final";
                            $mail->MsgHTML($message);
                            $mail->IsHTML(true); 
                            $mail->CharSet="utf-8";
                            if($mail->Send()) { 
                            }