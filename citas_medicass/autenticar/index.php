<?




//instancio un objeto de la clase PHPMailer
// $mail = new PHPMailer(); // defaults to using php "mail()"

// Función para generar un código de verificación aleatorio
// function generarCodigoVerificacion($longitud = 6) {
//     return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $longitud);
// }

// // Datos del usuario
// $emailUsuario = "correo@example.com";

// // obtiene el código de verificación
// $codigoVerificacion = generarCodigoVerificacion();

// Guardar el código de verificación en tu base de datos junto con el correo

/* guardar en db
//$emailUsuario = "correo@example.com";
// $codigoVerificacion = generarCodigoVerificacion();
 */




//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer();

// Una vez declarados los namespaces simplemente tenemos que instanciar las clases por su nombre


// $mail->isSMTP();
// $mail->Host = 'localhost';
// $mail->Port = 80; // Puerto por defecto de MailHog
// $mail->SMTPAuth = false; // MailHog no requiere autenticación por defecto


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'localhost';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'root';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 80;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   //Recipients
   $mail->setFrom('yordansolis2@gmail.com', 'Mailer');
   $mail->addAddress('antonito123456aas@gmail.com', 'Joe User');     //Add a recipient

       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Here is the subject';
       $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 $mail->send();
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com'





// $mail->Subject = 'Prueba de correo utilizando MailHog';
// $mail->Body = 'Este es un correo de prueba enviado con MailHog.';





         
                if (!$mail->send()) {
                    echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
                } else {
                    echo 'Mensaje enviado correctamente.';
                }


           





?>