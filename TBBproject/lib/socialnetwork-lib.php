<?php

function Headerb () 

{
?>
<style>
body {
  background-color: lightblue;
}

.skin-blue .main-header .logo {
    background-color:#8d0303;
    color: #fff;
    border-bottom: 0 solid transparent;
}

.skin-blue .main-header .navbar {
    background-color: #a40000;
}
.skin-blue .main-header .logo:hover {
    background-color: #a40000;
}
</style>
<header class="main-header">

   
    <a href="index.php?NoControl=<?php echo $_SESSION['NoControl'];?>" class="logo">
      
      <span class="logo-lg"><b>ITCHII</b>social</span>
    </a>

    
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <?php
         
          $qry = "select fecha_reg from usuario where NoControl = '".$_SESSION['NoControl']."'";

          $reg = mysqli_query($connect,$qry);
          $raw = mysqli_fetch_array($reg);
          $fecha =  $raw['fecha_reg'];
          ?>

          

          <li class="dropdown user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="avatars/defect.jpg" class="user-image" alt="<?php echo ucwords($_SESSION['nombre']); ?>">
              
              <span class="hidden-xs"><?php echo ucwords($_SESSION['NoControl']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="avatars/defect.jpg" class="img-circle" alt="">
                <p>
                  <?php echo ucwords($_SESSION['NoControl']); ?>
                  <small>Miembro desde <?php echo $fecha;?></small>
                </p>
              </li>
              <!-- el bloque de arriba necesita una revisión mas no hace funcionar el bloque que sigue-->
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Seguidores</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Seguidos</a>
                  </div>
                </div>
                
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
<!-- END HEADER -->
<?php
}
?>

<?php
function Side ()

{
?>
<!-- START LEFT SIDE -->
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left">
          <img src="avatars/defect.jpg" width="50" alt="">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['NoControl']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Encuentra a tus amigos">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <?php 
      if(isset($_POST['search'])){
        header('Location: Busqueda.php');

        /*Busqueda.php?NoControl=<?php echo $_SESSION['NoControl']; echo $_search['q'];?>
        <li>
          <a href="#">
            <i class="fa fa-comment"></i> <span>No se que onda</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">1</small>
            </span>
          </a>
        </li>*/

     }

      ?>


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="index.php?NoControl=<?php echo $_SESSION['NoControl'];?>">
            <i class="fa fa-dashboard"></i> <span>Noticias</span>
          </a>
        </li>
        <li>
          <a href="chat.php?NoControl=<?php echo $_SESSION['NoControl'];?>">
            <i class="fa fa-comment"></i> <span>Chat</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">1</small>
            </span>
          </a>
        </li>
        <li>
          <a href="editarperfil.php?NoControl=<?php echo $_SESSION['NoControl'];?>">
            <i class="fa fa-user"></i> <span>Editar Perfil</span>
          </a>
        </li>
        
        <li>
          <a href="logout.php">
            <i class="fa fa-arrow-right"></i> <span>Cerrar sesión</span>
          </a>
        </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->

  </aside>
<!-- END LEFT SIDE -->

<?php
}
?>
