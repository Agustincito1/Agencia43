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
                        console.log(arrayData);
                        
                        // Convertir el array JSON a hoja de trabajo (worksheet)
                        const worksheet = XLSX.utils.json_to_sheet(arrayData);
                    
                        // Estilos para el encabezado
                        const headerStyle = {
                            font: { bold: true, color: { rgb: "FFFFFF" }, name: "Arial", sz: 12 },
                            alignment: { horizontal: "center", vertical: "center" },
                            fill: { fgColor: { rgb: "4F81BD" } },
                            border: {
                                top: { style: "thin", color: { rgb: "000000" } },
                                left: { style: "thin", color: { rgb: "000000" } },
                                bottom: { style: "thin", color: { rgb: "000000" } },
                                right: { style: "thin", color: { rgb: "000000" } }
                            }
                        };
                    
                        // Estilo para las celdas de datos
                        const dataStyle = {
                            font: { color: { rgb: "000000" }, name: "Arial", sz: 10 },
                            alignment: { horizontal: "center", vertical: "center" },
                            border: {
                                top: { style: "thin", color: { rgb: "000000" } },
                                left: { style: "thin", color: { rgb: "000000" } },
                                bottom: { style: "thin", color: { rgb: "000000" } },
                                right: { style: "thin", color: { rgb: "000000" } }
                            }
                        };
                    
                        // Obtener los encabezados (primer fila)
                        const headers = Object.keys(arrayData[0]);
                    
                        // Aplicar estilo a los encabezados
                        headers.forEach((header, colIndex) => {
                            const cellAddress = { r: 0, c: colIndex }; // Dirección de la celda
                            worksheet[cellAddress] = worksheet[cellAddress] || {}; // Crear la celda si no existe
                            worksheet[cellAddress].s = headerStyle; // Asignar el estilo al encabezado
                        });
                    
                        // Aplicar estilo a las celdas de datos
                        arrayData.forEach((row, rowIndex) => {
                            headers.forEach((header, colIndex) => {
                                const cellAddress = { r: rowIndex + 1, c: colIndex }; // Las filas de datos empiezan desde la segunda fila
                                worksheet[cellAddress] = worksheet[cellAddress] || {}; // Crear la celda si no existe
                                worksheet[cellAddress].s = dataStyle; // Asignar el estilo a los datos
                            });
                        });
                    
                        // Ajustar el ancho de las columnas (opcional, puedes personalizar según el contenido)
                        worksheet["!cols"] = headers.map(header => ({ wch: Math.max(header.length, 10) }));
                    
                        // Crear el libro de trabajo (workbook)
                        const workbook = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');
                    
                        // Nombre del archivo
                        const fileName = 'Lista.xlsx';
                    
                        // Descargar el archivo con los estilos aplicados
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



