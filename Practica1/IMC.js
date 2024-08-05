function CalcularIMC(){
    var weight = document.getElementById('weight').value;
    var height = document.getElementById('height').value;

    if(weight !== '' && height !== ''){
        var bmi = weight / ((height / 100) ** 2);
        var resultado = document.getElementById('resultado');
        resultado.innerHTML = 'Tu IMC es: ' + bmi.toFixed(2);

        if(bmi < 18.5){
            resultado.innerHTML += '- Bajo peso';
            resultado.style.color = 'blue';
        } else if(bmi < 25) {
            resultado.innerHTML += '- Peso normal';
            resultado.style.color = 'green';
        } else if(bmi < 30){
            resultado.innerHTML += '- Sobrepeso';
            resultado.style.color = 'orange';
        } else {
            resultado.innerHTML += '- Obesidad';
            resultado.style.color = 'red';
        }
    }
}