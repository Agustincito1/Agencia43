
$(document).ready(function() {
    $('#Provincia').change(function() {
        const categoria = $(this).val();

        $('#Localidad').empty().append('<option value="">Seleccione una opción</option>');

        if (categoria) {
            $.ajax({
                url: 'localidades.php', // URL del script que devuelve las opciones
                method: 'GET',
                data: { categoria: categoria },
                dataType: 'json',
                success: function(data) {
                    // Añade las opciones al select
                    $.each(data, function(index, option) {
                        $('#Localidad').append(`<option value="${option.value}">${option.text}</option>`);
                    });
                },
                error: function(data) {
                    alert('Error al cargar las opciones.');
                }
            });
        }
    });
});
