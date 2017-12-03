function eliminar(id) {
  var idProducto = id;
  var r = confirm("Decea Eliminar este Registro!");
  if (r == true) {
    window.location.href = 'eliminarProducto.php?idProducto=' + idProducto;

  } else {

  }
}

function eliminarProve(id) {
  var idProvedor = id;
  var r = confirm("Decea Eliminar este Registro!");
  if (r == true) {
    window.location.href = 'eliminarProvedor.php?idProvedor=' + idProvedor;

  } else {

  }
}

$(function() {

  // Lista de Continentes
  $.post('consultaEstados.php').done(function(respuesta) {
    $('#estado').html(respuesta);
  });

  // lista de Paises
  $('#estado').change(function() {
    var el_estado = $(this).val();

    // Lista de Paises
    $.post('consultaMunicipio.php', {
      estado: el_estado
    }).done(function(respuesta) {
      $('#municipio').html(respuesta);
    });
  });

});

$(document).ready(function() {
	//alert('document.ready');
  $(function() {
    // Lista de Categorias
    $.post('getCategories.php').done(function(respuesta) {
      $('#mainmenu').html(respuesta);
    });

  });
});

$('#txtSearch').keydown(function(e) {
	  var _desc = $(this).val();
    if (e.keyCode == 13) {
      e.preventDefault();
			$.post('searchProducts.php', {	desc : _desc }).done(function(respuesta) {
				//alert(respuesta);
				$('#search').html(respuesta);
			});
    }
});
