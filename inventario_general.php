<?php session_start();
  if (!isset($_SESSION['id_user'])) {
        header("location: login.php");
    exit;
  }
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  require_once ("ajax/buscar_seguimiento.php");
  
  $solicitud="active";
  $dashboard="";
  $active_grupos="";
  $proyectos=""; 
   $segmento=""; 
   $reportes="";  ?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mantiz</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      <link rel="stylesheet" type="text/css" href="css/facebook.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
      include("modal/agregar_obra.php");
      include("modal/agregar_material.php");
       include("modal/editar_obra.php");
       include("modal/cambiar_password.php");
       include("modal/seguimientos.php");
       ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('includes/menu.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php  include('includes/nav.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><b>Inventario General </b></h1>
                  <?php if($_SESSION['prol']=='administrador'   || $_SESSION['prol']=="Inv Principal"){?>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#nuevoPrograma"><i class="fas fa-user fa-sm text-white-50"></i> Nueva Obra</a>
                  <?php } ?>
            </div>

          <!-- DataTales Example -->
          
           <div id="resultados2"></div>
           <div class="outer_div2" id="outer_div2"></div>
                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#nuevoPrograma"><i class="fas fa-user fa-sm text-white-50"></i> Nuevo Material</a>
                <a href="#" class="btn btn-primary btn-icon-split" title='Ver seguimiento' onclick="segg(<?php echo $id;?>);" data-toggle="modal" data-target="#seguim">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Modaaaal1</span>
                  </a>
           <div id="resultados3"></div>
           <div class="outer_div3" id="outer_div3"></div>
          
          

        </div>

        <!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><b>Inventario General 1.1 </b></h1>
                  <?php if($_SESSION['prol']=='administrador'   || $_SESSION['prol']=="Inv Principal"){?>
                    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#nuevoPrograma"><i class="fas fa-user fa-sm text-white-50"></i> Nueva Obra</a>
                  <?php } ?>
            </div>

          <!-- DataTales Example -->
          
           <div id="resultados3"></div>
           <div class="outer_div3" id="outer_div3"></div>
          
          

        </div>
            
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('includes/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 <?php include('modal/logout.php'); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/obra.js"></script>
  <script src="js/materiales.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
