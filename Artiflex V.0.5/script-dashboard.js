const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");
const opcionesNavegacion = document.querySelectorAll('.barra-lateral .navegacion a');

// Función para resaltar la opción seleccionada
function resaltarOpcionSeleccionada() {
    opcionesNavegacion.forEach(opcion => {
        opcion.removeAttribute('inbox');
    });

    this.setAttribute('inbox', ''); // Agrega el atributo 'inbox' a la opción seleccionada
}

// Agrega un evento a cada opción de navegación
opcionesNavegacion.forEach(opcion => {
    opcion.addEventListener('click', resaltarOpcionSeleccionada);
});


function toggleMenu(event) {
    event.stopPropagation(); // Evita que el evento de clic se propague

    barraLateral.classList.toggle("max-barra-lateral");

    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }

    if (window.innerWidth <= 320) {
        barraLateral.classList.toggle("mini-barra-lateral");
        main.classList.toggle("min-main");
        spans.forEach(span => span.classList.toggle("oculto"));
    }
}

function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
}

function toggleCloud() {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach(span => span.classList.toggle("oculto"));
}
addEventListener("click", function (event) {
    // Verifica si el clic proviene del botón de menú
    if (event.target.closest('.menu')) {
        toggleMenu(event);
    }
});
palanca.addEventListener("click", toggleDarkMode);
cloud.addEventListener("click", toggleCloud);
