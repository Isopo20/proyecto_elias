/*function calcularIMC() {
    const peso = parseFloat(document.getElementById('peso').value);
    const altura = parseFloat(document.getElementById('altura').value);
    const imc = peso / (altura * altura);
    const resultadoDiv = document.getElementById('resultado');
    
    let categoria = '';
    let color = '';
    
    if (imc < 18.5) {
        categoria = 'Bajo peso';
        color = 'blue';
    } else if (imc >= 18.5 && imc < 24.9) {
        categoria = 'Peso normal';
        color = 'green';
    } else if (imc >= 25 && imc < 29.9) {
        categoria = 'Sobrepeso';
        color = 'orange';
    } else {
        categoria = 'Obesidad';
        color = 'red';
    }
    
    resultadoDiv.innerHTML = `Tu IMC es: ${imc.toFixed(2)}<br>Clasificación: ${categoria}`;
    resultadoDiv.style.color = color;
}*/

function calcularIMC() {
    const peso = parseFloat(document.getElementById('peso').value);
    const altura = parseFloat(document.getElementById('altura').value);
    const imc = peso / (altura * altura);
    actualizarResultado(imc);
}

function actualizarResultado(imc) {
    const resultadoDiv = document.getElementById('resultado');
    const categorias = [
        { max: 18.5, categoria: 'Bajo peso', color: 'blue' },
        { max: 24.9, categoria: 'Peso normal', color: 'green' },
        { max: 29.9, categoria: 'Sobrepeso', color: 'orange' },
        { max: Infinity, categoria: 'Obesidad', color: 'red' }
    ];

    const { categoria, color } = categorias.find(rango => imc <= rango.max);

    resultadoDiv.innerHTML = `Tu IMC es: ${imc.toFixed(2)}<br>Clasificación: ${categoria}`;
    resultadoDiv.style.color = color;
}

function mimage(){
    /*var imagen=document.getElementById("primera");
    imagen.parentNode.removeChild(imagen);
    document.getElementById("primera").src="imagenes/caja.jpg";*/

    var imagen =document.getElementById("primera");

    if (imagen.style.visibility == "hidden" ){
        imagen.style.visibility = "visible";

    }else{
        imagen.style.visibility = "hidden";

    }

   

}