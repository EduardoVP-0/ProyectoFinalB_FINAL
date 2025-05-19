function mostrarContenido(dia) {
    var contenido = document.querySelectorAll('.contenido-adicional')[dia - 1];  
    var enlaceVerMas = contenido.previousElementSibling; 
    var enlaceVerMenos = contenido.querySelector('a');  

    if (contenido.style.display === "none") {
        contenido.style.display = "block";   
        enlaceVerMas.style.display = "none"; 
        enlaceVerMenos.style.display = "block"; 
    } else {
        contenido.style.display = "none";   
        enlaceVerMas.style.display = "block"; 
        enlaceVerMenos.style.display = "none"; 
    }
}