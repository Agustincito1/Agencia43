const idToCheck = 'up';
    
// Verifica si el div con el ID existe
const element = document.getElementById(idToCheck);

if (element) {
    var caja = document.getElementById("add");
    var h2 = document.getElementById("addh2");
    caja.style.display = "none";
    h2.style.display = "none";
} else {
    var caja = document.getElementById("add");
    var h2 = document.getElementById("addh2");
    caja.style.display = "block";
    h2.style.display = "block";
}