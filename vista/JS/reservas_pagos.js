const precioInput = document.getElementById("precio");
const cantidadSelect = document.getElementById("cantidad");
const totalInput = document.getElementById("total");


function formatoMoneda(valor) {
    return new Intl.NumberFormat("es-MX", {
        style: "currency",
        currency: "MXN",
        minimumFractionDigits: 2,
    }).format(valor);
}