function eliminar(id){
	var idProducto=id;
	 var r =confirm("Decea Eliminar este Registro!");
	  if (r == true) {
      window.location.href = 'eliminarProducto.php?idProducto='+idProducto;

    } else{

    }
}

function eliminarProve(id){
	var idProvedor=id;
	 var r =confirm("Decea Eliminar este Registro!");
	  if (r == true) {
      window.location.href = 'eliminarProvedor.php?idProvedor='+idProvedor;

    } else{

    }
}

$(function(){

	// lista de Paises
	$('#estado').change(function()
	{
		var el_estado = $(this).val();

		// Lista de Paises
		$.post( 'consultaMunicipio.php', { estado: el_estado} ).done( function( respuesta )
		{
			$( '#municipio' ).html( respuesta );
			$( '#colonia' ).html("  <option value='0'>Seleccione una Colonia</option>" );
			$( '#codigoPostal' ).html( " <option value='0'>Seleccione un codigo Postal</option>");
		});
	});

})
