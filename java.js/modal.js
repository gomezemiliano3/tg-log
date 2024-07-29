// // Asignar el controlador de eventos usando jQuery
// $('.get-in-touch').on('click', function (event) {
//     event.preventDefault(); // Previene el comportamiento predeterminado
//     $('#static-modal').addClass('show'); // Muestra el modal
//     $('body').addClass('no-scroll'); // Desactiva el scroll
// });

// // Ocultar el modal con jQuery
// function hideModal() {
//     $('#static-modal').removeClass('show'); // Oculta el modal
//     $('body').removeClass('no-scroll'); // Reactiva el scroll
// }

// // Botones para cerrar el modal
// $('[data-dismiss="modal"]').on('click', hideModal);

// // Cerrar el modal al hacer clic fuera de su contenido
// $('#static-modal').on('click', function (event) {
//     if (event.target === this) {
//         hideModal();
//     }
// });

// // Cerrar el modal al presionar la tecla Esc
// $(document).on('keydown', function (event) {
//     if (event.key === 'Escape') {
//         hideModal();
//     }
// });



// Asignar el controlador de eventos usando jQuery
$('.get-in-touch').on('click', function (event) {
    event.preventDefault(); // Previene el comportamiento predeterminado
    $('#static-modal').css('display', 'flex'); // Cambia el display a flex
    $('body').addClass('no-scroll'); // Desactiva el scroll
});

// Ocultar el modal con jQuery
function hideModal() {
    $('#static-modal').css('display', 'none'); // Cambia el display a none
    $('body').removeClass('no-scroll'); // Reactiva el scroll
}

// Botones para cerrar el modal
$('[data-dismiss="modal"]').on('click', hideModal);

// Cerrar el modal al hacer clic fuera de su contenido
$('#static-modal').on('click', function (event) {
    if (event.target === this) {
        $(this).css('display', 'none');
        $('body').removeClass('no-scroll'); // Reactiva el scroll si es necesario
    }
});

// Cerrar el modal al presionar la tecla Esc
$(document).on('keydown', function (event) {
    if (event.key === 'Escape') {
        hideModal();
    }
});
