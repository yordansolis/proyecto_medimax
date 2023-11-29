<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../login.php');
  }
$id=$_SESSION['id'];
?>

<!doctype html>
<html lang="en">

<head>
  <title>Autenticar email</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
       .container{
           display: flex;
           justify-content: center;
       }
        
        .card{
            margin-top: 10%;         
            width: 50%;
            /* display: flex;
           justify-content: center; */
           display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
       
    </style>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

   <div class="container">


 
        <div class="card "> 
            
        
        <?php
       

    if (isset($_POST['enviar'])) {
        $codigo_post = $_POST['codigo'];
        # code...
       // echo  $codigo_post;

function connect(){
    return new mysqli("localhost","root","","proyecto_final");
    }
    $con = connect();
    
    $sql = "SELECT * FROM codigos  WHERE id_codigo= '$codigo_post'";;

    $result = $con->query($sql);
   

        // Verificar si la contraseña ingresada coincide con la contraseña almacen  
    if ($result->num_rows > 0) {

            // Si se encontró el codigo, verificar la contraseña
            $codigo_almacenado = $result->fetch_assoc();
          
           
            if ($codigo_post === $codigo_almacenado['id_codigo']) {
                
                // Redireccionar a una página específica y agregar a correo a la bd
                //obtenemos el email
                $email =   $_SESSION['email'];
                
              
                
                $sql = "UPDATE customers SET email='$email' WHERE codpaci = $id";

                if ($con->query($sql) === TRUE) {
                    echo "Datos actualizados correctamente";
                } else {
                    echo "Error al actualizar datos: " . $conn->error;
                }
            

                $con->close();

         


                header("Location: ../user.php");

            } else {
                echo "La codigo es el mismo no coincide ";
            }
    }else{
        echo '  
        </br> 
        <div class="alert alert-danger" role="alert">
            <strong>Error</strong> El codigo no coincide
        </div>
        
       ';
    }
  
    // Cerrar conexión a la base de datos
    // $con->close();
      
}
        ?>

<form action="" method="post">

    
            <div class="card-body">
                <h3>Le enviamos un codigo de verificación al correo. Revisar el bandeja principal o de spam</h2>
                <div class="mb-3">
                  <label for="codigo" class="form-label">Ingrese el codigo de verificación que le enviamos a su email.</label>
                  <input type="number"
                    class="form-control" 
                    name="codigo"
                    id="codigo"
                    placeholder="#-#-#-#-#" 
                    required
                    >
                </div>
                <button class="btn btn-primary" name="enviar" type="submit" >Confirmar</button>
            </div>
            
            
        </div>
        <br><br>

        </form>


    </div>
    <!-- </div> -->
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>