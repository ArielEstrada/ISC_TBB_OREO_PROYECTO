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
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ITCHIIsocial</title>
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
  <!-- Archivos modificar el input file -->
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <!-- remove this if you use Modernizr -->
  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>



  <!-- codigo scroll -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.jscroll.js"></script>
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
  <!-- codigo scroll -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php echo Headerb (); ?>

<?php echo Side (); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

    <!-- Script validar caracteres -->
    <script type="text/javascript">    
    function validarn(e) {
    tecla = (document.all) ? e.keyCode : e.which;
   if (tecla==8) return true;
   if (tecla==9) return true;
   if (tecla==11) return true;
    patron = /[A-Za-zñ!#$%&()=?¿¡*+0-9-_á-úÁ-Ú :;,.]/;
 
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 
    </script>
    <!-- Script validar caracteres -->

      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- /.box -->
          <div class="row">
            
            
            <!-- CAJA QUÉ ESTÁS PENSANDO? -->
            <div class="col-md-12">              
              <div class="box box-primary direct-chat direct-chat-warning" >
                <div class="box-header with-border">
                  <h3 class="box-title">¿Qué estás pensando?</h3>

                 
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
              </div>

              <!-- /.box-body -->
                <div class="box-footer">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <textarea name="publicacion" onkeypress="return validarn(event)" placeholder="¿Qué estás pensando?" class="form-control" cols="200" rows="3" required></textarea>
                      <br><br><br><br>

                    
                    <br>

                      <button type="submit" name="publicar" class="btn btn-primary btn-flat">Publicar</button>
                    </div>
                  </form>
                  <?php
                  if(isset($_POST['publicar'])) 
                  {
                    $publicacion = $_POST['publicacion'];

                    $data = mysqli_fetch_assoc($result);
                    $next_increment = $data['Auto_increment'];

                    $query= "insert into publicaciones (NoControl,fecha,contenido,comentarios)
                              values ('".$_SESSION['NoControl']."',now(),'$publicacion','1')";

                    $subir = mysqli_query($connect,$query);

                    if($subir) {echo '<script>window.location="index.php"</script>';}else if(isset($_POST['publicar'])){?>
                      <br>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Estamos experimentando dificultades, inténtalo mas tarde :(
            </div>
                      <?php

                    }

                  }      
                  ?>           
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->            
          </div>
          <!-- /.row -->


<script type="text/javascript" src="js/likes.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $(".enviar-btn").keypress(function(event) {

      if ( event.which == 13 ) {

        var getpID =  $(this).parent().attr('NoControl').replace('record-','');

        var NoControl = $("input#NoControl").val();
        var comentario = $("#comentario-"+getpID).val();
        var publicacion = getpID;
        
        var nombre = $("input#nombre").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        if (comentario == '') {
            alert('Debes añadir un comentario');
            return false;
        }

        var dataString = 'NoControl=' + NoControl + '&comentario=' + comentario + '&publicacion=' + publicacion;

        $.ajax({
                type: "POST",
                url: "agregarcomentario.php",
                data: dataString,
                success: function() {
                    $('#nuevocomentario'+getpID).append('<div class="box-comment"><img class="img-circle img-sm" src="avatars/defect.jpg"><div class="comment-text"><span class="username"> '+ nombre +'<span class="text-muted pull-right">' + date_show + '</span></span>' + comentario + '</div></div>');
                }
        });
        return false;
      }
    });

});
</script>

<?php
$CantidadMostrar=10;
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =mysqli_query($connect,"select * from publicas");
  $totalr = mysqli_num_rows($TotalReg);
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($totalr/$CantidadMostrar);
   //Operacion matematica para mostrar los siquientes datos.
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
  //Consulta SQL
  $consultavistas ="select * from publicas ORDER BY id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=mysqli_query($connect,$consultavistas);
  while ($lista=mysqli_fetch_array($consulta)) {

    $userid = $lista['NoControl'];

    $usuariob = mysqli_query($connect,"select * from usuario WHERE NoControl = '$userid'");
    $use = mysqli_fetch_array($usuariob);
   
    
  ?>
  
  <!-- START PUBLICACIONES -->
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="avatars/defect.jpg ?>" alt="User Image">
                <span class="description" ><?php echo $use['NoControl'];?></span>

                <span class="description" ><?php echo $lista['fecha'];?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><?php echo $lista['contenido'];?></p>

              

              <br><br>
              <?php 
              $numcomen = mysqli_num_rows(mysqli_query($connect,"select * from comentarios WHERE publicacion = '".$lista['id_pub']."'"));
              ?>
              <!-- Social sharing buttons -->
            <ul class="list-inline">

              

                <li><div class="btn btn-default btn-xs like" name = "nike" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> Me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['likes']; ?>)</span></li>

              
                
                <li><div class="btn btn-default btn-xs like" name = "noke" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> No me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['disklikes']; ?>)</span></li>

              <?php
              $Lqry = "insert into likes (NoControl,id_pub,fecha,tipo) values ('".$_SESSION['NoControl']."','".$lista['id_pub']."',now(),1)";
              $Dqry = "insert into likes (NoControl,id_pub,fecha,tipo) values ('".$_SESSION['NoControl']."','".$lista['id_pub']."',now(),0)";
              if (isset(($_POST['nike']))) {
                $ex = mysqli_query($connect,$Lqry);
              }else if (isset(($_POST['noke']))) {
                $ax = mysqli_query($connect,$Dqry);
              }



              ?>



                    <li class="pull-right">
                      <span href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (<?php echo $numcomen; ?>)</span></li>
                  </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">

            <?php 
            $comentarios = mysqli_query($connect,"select * from comentarios WHERE publicacion = '".$lista['id_pub']."' ORDER BY id_com desc LIMIT 2");
            while($com=mysqli_fetch_array($comentarios)){
              $usuarioc = mysqli_query($connect,"select * from usuario WHERE NoControl = '".$com['NoControl']."'");
              $usec = mysqli_fetch_array($usuarioc);
              ?>


              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="avatars/defect.jpg">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $usec['NoControl'];?>
                        <span class="text-muted pull-right"><?php echo $com['fecha'];?></span>
                      </span><!-- /.username -->
                  <?php echo $com['comentario'];?>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <?php } ?>

              <?php if ($numcomen > 2) { ?> 
              <br>
                <center><span onclick="location.href='index.php?NoControl=<?php echo $lista['id_pub'];?>';" style="cursor:pointer; color: #3C8DBC;">Ver todos los comentarios</span></center>
              <?php } ?>

              <div id="nuevocomentario<?php  echo $lista['id_pub'];?>"></div>
              <br>
                <form method="post" action="">
                <label id="record-<?php  echo $lista['id_pub'];?>">
                <input type="text" class="enviar-btn form-control input-sm" style="width: 690px;" placeholder="Escribe un comentario" name="comentario" id="comentario-<?php  echo $lista['id_pub'];?>">
                <input type="hidden" name="NoControl" value="<?php echo $_SESSION['NoControl'];?>" id="NoControl">
                <input type="hidden" name="publicacion" value="<?php echo $lista['id_pub'];?>" id="publicacion">
                
                <input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre'];?>" id="nombre">
                </form>

              </div>

        </div>
        <!-- /.col -->
        <!-- fin PUBLICACIONES -->
    
    <br>

  <?php
  }
  //Validmos el incrementador par que no genere error
  //de consulta.  
    if($IncrimentNum<=0){}else {
  echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
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
                  <?php $registrados = mysqli_query($connect,"select NoControl, nombre,fecha_reg from usuario order by NoControl desc limit 3");
                  while($reg=mysqli_fetch_array($registrados)) {
                  ?>
                    <li>
                      <img src="avatars/defect.jpg" alt="User Image" width="100" height="200">
                      <a class="users-list-name" href="perfil.php?NoControl=<?php echo $reg['NoControl'];?>"><?php echo $reg['nombre']; ?></a>
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






  


  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Actividad Reciente</h3>
        <ul class="control-sidebar-menu">
          <?php 
      $consulta= "select fecha_reg from usuario where NoControl ='".$_SESSION['NoControl']."'";
      $fecha = mysqli_query($connect,$consulta);
      
      ?> 
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading"></h4>

                <p>Te uniste el: </br>
                  <?php echo "hola mundo cruel"?>
              </div>
            </a>
          </li>
          
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Recordatorios</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                El proyecto de Taller de bases de datos
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          
          
          
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      
      <!-- /.tab-pane -->
    </div>

  </aside>
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
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- JS modificar diseño input file -->
<script src="js/custom-file-input.js"></script>
</body>
</html>
