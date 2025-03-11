function calculaDescuento(precio, descuento) {
    let descuentoAplicado = descuento * precio / 100;
    let precioFinalCalculado = precio - descuentoAplicado;
    return precioFinalCalculado;
}

const precioProducto = parseInt(prompt('Introdce el precio del producto'));

const descuentoProducto = parseInt(prompt('Introdce el descuento a aplicar'));

let precioFinal = calculaDescuento(precioProducto, descuentoProducto);

alert('El precio final del producto descontado un ' + descuentoProducto + '% es: ' + precioFinal);