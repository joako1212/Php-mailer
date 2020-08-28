<?php
$link=file_get_contents("plantilla.html");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
/* Exception class. */
require '../PHPMailer/src/Exception.php';
/* The main PHPMailer class. */
require '../PHPMailer/src/PHPMailer.php';
/* SMTP class, needed if you want to use SMTP. */
require '../PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
try {
    //Server settings
    // Habilitar la salida de depuración detallada
    $mail->SMTPDebug = 3;
    // enviar usando SMTP
    $mail->isSMTP();    
    //Configure el servidor SMTP para enviar                                        
    $mail->Host= 'smtp.gmail.com';   
    // Habilita la autenticación SMTP                 
    $mail->SMTPAuth= true;   
    //SMTP correo de gmail                              
    $mail->Username='alfredo.martinez@epasa.com';    
     // tu contraseña de entrar a gmail                
    $mail->Password='999abc22';                              
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Port =587;                              

    //el que envía el correo
    $mail->setFrom('smtp@localhost.com', 'Name');
    //el que recibe el correo
    $mail->addAddress('joakozamartinez@gmail.com', 'User');    
    
    // Contennido
    $mail->isHTML(true);   
    //Asunto del mensaje                               // Set email format to HTML
    $mail->Subject = 'Prueba php mailer';
    $mail->Body    = $link;
    $mail->AltBody = 'Este es el cuerpo en texto sin formato
    para clientes de correo que no son HTML';

    if($mail->send()){
    echo 'Mensaje enviado';
}
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}