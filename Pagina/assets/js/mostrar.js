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
                    
                    const listdata = document.createElement('div');
                    listdata.className = `list`; // Asignar una clase única

                    jsonArray.forEach(item => {


                        const datacont = document.createElement('div');
                        datacont.className = `dataonclick_div`; // Asignar una clase única

                        const img = document.createElement('img');
                        img.className = `imagen`; // Asignar una clase única
                        img.src = 'imgs/agencia1.png'

                        const pHorario = document.createElement('p');
                        pHorario.className = `horario`; // Asignar una clase única
                        pHorario.textContent = `${item.Horario.slice(0, -3)} HS`;

                        const pEmpresa = document.createElement('p');
                        pEmpresa.className = `empresa`; // Asignar una clase única
                        pEmpresa.textContent = `${item.Empresa}`;

                        datacont.appendChild(img);
                        datacont.appendChild(pHorario);
                        datacont.appendChild(pEmpresa);
                        
                        listdata.appendChild(datacont);
                    });

                    const button = document.createElement('button');
                    button.innerText = 'Descargar Excel';
                    button.id = 'download';

                    // Guardar el array como atributo del botón (en formato JSON)
                    button.setAttribute('data-array', JSON.stringify(jsonArray));
                    contenedor.appendChild(listdata);
                    contenedor.appendChild(button);
                    


                } else {
                    if (jsonArray.length === 1) {
                        const listdata = document.createElement('div');
                        listdata.className = `list`; // Asignar una clase única

                        jsonArray.forEach(item => {
                            
                            

                            const datacont = document.createElement('div');
                            datacont.className = `dataonclick_div`; // Asignar una clase única
                            
                            const img = document.createElement('img');
                            img.className = `imagen`; // Asignar una clase única
                            img.src = 'imgs/agencia1.png'

                            const pHorario = document.createElement('p');
                            pHorario.className = `horario`; // Asignar una clase única
                            pHorario.textContent = `${item.Horario.slice(0, -3)} HS`;
    
                            const pEmpresa = document.createElement('p');
                            pEmpresa.className = `empresa`; // Asignar una clase única
                            pEmpresa.textContent = ` ${item.Empresa}`;

                            datacont.appendChild(img);
                            datacont.appendChild(pHorario);
                            datacont.appendChild(pEmpresa);

                            const button = document.createElement('button');
                            button.innerText = 'Descargar Excel';
                            button.id = 'download';
    
                            // Guardar el array como atributo del botón (en formato JSON)
                            button.setAttribute('data-array', JSON.stringify(jsonArray));

                            listdata.appendChild(datacont);
                            contenedor.appendChild(listdata);
                            contenedor.appendChild(button);

                        });

                        
                    } else {
                        const vacio = document.createElement('p');
                        vacio.className = `error`; // Asignar una clase única
                        vacio.textContent = `No hay horarios en este día`;
                        contenedor.appendChild(vacio);
                    }
                }


                if(jsonArray.length > 0){
                    button = document.getElementById("download");
                    button.addEventListener('click', () => {
                        // Obtener el array desde el atributo
                        const arrayData = JSON.parse(button.getAttribute('data-array'));
                    
                        const worksheet = XLSX.utils.json_to_sheet(arrayData);
                        const workbook = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');
                    
                        const fileName = 'Lista.xlsx';
                        XLSX.writeFile(workbook, fileName);
                    });
                }
            
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Muestra errores en la consola
            }
        });
    }
});



