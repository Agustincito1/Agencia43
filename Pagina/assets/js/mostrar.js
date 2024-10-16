const container = document.getElementById('calendar-container');
container.addEventListener('click', (event) => {
    const div = event.target.closest('.di');
    if (div) {
        var string = div.dataset.info;
        
        const [dia, diastr, mes, anio] = string.split("-");
        console.log(dia);
        const data = {
            eldia: dia,
            deldiastr: diastr,
            elmes: mes,
            elanio: anio
        };



        $.ajax({
            url: 'calendariodata.php', // Ruta al archivo PHP
            type: 'POST',
            data: data, // Envía los datos como un objeto
            success: function(response) {
                console.log(response);  // Muestra la respuesta del servidor
                var div = document.getElementById('div-onclick');
                div.style.display = "block";
                document.getElementById('div-onclick').textContent = response;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Muestra errores en la consola
            }
        });
    }
});