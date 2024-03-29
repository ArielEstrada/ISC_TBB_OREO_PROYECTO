<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['NoControl']))
{
  header("Location: login.php");
}
?>

<?php
  if(isset($_GET['NoControl']))
  {
  $NoControl = $_GET['NoControl'];
  $pag = $_GET['perfil'];

  $infouser = mysqli_query($connect,"select * from vista_usuario WHERE NoControl = '$NoControl'");
  $use = mysqli_fetch_array($infouser);

  $amigos = mysqli_query($connect,"select * from amigos WHERE de = '$NoControl' AND para = '".$_SESSION['NoControl']."' OR de = '".$_SESSION['NoControl']."' AND para = '$NoControl'");
  $ami = mysqli_fetch_array($amigos);
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $use['nombre']; ?> | ITCHIIsocial</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- codigo scroll -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="js/jquery.jscroll.js"></script>
  <!-- codigo scroll -->

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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php echo Headerb (); ?>

  <?php echo Side (); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="avatars/defect.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $use['nombre'];?></h3> 
              <center><span class="glyphicon glyphicon-ok"></span></center>
              

              <p class="text-muted text-center"><?php echo $use['carrera'];?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nombre:</b> <a class="pull-right"><?php echo $use['nombre']; echo " "; echo $use['ape_p'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right"><?php echo $use['sexo'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Fecha de registro</b> <a class="pull-right"><?php echo $use['fecha_reg'];?></a>
                </li>
              </ul>
              
              <?php if($_SESSION['NoControl'] != $NoControl) {?>
              <form action="" method="post">
              
              <?php if(mysqli_num_rows($amigos) >= 1 AND $ami['estado'] == 0) { ?>
              <center><h4>Esperando respuesta</h4></center>
              <?php } else { ?>

              <?php if($use['privada'] == 1 AND $ami['estado'] == 0) { ?>
              <input type="submit" class="btn btn-primary btn-block" name="seguir" value="Enviar solicitud de amistad">
              <?php } ?>
              <?php if($use['privada'] == 1 AND $ami['estado'] == 1) { ?>
              <input type="submit" class="btn btn-danger btn-block" name="dejarseguir" value="Dejar de seguir">
              <?php } ?>
              <?php if($use['privada'] == 0 AND $ami['estado'] == 0) { ?>
              <input type="submit" class="btn btn-primary btn-block" name="seguirdirecto" value="Seguir">
              <?php } ?>
              <?php if($use['privada'] == 0 AND $ami['estado'] == 1) { ?>
              <input type="submit" class="btn btn-danger btn-block" name="dejarseguir" value="Dejar de seguir">
              <?php } ?>


              <?php } ?>
              </form>
              <?php } ?>

              <?php
              if(isset($_POST['seguir'])) {
                $add = mysqli_query($connect,"INSERT INTO amigos (de,para,fecha,estado) values ('".$_SESSION['NoControl']."','$NoControl',now(),'0')");
                if($add) {echo '<script>window.location="perfil.php?NoControl='.$NoControl.'"</script>';}
              }
              ?>

              <?php
              if(isset($_POST['seguirdirecto'])) {
                $add = mysqli_query($connect,"INSERT INTO amigos (de,para,fecha,estado) values ('".$_SESSION['NoControl']."','$NoControl',now(),'1')");
                if($add) {echo '<script>window.location="perfil.php?NoControl='.$NoControl.'"</script>';}
              }
              ?>

              <?php
              if(isset($_POST['dejarseguir'])) {
                $add = mysqli_query($connect,"DELETE FROM amigos WHERE de = '$NoControl' AND para = '".$_SESSION['NoControl']."' OR de = '".$_SESSION['NoControl']."' AND para = '$NoControl'");
                if($add) {echo '<script>window.location="perfil.php?NoControl='.$NoControl.'"</script>';}
              }
              ?>
              
              <br>
              <a href="chat.php?usuario=<?php echo $NoControl; ?>"><input type="button" class="btn btn-default btn-block" name="dejarseguir" value="Enviar chat"></a>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>

              <p class="text-muted">
                Algo sobre la escuelita
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> ¿Donde estoy?</strong>

              <p class="text-muted">Chihuahua, Chih.</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Abilidades</strong>

              <p>
                <span class="label label-danger">Intentar</span>
                <span class="label label-success">Acreditar</span>
                <span class="label label-info">Talled de Bases de Datos</span>
                <span class="label label-warning">En un</span>
                <span class="label label-primary">Día</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Extra</strong>

              <p>Si un arbol se cae en medio de un bosque y nadie lo escucha, ¿Hcae ruido?</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php echo $pag == 'miactividad' ? 'active' : ''; ?>"><a href="?NoControl=<?php echo $NoControl;?>&perfil=miactividad">Actividad</a></li>
              <li class="<?php echo $pag == 'informacion' ? 'active' : ''; ?>"><a href="?NoControl=<?php echo $NoControl;?>&perfil=informacion">Información</a></li>
              
            </ul>
            <div class="tab-content">

                
          <!-- codigo scroll -->
          <div class="scroll">

          

          </div>

            
                
              </div>
  
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php

} // finaliza if GET
?>
