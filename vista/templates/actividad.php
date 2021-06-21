<?php
//Activamos el almacenamiento en el buffer
/*ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
*/
require 'header2.php';

//if ($_SESSION['almacen']==1)
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
                        <h1 class="box-title">Actividad <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
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
                            <th>Fecha</th>
                            <th>Documento</th>
                            <th>Materia</th>
                            <th>Gestion</th>
                            <th>Tipo Actividad</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Documento</th>
                            <th>Materia</th>
                            <th>Gestion</th>
                            <th>Tipo Actividad</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                      <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Nombre:</label>
                          <input type="hidden" name="idActividad" id="idActividad">
                          <input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" placeholder="Nombre" required>
                        </div>                        
                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Documento:</label>
                          <input type="file" class="form-control" name="documento" id="documento">
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Gestion Materia Curso:</label>
                          <select id="gestionMateriaId" name="gestionMateriaId" class="form-control" required>
                            
                          </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Tipo Actividad:</label>
                          <select id="tipoActividadId" name="tipoActividadId" class="form-control" required>

                          </select>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Guardar</button>
                          <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i>Cancelar</button>
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
//}
//else
//{
  //require 'noacceso.php';
//}

require 'footer2.php';
?>
<script type="text/javascript" src="../scripts/actividad.js"></script>

<?php 
/*
}
ob_end_flush();
*/
?>

