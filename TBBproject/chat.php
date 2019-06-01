<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['NoControl']))
{
  header("Location: login.php");
}

if(isset($_GET['leido'])) {
  $leido = $_GET['leido'];
  $usuariod = $_GET['NoControl'];

  $tchats = mysqli_query($connect,"select * from chats WHERE de = '$usuariod' OR para = '$usuariod'");
  $tc = mysqli_fetch_array($tchats);
  if($tc['de'] != $_SESSION['NoControl']) {
  $update = mysqli_query($connect,"UPDATE chats SET leido = '1' WHERE de = '$usuariod' OR para = '$usuariod'");
  }
}
?>
<!DOCTYPE html>
<html>
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
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <style>
    
.btn-primary {

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
<?php
$num = 10;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chat
        <small><?php echo $num; ?> nuevos mensajes</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="chats.php?NoControl=<?php echo $_SESSION['NoControl'];?>" class="btn btn-primary btn-block margin-bottom">Escribir un nuevo mensaje</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Mis chats
                  <span class="label label-primary pull-right">10</span></a></li>
                  

              </ul>
            </div>
            <!-- /.box-body -->

          </div>
<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Amigos Chidos</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <?php
              
              $amiwos = "no tienes amiwos";
              ?>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i><?php echo $amiwos;?></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-message">
              


              


      <!-- Direct Chat -->
      <div class="row">
        <div class="col-md-12">
          <!-- DIRECT CHAT PRIMARY -->
            <div class="box-header with-border">
              <h3 class="box-title">Chat grupal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="overflow: scroll; height: 400px;">
                <?php
                $q1 = "select * from chats ";
                $r1 = mysqli_query($connect, $q1) ;
                
                while($row = mysqli_fetch_array($r1)) { 
                $message = $row['mensaje'] ;
                $user_name = $row['de'];
                $fecha = $row['fecha'];
                
                ?>
                  <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">

                    <span class="direct-chat-name pull-left"><?php echo '<h4 style ="color:red">' .$user_name.'</h4>'; ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo '<p>'.$fecha.'</p>'; ?></span>
                  </div>
                  
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="avatars/defect.jpg">
                  <div class="direct-chat-text">
                
                
                    <?php 

                          
                          echo '<p>'.$message.'</p>';
                          
                           ?>

                  </div>
                  
                </div>
                <?php
                
                }    
  if(isset($_POST['enviar'])){
  $message = $_POST['mensaje'] ;
  
  $q='insert into `chats` (`de`,`mensaje`,fecha)
   VALUES( "'.$_SESSION['NoControl'].'", "'.$message.'",now())
   ';
   if (mysqli_query($connect , $q)){
     echo '<h4 style ="color:red">'.$_SESSION['NoControl'].'</h4>';
     echo '<p>'.$message.'</p>';
   }
  }
  
                ?>

              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="" method="post">
                <div class="input-group">
                  <input type="text" name="mensaje" placeholder="Escribe un mensaje" class="form-control">
                      <span class="input-group-btn">
                        <input type="submit" name="enviar" class="btn btn-primary btn-flat">Enviar Mensaje</button>
                      </span>
                </div>
              </form>

              
              

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.col -->







              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
