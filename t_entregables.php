<?php session_start();
  if (!isset($_SESSION['id_user'])) {
        header("location: login.php");
    exit;
  }
  if ($_SESSION['prol']=="administrador" || $_SESSION['prol']=="Inv Principal"  || $_SESSION['prol']=="Coinvestigador" || $_SESSION['prol']=="estudiante"){
      

  }else{
     header("location: index.php"); 
  }
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  $solicitud="active";
  $dashboard="";
  $active_grupos="";
  $proyectos=""; 
   $segmento=""; 
   $reportes="";  

   /*    $est='0'; */
       $id_p=$_GET['id_p'];
     $sql=mysqli_query($con,"SELECT * FROM proyecto WHERE codigo='".$id_p."'");
      $rws=mysqli_fetch_array($sql);
      $nombre=$rws["nombre_proyecto"];

      ?><!DOCTYPE html>
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
      include("modal/agregar_programas.php");
       include("modal/editar_programas.php");
       include("modal/cambiar_password.php");
       include("modal/comments.php");
       include("modal/entregable.php");
       include("modal/subir_archivo.php");
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
            <h1 class="h3 mb-0 text-gray-800"><b><?php echo $nombre; ?> </b></h1>
            <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#SubirArchivo"  ><i class="fas fa-folder fa-sm text-white-50"></i> Subir Archivos</a>

            
          </div>

          <div>

          <a href="#" class="btn btn-primary btn-icon-split" title='Entregables' onclick="segg(<?php echo $id_p;?>);" data-toggle="modal" data-target="#SubirArchivo">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Entregables</span>
                  </a> 
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#AgregarEntregable"><i class="fas fa-user fa-sm text-white-50"></i> Entregables</a>
          </div>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Entregables</th>
              </tr>
              <tbody>
                <?php
                $sql_entregable="SELECT * FROM entregables WHERE codigo_proyecto='$id_p'  /* id asc */";
                $query_entregable = mysqli_query($con, $sql_entregable);   
                $count=1; 
                /* $listar_entregables= mysqli_query($con,"SELECT * FROM entregables WHERE codigo_proyecto='".$id_p."'"); */
               
                while($array_lista=mysqli_fetch_array($query_entregable)){
                  $nombre_entregable=$array_lista['nombre'];
                }
                
                
                
                ?>
                <!-- listando el array de los entregables -->
                <tr>
                  
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $nombre_entregable; ?></td>
                </tr>
              </tbody>
            </thead>
          </table>
          <!-- DataTales Example -->
          <div class="row">
          <?php $sql="SELECT * FROM  seguimientos WHERE codigo_proyecto='$id_p' /* AND id_miembros='$est' */";
    $query = mysqli_query($con, $sql);
        while ($row=mysqli_fetch_array($query)){
           $id=$row['id'];
            $id_seg=$row['id_seg'];
            $descripcion=$row['descripcion'];
            $documento=$row['documento'];
            $link=$row['link'];
            $usuario_seguimiento=$row['usuario'];

            $gd=mysqli_query($con,"SELECT * FROM entregables WHERE  id='".$id_seg."' AND codigo_proyecto='".$id_p."'");
            $rwd=mysqli_fetch_array($gd);
            $nom=$rwd["nombre"];
              $id_ent=$rwd["id"];

            $t=mysqli_query($con,"SELECT count(*) as t FROM comments WHERE codigo_proyecto='".$id_p."' AND id_seguimiento='".$id."' AND id_entregable='".$id_ent."'");
            $rwdt=mysqli_fetch_array($t);
            $ts=$rwdt["t"];

    ?>
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $nom; ?></h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <a href="#" data-toggle="modal" data-target="#comments" onclick="comments(<?php echo $id_ent; ?>, <?php echo $id; ?>);">
                <?php echo $ts; ?> <i class="fas fa-comments fa-fw"></i>
                <!-- Counter - Messages -->
              </a>
                  <div  align="center"><img src="img/file.png" width="50px" height="auto"></div>
                  <div align="center"><a href="entregables/<?php echo  $id_p  ; ?>/<?php echo  $documento; ?>" download="entregables/<?php echo  $id_p  ; ?>/<?php echo  $documento; ?>"><i class="fa fa-download"></i> <?php echo $documento; ?></a></div>

                  <div align="center"><p>URL: </p> <a href="<?php echo  $link  ; ?>/<?php echo  $link; ?>" download="<?php echo  $link  ; ?>/<?php echo  $link; ?>" target="_blank"><i class="fa fa-cloud-download" ></i>  <?php echo $link; ?></a></div>

                  
                  

                  <br>
               <?php echo $descripcion; ?>
               <br>
               <?php echo "Usuario : " .$usuario_seguimiento; ?>
                </div>
              </div>
            </div>

          <?php } ?>
        </div>

        </div>
        <!-- /.container-fluid -->

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
   <script type="text/javascript" src="js/comments.js"></script>
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
