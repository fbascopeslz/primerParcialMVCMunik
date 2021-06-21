var tabla;
var cont = 0;

//Función que se ejecuta al inicio
function init()
{
	mostrarform(2);	
	listar();

	$("#formularioregistros").on("submit", function(e)
	{
		guardar(e);		
	});	
}

//Función limpiar
function limpiar() {
	$("#idGestion").val("");
	$("#nombre").val("");	
	$("#fechaInicio").val("");
	$("#fechaFin").val("");	
	$("#idProfesor").empty();
	$("#idMateria").empty();
	$("#idCurso").empty();
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	switch (flag) {
		case 1:
			$("#listadoregistros").hide();
			$("#formularioregistros").show();
			$("#btnGuardar").prop("disabled", false);
			$("#btnagregar").hide();
			
			$.post("../../controlador/GestionControlador.php?op=seleccionarProfesor", function(r) {			
				$("#idProfesor").html(r);													
			});	
			$.post("../../controlador/GestionControlador.php?op=seleccionarMateria", function(r) {			
				$("#idMateria").html(r);													
			});			
			$.post("../../controlador/GestionControlador.php?op=seleccionarCurso", function(r) {			
				$("#idCurso").html(r);													
			});

			break;

		case 2:
			$("#listadoregistros").show();
			$("#formularioregistros").hide();
			$("#btnagregar").show();
			
			//limpiar la tabla
			$(".filas").remove();

			break;
	
		default:
			break;
	}
}

//Función cancelarform
function cancelarform() {
	limpiar();
	mostrarform(2);
}

function listar() {	
	tabla = $('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
		"aServerSide": true,//Paginación y filtrado realizados por el servidor
		dom: 'Bfrtip',//Definimos los elementos del control de tabla
		buttons: [		          
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
				],
		"ajax":
				{
					url: '../../controlador/GestionControlador.php?op=listar',
					type : "get",
					dataType : "json",					
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
		"order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


function agregarMateriaCursoTabla() {	

	if (!$('#idMateria').val()) { //comprobar que ya se agregaron todas las materias
		alert("Ya se agregaron todas las materias!");
		return;
	}	

	var idMateria = $("#idMateria").val();
	var nombreMateria = $("#idMateria option:selected").text();
	var idCurso = $("#idCurso").val();
	var nombreCurso = $("#idCurso option:selected").text();

	//quitar esa opcion del select
	//$("#idMateria option[value='" + idMateria + "']").remove();

	var fila =
		'<tr class="filas" id="fila'+cont+'">'+
			'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
			'<td id=filaNombreMateria' + cont + '><input type="hidden" id=filaMateria' + cont + ' name="idsMaterias[]" value="'+idMateria+'">'+nombreMateria+'</td>'+
			'<td id=filaNombreCurso' + cont + '><input type="hidden" id=filaCurso' + cont + ' name="idsCursos[]" value="'+idCurso+'">'+nombreCurso+'</td>'+									
		'</tr>';
		
	cont++;  
	$('#tablaDetallesGestionMateria').append(fila);
	
}

function eliminarDetalle(index) {	
	/*
	//agregar esa opcion al select
	var idVacuna = $('input#filaVacuna' + index).val();	
	var nombreVacuna = $("#filaNombreVacuna" + index).text();
	$("#idVacuna").append('<option value="' + idVacuna +'">' + nombreVacuna + '</option>');
	$('#idVacuna').selectpicker('refresh');
	*/

	$("#fila" + index).remove();	
	cont = cont - 1;	
}

function guardar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento	
	if (cont > 0) {
		$("#btnGuardar").prop("disabled", true);
		var formData = new FormData($("#formulario")[0]);		
		$.ajax({
			url: "../../controlador/GestionControlador.php?op=insertar",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function(datos)
			{                    
				bootbox.alert(datos);	          
				mostrarform(2);				
				listar();
			}
		});
	} else {
		alert("Porfavor agregue almenos una materia");
	}
}

init();