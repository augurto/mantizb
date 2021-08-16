<div class="modal fade" id="seguim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-user'></i> Entregables</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
        <form class="form-horizontal" name="seg" id="seg" method="post"> <?php if($_SESSION['prol']=="administrador" || $_SESSION['prol']=="estudiante" || $_SESSION['prol']=="Inv Principal"  || $_SESSION['prol']=="Coinvestigador"){?>
      <div id="resultados_ajax11"></div>
                <div class="col-lg-12">
                <div class="form-group">
                    <textarea class="form-control" placeholder="Descripcion del proyecto" name="descripcion" id="descripcion"></textarea>
                  </div>
          </div>
      <div class="col-sm-12">
       <div class="form-group">
        <label for="exampleInputFile">Archivo</label>
        <?php 
        $abc=$_SESSION["username"];
         $link = new mysqli("127.0.0.1", "u415020159_mantizb", "Mantizb*#17", "u415020159_mantizb"); 
         $link->set_charset("utf8") or die();
         $consulta = "SELECT miembros FROM id where nombre = $abc";
         $resultDir = mysqli_query($link, $consulta);
         /* if ($pos = mysqli_fetch_row($resultDir)) {
             array_push($direccionesOrigen, $pos);
         } */
        
        ?>
        <input type="text" value="<?php  echo $resultDir;?>">
        <div class="input-group">
        <div class="custom-file">
        <input type="file" onkeyup="loaddds(1);"  class="custom-file-input" id="exampleInputFile" name="exampleInputFile" required>
        <label class="custom-file-label" for="exampleInputFile">Archivo</label>
                      </div>
                    </div>
                  </div>
              </div>
        <div class="col-sm-12">
        <select name="nomb"  id="nomb" onkeyup="select();"  class="form-control" required>
        </select>
        <input type="text" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
        <input type="text" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
        <input type="text" name="id" placeholder="Nombre del seguimiento"  id="id"  class="form-control">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="seg" name="seg">Guardar </button>
      <?php }else{?>
      <input type="hidden" name="cd" placeholder="Nombre del seguimiento"  id="cd"  class="form-control">
      <input type="hidden" name="cdd" placeholder="Nombre del seguimiento"  id="cdd"  class="form-control">
     
      <?php }?>
          
        </div>
      </form>
       </div>
       <div class='outer_div11'></div><!-- Carga los datos ajax -->
    </div>
  </div>
</div>



        