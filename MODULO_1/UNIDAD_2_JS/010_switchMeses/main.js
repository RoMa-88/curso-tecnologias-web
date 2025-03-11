/*Convierte un número del 1 al 12 en 
el nombre del mes correspondiente.
 El programa debe solicitar al usuario 
 que ingrese un número del 1 al 12 y luego
  mostrar el nombre del mes asociado.
Ejemplo :
Ingresa un número del 1 al 12 para saber el
 mes correspondiente: 9
El mes correspondiente al número 9 es: Septiembre*/



let mesUsuario = parseInt(prompt('Escribe un número del 1 al 12 para saber a qué mes corresponde'));

//si el numero no es correcto (con todos sus casos)..
if (isNaN(mesUsuario) || mesUsuario < 1 || mesUsuario > 12) {
    alert(mesUsuario + " no corresponde a ningún mes");
}
//en caso que no se cumpla la condicion anterior(entonces el usuario habra introducidoel valor correcto)
else {
    let mes;
    switch (mesUsuario) {
        case 1:
            mes = "Enero";
            break;

        case 2:
            mes = "Febrero";
            break;


        case 3:
            mes = "Marzo";
            break;

        case 4:
            mes = "Abril";
            break;

        case 5:
            mes = "Mayo";
            break;

        case 6:
            mes = "Junio";
            break;

        case 7:
            mes = "Julio";
            break;

        case 8:
            mes = "Agosto";
            break;

        case 9:
            mes = "Septiembre";
            break;

        case 10:
            mes = "Octubre";
            break;

        case 11:
            mes = "Noviembre";
            break;

        case 12:
            mes = "Diciembre";
            break;
    }

    alert("El número " + mesUsuario + " corresponde al mes de: " + mes);

}

