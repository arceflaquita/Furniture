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

	// Lista de Continentes
	$.post( 'consultaEstados.php' ).done( function(respuesta)
	{
		$( '#estado' ).html( respuesta );
	});

	// lista de Paises	
	$('#estado').change(function()
	{
		var el_estado = $(this).val();
		
		// Lista de Paises
		$.post( 'consultaMunicipio.php', { estado: el_estado} ).done( function( respuesta )
		{
			$( '#municipio' ).html( respuesta );
		});
	});

	$('#municipio').change(function()
	{
		var el_municipio = $(this).val();
		
		// Lista de Paises
		$.post( 'consultaColonia.php', { municipio: el_municipio} ).done( function( respuesta )
		{
			$( '#colonia' ).html( respuesta );
		});
	});

	$('#colonia').change(function()
	{
		var el_colonia = $(this).val();
		
		// Lista de Paises
		$.post( 'consultaCodigoPostal.php', { colonia: el_colonia} ).done( function( respuesta )
		{
			$( '#codigoPostal' ).html( respuesta );
		});
	});
	
	

})