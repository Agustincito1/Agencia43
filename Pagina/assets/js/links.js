const linksWithIds = document.querySelectorAll('a[id]');

linksWithIds.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Evita el comportamiento por defecto del enlace
        
        // Obtén el id del enlace
        const linkId = this.id;
        
        // Busca la sección con el id que coincide con el enlace
        const targetSection = document.querySelector(`#${linkId.replace('scrollTo', 'section')}`);

        if (targetSection) {
            // Realiza el scroll suavemente
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
});