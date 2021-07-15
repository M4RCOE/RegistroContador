//Inicialización de variables de intervalos, fecha y gráficas
var intervalo = {};
var f; 
var charts = {}

//Agregar onclick a la tabla de prestadores de servicio e inicializar el tiempo que lleva de la semana
function horasSemanales(){
    $("#table tr.datos").each(function (e,value){
        $.ajax({
            url: "http://localhost:82/Contador/php/respuesta3.php",
            type: "POST",
            data: {
                nombre: value.childNodes[1].childNodes[0].nodeValue,
            },
            success: function (res) {
				if(res!="0"){
					let datos = JSON.parse(res);
                	let tiempos = obtenerArraySemana(datos);
                	let suma = 0;
                	tiempos.forEach (function(numero){
                    	suma += numero;
                	});
                	$("#tiemposemana"+value.childNodes[0].innerText)[0].innerText = suma;
				}
            },
        });
    })
}
horasSemanales();