tinymce.init({
    selector: 'textarea',
    language: 'es_419',
    language_url: 'js/langs/es_419.js',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating'
  });

$(document).ready(function(){
    $(".delete_link").on('click', function(){
        const id = $(this).attr('rel');
        const tabla = $(this).attr('table');
        const delete_url = "index.php?" + tabla + "&delete=" + id;
        $(".modal-title").html("Borrar " + tabla);
        $(".modal-body").html("¿Estas seguro de borrar el elemento?");
        $(".btn_delete_link").attr("href", delete_url);
        $("#deleteModal").modal('show');
    });
})