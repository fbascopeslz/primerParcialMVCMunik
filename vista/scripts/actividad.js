var tabla;

//Función que se ejecuta al inicio
function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function(e) {
		guardaryeditar(e);	
	});
}

//Función limpiar
function limpiar() {
	$("#idActividad").val("");
	$("#nombre").val("");	
	$("#documento").val("");	
	$("#gestionMateriaId").empty();
	$("#tipoActividadId").empty();
}

//Función mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
		
		//Cargamos los items al select GestionMateria
		$.post("../../controlador/ActividadControlador.php?op=seleccionarGestionMateria", function(r) {			
			$("#gestionMateriaId").html(r);									
			//$('#gestionMateriaId').selectpicker('refresh');
		});

		//Cargamos los items al select TipoActividad
		$.post("../../controlador/ActividadControlador.php?op=seleccionarTipoActividad", function(r) {			
			$("#tipoActividadId").html(r);									
			//$('#tipoActividadId').selectpicker('refresh');
		});

	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform() {
	limpiar();
	mostrarform(false);
}

//Función Listar
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
					url: '../../controlador/ActividadControlador.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e) {
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);

	var formData = new FormData($("#formulario")[0]);	

	$.ajax({
		url: "../../controlador/ActividadControlador.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
			bootbox.alert(datos);	          
			mostrarform(false);
			tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idActividad) {
	$.post("../../controlador/ActividadControlador.php?op=mostrar", {idActividad: idActividad}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);		

		$("#idActividad").val(data.ID);//Asignar valor al input hidden
		$("#nombre").val(data.NOMBRE);	

		//Cargamos los items al select GestionMateria
		$.post("../../controlador/ActividadControlador.php?op=seleccionarGestionMateria", function(r) {
			$("#gestionMateriaId").html(r);						
			$("#gestionMateriaId").val(data.GESTIONMATERIA_ID);
			//$('#gestionMateriaId').selectpicker('refresh');
		});
		//Cargamos los items al select TipoActividad
		$.post("../../controlador/ActividadControlador.php?op=seleccionarTipoActividad", function(r) {
			$("#tipoActividadId").html(r);						
			$("#tipoActividadId").val(data.TIPOACTIVIDAD_ID);
			//$('#tipoActividadId').selectpicker('refresh');
		});
 	});
}


init();