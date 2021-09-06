<div class="modal fade" id="SubirArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-user'></i> Entregables</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
        <form action="../ajax/seguimiento.php" method="post"  enctype="multipart/form-data">
        <input type="text" name="descripcion" id="descripcion"class="form-control"  placeholder="Descripcion">
        <br>
            <?php 
            $username=$_SESSION["username"];
            $s=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
                $rwse=mysqli_fetch_array($s);
                $id_username=$rwse["id"];
                $nombre_entregable=$rwse["nombre"];
            
            ?>
            <input type="hidden" value="<?php echo $id_username;?>" id="id_miembro" name="id_miembro" class="form-control">
            
            <input type="hidden" value="<?php echo $id_p;?>" id="codigo_proyecto" name="codigo_proyecto" class="form-control">
            <input type="hidden" value="<?php echo $username;?>" id="usuario_seguimiento" name="usuario_seguimiento" class="form-control">
                  
            
        <input type="file"   id="documento" name="documento" >
                    <br><br>

                  <!--   otro modelo de select
                    <select class="custom-select" name="SelectBanco" id="SelectBanco" required="">
                        <option disabled="disabled" value="" selected>Elegir...</option>
                       solo le falta el php incluido
                    </select> mostrando los netregables de cada proyecto -->
                            <br>

                    <select class="form-control" name="id_entregable" id="id_entregable" required="">
                        <option disabled="disabled" value="" selected>Seleccionar entregable...</option>
                        <?php 

                        $sss=mysqli_query($con,"SELECT * FROM entregables where codigo_proyecto=$id_p");
                                while($f=mysqli_fetch_assoc($sss)){    

                                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';

                        }
                        
                        ?>
                        <input type="hidden" value="<?php echo $f['nombre'];?>" id="nombre_entregable" name="nombre_entregable" class="form-control">

                        <input type="text" class="form-control" placeholder="Pegue el link de google Drive" id="link" name="link">
                    <center>
                    <input  class="btn btn-info btn-icon-split" type="submit" value="Enviar este formulario" />
                    </center>
                   
</form>
       </div>
       <div class='outer_div11'></div><!-- Carga los datos ajax -->
    </div>
  </div>
</div>
