function mascota(){
    //const mascota="perro";
    var auxiliar = prompt('nombre');
    if(auxiliar==="perro"){
        alert("yo tengo un " + auxiliar);
    }
    else{
        alert("No existe")
    }
}
function mascota2(){
    var animal = prompt("Tipo de animal")
    switch(animal){
        case "loro":
            alert("yo tengo un " + animal);
            break;
            case "perro":
            alert("yo tengo un " + animal);
            break;
    }
}

function For(){
    var i;
    for (i=0;i<=10;i++){
        document.write(i);
        document.write("<br>")
    }
}
function whi(){
    var vacio = " ";
    while(vacio!="Rojo"){
        vacio= prompt("Dame un color"," Para salir ingreasa Rojo")
    }

}

function doo(){
    var color="";
    do{
        prompt("Dame un color");
    }
    while(color!=azul){
        document.write(color);
    }
}
function unico(){
    x=document.getElementById("uni").value;
    alert(x);
    a=document.getElementsByClassName("Nom_1").value;
    alert(a);
}
function sume(){
    x=document.getElementById("num1").value;
   
    y=document.getElementById("num2").value;
    
    z=document.getElementById("num3").value;

   
    suma=parseInt(x)+parseInt(y)+parseInt(z);
    alert(suma);

}

function selectores(){
    let x = document.getElementById("input_1").value;
    document.getElementById("input_1").value="hola";

    const coleccion=document.getElementsByClassName("formulario")
    alert(coleccion.length)
    coleccion.item(1).value;
    //document.getElementsByTagName("input")

    const css1=document.querySelector("formulario")//me trae el primer nodo que encuentre
    css1.nodeName
    alert(css1);
}

function miamage(){
    document.getElementById("one").scr="Jazz.jpg"
}