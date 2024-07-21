
//Esta función se utiliza para limitar la cantidad de caracteres en un campo de texto
function validarLongitud(event,numeroLimite) {
    const input = event.target;
    console.log(input.value.length);
    if (input.value.length >= numeroLimite) {
        input.value = input.value.slice(0, 16);
    }
}