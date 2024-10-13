const container = document.getElementById('calendar-container');
container.addEventListener('click', (event) => {
    const div = event.target.closest('.di');
    if (div) {
        var string = div.dataset.info;
        
        const [dia, diastr, mes, anio] = string.split("-");

        console.log(dia);
        console.log(diastr);
        console.log(mes);
        console.log(anio);

    }
});