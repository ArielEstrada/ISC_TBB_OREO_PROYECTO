<?php
session_start();
include 'lib/config.php';

ini_set('error_reporting',0);

if(isset($_SESSION['NoControl']))
{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title> Registro</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
      .scroll{
        width: 100%;
      }
      .scroll .jscroll-loading{
        width: 10%;
        margin: -500px auto;
      }
      .btn-primary {

    background-color: #a40000;
    border-color: #a40000;

    }
    .btn-primary:hover {

    background-color: #a40000;
    border-color: #a40000;

    }
.box.box-primary {
    border-top-color: #a40000;
}
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>ITCHII</b>social</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Regístrate en ITCHIIsocial</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)" value="" required>
        <span class="glyphicon glyphicon-star form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="text" name="ap_p" class="form-control" placeholder="Apellido Paterno" value="" required>
        <span class="glyphicon glyphicon-star form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="text" name="ap_m" class="form-control" placeholder="Apellido Materno" value="" required>
        <span class="glyphicon glyphicon-star form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="NoControl" class="form-control" placeholder="No. Control" value="" required>  
        <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
      </div>
	<div class="form-group ">
        <select calss="form-control" name="career" id = "Carrera" value="" required>
        <option value="null">Carrera</option>
            <option value="ISC" name="isc">Ing en Sistemas Computacionales</option>
            <option value="INFO" name="info">Ing Informática</option>
            <option value="IDI" name="design">Ing en Diseño Industrial</option>
            <option value="LA" name="admin">Lic. en Administración</option>
            <option value="IGE" name="ige">Ing. en Gestión Empresarial</option>
            <option value="Arqui" name="arqui">Arquitectura</option>
            <option value="II" name="industrial">Ing. Industrial</option>
            
	</select>
	<span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <!--div class="form-group has-feedback"-->
        <!--input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?php// echo $_POST['usuario']; ?>" required-->
        <!--span class="glyphicon glyphicon-user form-control-feedback"--><!--/span-->
      <!--/div-->
      <div class="form-group has-feedback">
        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="repcontrasena" class="form-control" placeholder="Repita la contraseña" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-10">
          <div class="checkbox icheck">
          </div>
        </div>
        <div class="col-xs-12">
          <button type="submit" name="registrar" class="btn btn-primary btn-block btn-flat">Registrarme</button>
        </div>

      </div>
    </form>

    <?php

    if(isset($_POST['registrar'])) {
//mysqli_real_escape_string

      $nombre = $_POST['nombre'];
      $ap_p = $_POST['ap_p'];
      $ap_m = $_POST['ap_m'];
      $NoControl = $_POST['NoControl'];
      $carrera = $_POST['career'];
      $contrasena =$_POST['contrasena'];
      $repcontrasena = $_POST['repcontrasena'];
      
      $comprobarnocntrl = 0;
      //mysqli_num_rows(mysqli::query("SELECT NoControl FROM usuario WHERE NoControl = '$NoControl'"));
      //$connect->query("insert into usuarios (NoControl,nombre,contrasena,fecha_reg) values ('$NoControl','$nombre','$contrasena',now())");
      if ($contrasena != $repcontrasena) {?>

          <br>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Las contraseñas no coinciden
          </div>

          <?php
      }else if ($comprobarnocntrl>=1) { ?>
      
      <br>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        El numero de control ya esta registrado, por favor revise que sea correcto.
     </div>

     <?php }else{
      $sql= "insert into usuario (NoControl,nombre,ape_p,ape_m,contrasena,fecha_reg,carrera)
       values ('$NoControl','$nombre','$ap_p','$ap_m','$contrasena',now(),'$carrera')";
           $insertar = mysqli_query($connect, $sql);
            
            if ($insertar) {
              ?>

            <br>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Felicidades se ha registrado correctamente
            </div>

            <?php
            header("Location: login.php");
            }else{?>
              <br>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Ocurrió un problema durante el registro, intentalo mas tarde :'(
            </div>

            <?php
            }
     }
      /*

    if($comprobarnocntrl >= 1) { ?>
      
      <br>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        El numero de control ya esta registrado, por favor revise que sea correcto.
     </div>

     <?php } else {

          if($contrasena != $repcontrasena) { } else {


            $insertar = mysqli::query("INSERT INTO usuarios (NoControl,nombre,contrasena,fecha_reg) values ('$NoControl','$nombre','$contrasena',now())");

            if($insertar) { ?>

            <br>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Felicidades se ha registrado correctamente
            </div>

            <?php

            header("Refresh: 2; url = login.php");

            }else{ ?>

            <br>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Ocurrió un problema durante el registro, intentalo mas tarde :'(
            </div>

            <?php

            }

          }

        }

      }else{
        echo("Algo va mal :'v");
        */
      }

    

    ?>

    <br>
    <a href="login.php" class="text-center">Tengo actualmente una cuenta</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 y 3.4.0 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="plugins/jQuery/jquery-3.4.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
