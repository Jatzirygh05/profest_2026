<?php
require_once('mail/PHPMailer-6.5.3/src/SMTP.php');
require_once('mail/PHPMailer-6.5.3/src/PHPMailer.php');
require_once('mail/PHPMailer-6.5.3/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'festivales@cultura.gob.mx';          // Usuario SMTP
    $mail->Password = 'Feztivales_profest1';                           // Password SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Activar seguridad TLS
    $mail->Port = 25;                                    // Puerto SMTP
	$mail_envio="jghernandez@cultura.gob.mx";

    $mail->setFrom('festivales@cultura.gob.mx');		// Mail del remitente
    $mail->addAddress($mail_envio);     // Mail del destinatario
 
	$mensaje_enviar = "<table align='center' width='60%'>
			<tr>
				<td>
					<p><div style='font-family:Helvetica,Arial; font-size:18px; color:#FF0000'><strong>FAVOR DE NO CONTESTAR A ESTE CORREO, CUALQUIER DUDA O COMENTARIO FAVOR DE COMUNICARSE A profest@cultura.gob.mx</strong></div></p>
					<br>
					  <p><div style='font-family:Helvetica,Arial; font-size:18px'><strong>Atentamente<br>
                      Direcci&oacute;n General de Promoci&oacute;n y Festivales Culturales.</strong></div></p>
					  <br>
					  <div style='font-family:Helvetica,Arial; font-size:16px'>
					  <p>Estimada/o postulante  ".$nombre_usuario_reg_proyecto."<br>
                      Te damos la Bienvenida al Sistema PROFEST de la Secretar&iacute;a de Cultura, 
                      te informamos que tu cuenta ha sido activada correctamente:</p><br>
					  <p>Usuario: ".$cual_usu."</p>
					  <p>Contrase&#241;a: ".$cons_cual_primero."</p><br>
						<p>Te invitamos dirigirte a la Plataforma PROFEST para ingresar 
						tus datos e iniciar la postulaci&oacute;n: </p>
						<p>https://profest.cultura.gob.mx/</p><br>
						<p>Recibe un cordial saludo.</p>
					</div>
		  		</td>
       		</tr>
		</table>";
		

    $mail->isHTML(true);
    $mail->Subject = 'Cuenta activada';  // Asunto del mensaje
    $mail->Body    = $mensaje_enviar;    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
 
    $mail->send();
    //echo '<center>El mensaje ha sido enviado</center>';
} catch (Exception $e) {
    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
}
?>
