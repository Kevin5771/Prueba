function calcularAmortizacion() {
    // Obtener los valores ingresados por el usuario
    const monto = parseFloat(document.getElementById("monto").value);
    const plazo = parseInt(document.getElementById("plazo").value);
    const tasaInteres = parseFloat(document.getElementById("tasaInteres").value) / 100;
    
    // Validar los valores ingresados
    if (isNaN(monto) || isNaN(plazo) || isNaN(tasaInteres) || monto <= 0 || plazo <= 0 || tasaInteres <= 0) {
        alert("Por favor, ingresa valores válidos y positivos.");
        return;
    }

    // Crear la tabla de amortización
    let saldo = monto;
    let tablaHtml = `
        <table>
            <thead>
                <tr>
                    <th>Mes</th>
                    <th>Saldo Inicial</th>
                    <th>Interés</th>
                    <th>Amortización</th>
                    <th>Cuota</th>
                    <th>Saldo Final</th>
                </tr>
            </thead>
            <tbody>`;

    for (let mes = 1; mes <= plazo; mes++) {
        const interes = saldo * tasaInteres;
        const amortizacion = monto / plazo;
        const cuota = interes + amortizacion;
        const saldoInicial = saldo;
        saldo -= amortizacion;

        tablaHtml += `
            <tr>
                <td>${mes}</td>
                <td>${saldoInicial.toFixed(2)}</td>
                <td>${interes.toFixed(2)}</td>
                <td>${amortizacion.toFixed(2)}</td>
                <td>${cuota.toFixed(2)}</td>
                <td>${saldo.toFixed(2)}</td>
            </tr>`;
    }

    tablaHtml += `
            </tbody>
        </table>`;

    // Mostrar la tabla de amortización
    document.getElementById("resultado").innerHTML = tablaHtml;}