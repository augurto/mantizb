<div class="modal fade" id="seguim_obra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-user'></i> Materiales...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
        <form class="form-horizontal" name="seg" id="seg" method="post"> <?php if($_SESSION['prol']=="administrador" || $_SESSION['prol']=="estudiante" || $_SESSION['prol']=="Inv Principal"  || $_SESSION['prol']=="Coinvestigador"){?>
      <div></div>
                <div class="col-lg-12">
                <div class="form-group">
                <label for="exampleInputFile">Obra</label>
                    <input type="text" class="form-control" name="obra" id="obra" value="<?php echo $nombre_obra;?>">
                    <label for="exampleInputFile">Material</label>
                    
                  
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $username;?>" readonly>
                    <select  class="form-control" name="material" id="material"> <?
                        $busca = "Select * From materiales";
                        $lista = mysqli_query($con,$busca);
                        While($fila=mysqli_fetch_assoc($lista)){
                            echo "<option>";
                            echo $fila['nombre_material'];
                            echo "</option>";
                        }?>
                    </select>
                    
                  </div>
          </div>
      <form action="../ajax/agregar_material.php" method="get">

      <div class="col-sm-12">
       <div class="form-group">
        <label for="exampleInputFile">Archivo</label>
        <?php 
        $username=$_SESSION["username"];
        $s=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
             $rwse=mysqli_fetch_array($s);
               $id_username=$rwse["id"];
        
        ?>
        <input type="text" value="<?php echo $id_username;?>" id="id_miembro" name="id_miembro" class="form-control">
        <div class="input-group">
        <div class="custom-file">
        <input type="file" onkeyup="loaddds(1);"  class="custom-file-input" id="exampleInputFile" name="exampleInputFile" required>
        <label class="custom-file-label" for="exampleInputFile">Archivo</label>
                      </div>
                    </div>
                  </div>
              </div>
        <div class="col-sm-12">
        <select name="nomb"  id="nomb" onkeyup="select_material();"  class="form-control" required>
        </select>
        <input type="hidden" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
        <input type="hidden" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
        <input type="hidden" name="id" placeholder="Nombre del seguimiento"  id="id"  class="form-control">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="seg" name="seg">Guardar </button>
      <?php }else{?>
      <input type="hidden" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
      <input type="hidden" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
     
      <?php }?>
          
        </div>
        <input type="submit" value="Submit">
      </form>
      </form>
       </div>
       <div class='outer_div11'></div><!-- Carga los datos ajax -->
    </div>
  </div>
</div>



        