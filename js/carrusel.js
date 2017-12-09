$(function() {
$('#comboCategoria').change(function() {
  var cat = $(this).val();
  $.post('consultaComboProductos.php', {
    cat: cat
  }).done(function(respuesta) {
    $('#comboProducto').html(respuesta);
  });
});
});

$(function() {
$("#imgCarrusel").click(function(){
    $("#archivo").click();
});
});

$(function(){
  $('#archivo').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
     {
        var reader = new FileReader();
        reader.onload = function (e) {
           $('#imgCarrusel').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#imgCarrusel').attr('src', '/assets/no_preview.png');
    }
  });
});

function eliminarCarrusel(id) {
  var idImagen = id;
  var r = confirm("Desea Eliminar este Registro!");
  if (r == true) {
    window.location.href = 'eliminarCarrusel.php?idImagen=' + idImagen;
  }
}
