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
<!DOCTYPE html>
<htmL>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDITAR MI PERFÍL</title>
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
<style>
    
.btn-primary {

    background-color: #a40000;
    border-color: #a40000;

}

.box.box-primary {
    border-top-color: #a40000;
}
  .btn-primary:hover {

    background-color: #a40000;
    border-color: #a40000;

    }
  </style>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php echo Headerb (); ?>

<?php echo Side (); ?>

<?php
if(isset($_GET['NoControl']))
{
$id = $_GET['NoControl'];

$miuser = mysqli_query($connect,"select * from vista_usuario where NoControl = '$NoControl'");
$use = mysqli_fetch_array($miuser);

if($_SESSION['NoControl'] != $id) {
?>
<script type="text/javascript">window.location="login.php";</script>
<?php
}
?>
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- /.box -->



          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar mi perfíl</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre(s)</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" value="<?php echo $use['nombre'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido Paterno</label>
                  <input type="text" name="ap_p" class="form-control" placeholder="Nombre completo" value="<?php echo $use['ape_p'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido Materno</label>
                  <input type="text" name="ap_m" class="form-control" placeholder="Nombre completo" value="<?php echo $use['ape_m'];?>">
                </div>
                <select calss="form-control" name="career" id = "Carrera" value="" required>
                    <option value="null">Carrera</option>
                    <option value="ISC" name="isc">Ing en Sistemas Computacionales</option>
                    <option value="IS" name="info">Ing Informática</option>
                    <option value="IDI" name="design">Ing en Diseño Industrial</option>
                    <option value="LA" name="admin">Lic. en Administración</option>
                    <option value="IGE" name="ige">Ing. en Gestión Empresarial</option>
                    <option value="Arqui" name="arqui">Arquitectura</option>
                    <option value="II" name="industrial">Ing. Industrial</option>
            
                </select>
                
                <div class="checkbox">
                  <label>
                    <input type="radio" value="Hombre" name="sexo" <?php if($use['sexo'] == 'Hombre') { echo 'checked'; } ?>> Hombre <br>
                    <input type="radio" value="Mujer" name="sexo" <?php if($use['sexo'] == 'Mujer') { echo 'checked'; } ?>> Mujer
                  </label>
                </div>

                <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Fecha de nacimiento</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="nacimiento" placeholder="<?php echo $use['nacimiento'];?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="actualizar" class="btn btn-primary">Actualizar datos</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <?php
          if(isset($_POST['actualizar']))
          {
            $nombre = $_POST['nombre'];
            //$NoControl = $_SESSION['NoControl'];
            $ape_p = $_POST['ap_p'];
            $ape_m = $_POST['ap_m'];
            $ncarrera = $_POST['career'];
            //$email = $_POST['email'];
            $sexo = $_POST['sexo'];
            $nacimiento = $_POST['nacimiento'];
            if($nacimiento != '') {$nac = $nacimiento;} else {$nac = $use['nacimiento'];}

            
            $sql = mysqli_query($connect,"update usuario set nombre = '$nombre',ape_p = '$ape_p',ape_m = '$ape_m, sexo = '$sexo', nacimiento = '$nac', carrera = '$ncarrera' WHERE NoControl = '".$_SESSION['NoControl']."'  ");

            if($sql) {
              echo "Datos actualizados correctamente";
          }else{
            echo "No se que onda; $nombre, '".$_SESSION['NoControl']."', $ape_p, $ape_m, $ncarrera, $sexo, $nacimiento";
            echo 'Algo fue mal, intentalo mas tarde';
          }

            

          }
          ?>


        </div>

        <div class="col-md-4">          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Solicitudes de amistad</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

              <?php $amistade = mysqli_query($connect,"select * from amigos where para = '".$_SESSION['NoControl']."' AND estado = '0' order by id_ami desc LIMIT 4");
              while($am = mysqli_fetch_array($amistade)) { 

                $use = mysqli_query($connect,"select * from usuario where NoControl = '".$am['de']."'");
                $us = mysqli_fetch_array($use);
                ?>
                <li class="item">
                  <div class="product-img">
                    <img src="avatars/defect.jpg ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                  <?php echo $us['NoControl']; ?>
                      <a href="solicitud.php?action=aceptar&NoControl=<?php echo $am['id_ami']; ?>"><span class="label label-success pull-right">Aceptar</span></a>
                      <br>
                      <a href="solicitud.php?action=rechazar&NoControl=<?php echo $am['id_ami']; ?>"><span class="label label-danger pull-right">Rechazar</span></a>
                        <span class="product-description">
                          <?php echo $us['sexo']; ?>
                        </span>
                  </div>
                </li>
                <!-- /.item -->

                <?php } ?>


              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <?php if(mysqli_num_rows($amistade) > 4) { ?>
              <a href="javascript:void(0)" class="uppercase">Ver todas las solicitudes</a>
              <?php } ?>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


        <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Últimos registrados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php $registrados = mysqli_query($connect,"select nombre,fecha_reg from usuario order by NoControl desc limit 8");
                  while($reg=mysqli_fetch_array($registrados)) 
                  {
                  ?>
                    <li>
                      <img src="avatars/defect.jpg" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $reg['nombre']; ?></a>
                      <span class="users-list-date"><?php echo $reg['fecha_reg']; ?></span>
                    </li>
                  <?php
                  }
                  ?>

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
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
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $("[data-mask]").inputmask();
  });
</script>
</body>
</html>
<?php } ?>