<?php session_start();
  if (!isset($_SESSION['id_user'])) {
        header("location: login.php");
    exit;
  }
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  
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
<?php
if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
			$username=$_SESSION["username"];
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
          $idc = mysqli_real_escape_string($con,(strip_tags($_REQUEST['idc'], ENT_QUOTES)));
		 $aColumns = array('codigo_proyecto');//Columnas de busqueda
		 $sTable = "usuarios";
		 $sWhere = "Where username='".$username."'";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './miembros.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
		//loop through fetched data

if ($numrows>0){
			
			?>
			<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                  <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre del proyecto</th>
					<th>Seguimientos</th>
                    </tr>
                  </thead>
                  <tbody>
				<?php
				$count=1;
				while ($row=mysqli_fetch_array($query)){
						$ids=$row['id'];
						$codigo=$row['codigo_proyecto'];
						

							$ge=mysqli_query($con,"SELECT * FROM proyecto WHERE codigo='".$codigo."'");
                   			$rows=mysqli_fetch_array($ge);

							$id=$rows['id'];
						$nombre=$rows['nombre_proyecto'];
						 $codigo=$rows['codigo'];
						$estado=$rows['estado'];
						$fecha=$rows['fecha_agregado'];
						$presupuesto=$rows['presupuesto'];
							$g=mysqli_query($con,"SELECT count(*) as total, id FROM entregables WHERE codigo_proyecto='".$codigo."'");
                   		$rw=mysqli_fetch_array($g);
                   		$total=$rw["total"];
                   		 $id_en=$rw["id"];


                   		 $s=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
                   		$rwse=mysqli_fetch_array($s);
                   		 $id_username=$rwse["id"];

							$s=mysqli_query($con,"SELECT count(*) as total_seg FROM seguimientos WHERE codigo_proyecto='".$codigo."'  AND id_miembros='".$id_username."'");
                   		$rwser=mysqli_fetch_array($s);
                   		 $total_s=$rwser["total_seg"];
          				
          				if($total_s!=0){
          					$r=100/$total;
          					$rst=$r*$total_s;
          				}else{
          					$r=0;
          					$rst=$r*$total;
          				}
          				
					
					?>
					
				
						<input type="hidden" value="<?php echo $nombre;?>" id="nombre<?php echo $id;?>">
					<input type="hidden" value="<?php echo $codigo;?>" id="codigo<?php echo $id;?>">
						<input type="hidden" value="<?php echo $estado;?>" id="estado<?php echo $id;?>">
					<input type="hidden" value="<?php echo $codigo;?>" id="cod<?php echo $id;?>">
					<input type="hidden" value="<?php echo $presupuesto;?>" id="presupuesto<?php echo $id;?>">
					<td><?php echo $count++; ?></td>
						<td><a href="info_proyecto.php?cod=<?php echo $codigo; ?>"><?php echo $nombre; ?></a></td>
						<td>

                      	 <a href="#" class="btn btn-primary btn-icon-split" title='Ver seguimiento' onclick="segg(<?php echo $id;?>);" data-toggle="modal" data-target="#seguim">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Entregableeeees</span>
                  </a> <a href="ver_entregables.php?id_p=<?php echo $codigo;?>&id_est=<?php echo $id_username;?>" class="btn btn-info btn-icon-split" title='Ver entregables'>
                    <span class="icon text-white-50">
                      <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Ver entregablesssss</span>
                  </a>
					<p></p>
  <h4 class="small font-weight-bold">Estado<span class="float-right"><?php if($rst>=100){?>Completado!<?php }else{ echo number_format($rst).'%'; } ?></span></h4>
  <div class="progress">
  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width:<?php echo $rst;?>%" aria-valuenow="<?php echo $rst;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($rst);?>%</div>
</div>
				</td>
					</tr>
					<?php
				}
				?>
					
			</tbody>
                </table>
              </div>
            </div>
          </div>
			<?php
		}
	}
?>

    <script src="vendor/jquery/jquery.min.js"></script>
 
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
