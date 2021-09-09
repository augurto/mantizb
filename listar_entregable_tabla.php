<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <?php
       
            $link2 = new PDO('mysql:host=localhost;dbname=u415020159_mantizb', 'u415020159_mantizb', 'Mantizb*#17'); // el campo vaciío es para la password. 

            ?>
            <thead>
              <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Entregables</th>
                <th>Fecha</th>
                <th>Nombre entregable</th>
                <th>Acciones</th>
              </tr>
            </thead>
              <tbody>
              <?php foreach ($link2->query("SELECT * from entregables where codigo_proyecto = '$id_p'") as $rowww){
                $id_entregable=$rowww['id'];
                // aca puedes hacer la consulta e iterarla con each. ?> 
                <?php foreach ($link2->query("SELECT * from seguimientos where codigo_proyecto = '$id_p' and id_seg ='$id_entregable'  " ) as $wooor) // aca puedes hacer la consulta e iterarla con each. ?> 

            
              <tr>
              <td><?php echo $rowww['id'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
                <td><?php echo $rowww['codigo_proyecto'] ?></td>
                <td><?php echo $rowww['nombre'] ?></td>
                <td><?php echo $rowww['fecha_entrega'] ?></td>
                <td><?php echo $wooor['documento']?></td>
                <!-- aca se listara cada entregable -->
                <td><div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"   data-toggle="modal" data-target="#SubirArchivo"  ><i class="fas fa-folder fa-sm text-white-50"></i> Subir Archivos</a>

            
          </div></td>
               
            </tr>
              </tbody>
              <?php
              }
            ?>
              
          </table>