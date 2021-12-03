<?php 
                            $conexion=mysqli_connect('localhost','u415020159_mantizb','Mantizb*#17','u415020159_mantizb');
                            $continente=$_POST['continente'];

                                $sql="SELECT 
                                    from materiales 
                                    where id_continente='$continente'";

                                $result=mysqli_query($conexion,$sql);

                                $cadena="<label>SELECT 2 (paises)</label> 
                                        <select id='lista2' name='lista2'>";

                                while ($ver=mysqli_fetch_row($result)) {
                                    $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
                                }

                                echo  $cadena."</select>";
                                

                            ?>