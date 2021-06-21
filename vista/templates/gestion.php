<?php
//Activamos el almacenamiento en el buffer
/*
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
} else {
*/

require 'header2.php';

//if ($_SESSION['ventas']==1)
//{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h1 class="box-title">Gestion <button class="btn btn-success" id="btnagregar" onclick="mostrarform(1)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
                      <div class="box-tools pull-right">
                      </div>
                    </div>
                    <!-- /.box-header -->

                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Profesor</th>                          
                        </thead>
                        <tbody>                            
                        </tbody>
                        <tfoot>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Profesor</th>                          
                        </tfoot>
                      </table>
                    </div>                  

                    <div class="panel-body" id="formularioregistros">
                      <form name="formulario" id="formulario" method="POST">
                        <div class="card">
                          <div class="card-header">
                            <h4>Agregar Gestion</h4>
                          </div>
                          <div class="card-body">                          
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Nombre:</label>
                              <input type="hidden" name="idGestion" id="idGestion">
                              <input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" placeholder="Nombre" required>
                            </div>                         
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <label>Fecha Inicio:</label>
                              <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" required>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <label>Fecha Fin:</label>
                              <input type="date" class="form-control" name="fechaFin" id="fechaFin" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Profesor:</label>                            
                              <select id="idProfesor" name="idProfesor" class="form-control" required>
                                
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header">
                            <h4>Agregar Materia y Curso</h4>
                          </div>
                          <div class="body">                          
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Materia:</label>                            
                              <select id="idMateria" name="idMateria" class="form-control">
                                
                              </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Curso:</label>                            
                              <select id="idCurso" name="idCurso" class="form-control">
                                
                              </select>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">                            
                              <button class="btn btn-primary" type="button" onclick="agregarMateriaCursoTabla()"><i class="fa fa-save" ></i> Añadir Materia y Curso</button>                                            
                            </div>
                          </div>
                        </div>                                              

                        <div class="card">                        
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="tablaDetallesGestionMateria" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                                <th>Opciones</th>
                                <th>Materia</th>                              
                                <th>Curso</th>                              
                              </thead>                          
                              <tbody>                                
                              </tbody>                            
                            </table>
                          </div>
                        </div>                               

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                          <button id="btnCancelar" class="btn btn-danger" onclick="mostrarform(2)" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>                      
                      </form>                      
                    </div>
                                        
                    <!--Fin centro -->

                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->


<?php
//} else {
  //require 'noacceso.php';
//}

require 'footer2.php';
?>
<script type="text/javascript" src="../scripts/gestion.js"></script>
<?php 
/*
}
ob_end_flush();
*/
?>