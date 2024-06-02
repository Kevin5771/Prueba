function calculateFactorial() {
    // Obtener el valor ingresado por el usuario
    const number = parseInt(document.getElementById("number").value);
    
    // Validar que el número sea mayor o igual a 0
    if (isNaN(number) || number < 0) {
        alert("Por favor, ingresa un número entero no negativo.");
        return;
    }
    
    let factorial = 1;
    let sequence = "";

    for (let i = number; i > 0; i--) {
        factorial *= i;
        sequence += (i === number ? "" : "*") + i;
    }


    document.getElementById("result").textContent = `${number}! = ${sequence} = ${factorial}`;
}