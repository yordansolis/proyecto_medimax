<?php
  

// Generar un código de verificación -->  6 dígitos ALMACENAR EN DB
$codigo_verificacion = mt_rand(100000, 999999); 



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['email'])){
  extract($_POST);


  $email = $_POST['email'];

  // guardamos en la sesión el email	
  session_start();
  $_SESSION['email'] = $email;


try {
  //Server settings
//  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'antonito123456aas@gmail.com';                     //SMTP username
  $mail->Password   = 'ptxcgeqhvgmsgmiz';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



    //Recipients
    $mail->setFrom('antonito123456aas@gmail.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient

				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Codigo de verificación salud max';
				    $mail->Body    = 'Codigo de verificación. '.$codigo_verificacion. ' No comprata este codigo de verificación por ningun otro medio.'. '    !No responder este mensaje ¡' ;
				   

           $mail->send();
				    echo 'Le enviamos un codigo de verificación al correo... '.$email.' Revisar en la bandeja principal o en spam'; 


            function connect(){
              return new mysqli("localhost","root","","proyecto_final");
              }
              $con = connect();
              
             $sql = "INSERT INTO codigos(id_codigo) VALUES ('$codigo_verificacion')";
             
              if ($con->query($sql) === TRUE) {
                echo "Datos insertados correctamente";
              } else {
                echo "Error al insertar datos: " . $con->error;
              }
            
              // Cerrar conexión a la base de datos
              $con->close();
           // Redireccionar a una página específica
              header("Location: confir.php");
              exit();
            
            
       
            



				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
}else{
  echo '<h2> Debe iniciar sesión </h2>';
}
?>
