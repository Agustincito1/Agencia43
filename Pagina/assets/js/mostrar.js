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

                const contenedor = document.getElementById('dataonclick');
                contenedor.innerHTML = ''; 

                const jsonArray = JSON.parse(response);

                // Acceder a los elementos
            
                if (jsonArray.length > 1) {

                    jsonArray.forEach(item => {
                        const datacont = document.createElement('div');
                        datacont.className = `dataonclick_div`; // Asignar una clase única

                        const pHorario = document.createElement('p');
                        pHorario.className = `horario`; // Asignar una clase única
                        pHorario.textContent = `Horario: ${item.Horario}`;

                        const pEmpresa = document.createElement('p');
                        pEmpresa.className = `empresa`; // Asignar una clase única
                        pEmpresa.textContent = `Empresa: ${item.Empresa}`;
                        
                        datacont.appendChild(pHorario);
                        datacont.appendChild(pEmpresa);

                        contenedor.appendChild(datacont);
                    });
                } else {
                    if (jsonArray.length === 1) {
                        jsonArray.forEach(item => {
                            const datacont = document.createElement('div');
                            datacont.className = `dataonclick_div`; // Asignar una clase única

                            const pHorario = document.createElement('p');
                            pHorario.className = `horario`; // Asignar una clase única
                            pHorario.textContent = `Horario: ${item.Horario}`;
    
                            const pEmpresa = document.createElement('p');
                            pEmpresa.className = `empresa`; // Asignar una clase única
                            pEmpresa.textContent = `Empresa: ${item.Empresa}`;

                            datacont.appendChild(pHorario);
                            datacont.appendChild(pEmpresa);

                            contenedor.appendChild(datacont);
                            
                        });
                    } else {
                        contenedor.textContent = 'No hay horarios en este dia.';
                    }
                }
                
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Muestra errores en la consola
            }
        });
    }
});