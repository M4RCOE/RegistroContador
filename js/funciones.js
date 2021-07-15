

var $table = $("#table");
$("#table td").each(function (e, value) {
	value.onclick = function (e) {
		if (e.target.value != "boton") {
			$.ajax({
				url: "http://localhost:82/Contador/php/respuesta3.php",
				type: "POST",
				data: {
					nombre: e.target.parentNode.childNodes[1].childNodes[0].nodeValue
				},
				success: function (res) {
					if(res=!"0"){
						let datos = JSON.parse(res);
                    	let tiempos = obtenerArraySemana(datos);
                    	charts['myChart'+e.target.parentNode.childNodes[0].innerText].data.datasets[0].data = tiempos;
					}                
				},
			});
			$("#mostrarModal" + e.target.parentNode.firstChild.innerText).modal(
				"show"
			);
		}
	};
});

//Funcion para obtener array de tiempos de la semana
function obtenerArraySemana(datos){
    let tiempos = [];
    datos.forEach(e => {
        let array = [];
        let d = e.tiempo;
        arrayTiempo = d.split(':');
        arrayTiempo.forEach(e => 
            array.push(parseInt(e))
        );
        let horas = array[0] + (array[1]/60) + (array[2]/3600);
        tiempos.push(parseFloat(horas.toFixed(2)));
    });
    return tiempos;
}


//Petición de insertar con php
function peticionInsertar(e) {
	$.ajax({
		url: "http://localhost:82/Contador/php/respuesta.php",
		type: "POST",
		data: $("#formulario").serialize(),
		success: function (res) {
			$("#respuesta").html(res);
		},
	});
}

//Petición de modificar con php
function peticionModificar(e) {
	$.ajax({
		url: "http://localhost:82/Contador/php/respuesta2.php",
		type: "POST",
		data: $("#formulario").serialize(),
		success: function (res) {
			$("#respuesta").html(res);
		},
	});
	//Input con el valor del tiempo actual
	$("#tiempo")[0].value =
		e.parentNode.parentNode.childNodes[1].childNodes[3].value = "0:0:0";
	e.parentNode.childNodes[1].innerHTML = "Iniciar";
	//Párrafo con el valor del tiempo actual
	e.parentNode.parentNode.childNodes[1].childNodes[7].innerText = "0:0:0";
}

//Acción al hacer click en el botón de enviar
function accionContador2(e) {
	f = new Date();
	$("#nombre")[0].value =
		e.parentNode.parentNode.childNodes[1].childNodes[0].nodeValue;
	$("#fecha")[0].value =
		f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate();
	$("#tiempo")[0].value =
		e.parentNode.parentNode.childNodes[1].childNodes[3].value;
	$("#tiempofinal")[0].value =
		f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds();
	clearInterval(intervalo[e.parentNode.childNodes[1].id]);
	peticionModificar(e);
}

//Acción de botón para activar el contador
function accionContador(e) {
	f = new Date();
	$("#nombre")[0].value =
		e.parentNode.parentNode.childNodes[1].childNodes[0].nodeValue;
	$("#fecha")[0].value =
		f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate();
	$("#tiempoinicial")[0].value =
		f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds();
	let botonContador = e;
	let contador = $("#contador" + e.id)[0];
	/* let contador2 = $("#contador2"+e.id)[0]; */
	let parrafoContador = $("#tiempohoy" + e.id)[0];
	let tiempoArray = contador.value.split(":");
	let tiempo = new Date(
		"2021",
		"07",
		"09",
		tiempoArray[0],
		tiempoArray[1],
		tiempoArray[2]
	);
	if (botonContador.innerHTML === "Iniciar") {
		peticionInsertar(e);
		botonContador.innerHTML = "Detener";
		intervalo[e.id] = setInterval(() => {
			tiempo = new Date(tiempo.getTime() + 1000);
			contador.value =
				tiempo.getHours() +
				":" +
				tiempo.getMinutes() +
				":" +
				tiempo.getSeconds();
			parrafoContador.innerText =
				tiempo.getHours() +
				":" +
				tiempo.getMinutes() +
				":" +
				tiempo.getSeconds();
			/* contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds(); */
		}, 1000);
	} else if (botonContador.innerHTML === "Detener") {
		clearInterval(intervalo[e.id]);
		botonContador.innerHTML = "Continuar";
	} else if (botonContador.innerHTML === "Continuar") {
		botonContador.innerHTML = "Detener";
		intervalo[e.id] = setInterval(() => {
			tiempo = new Date(tiempo.getTime() + 1000);
			contador.value =
				tiempo.getHours() +
				":" +
				tiempo.getMinutes() +
				":" +
				tiempo.getSeconds();
			/* contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds(); */
			parrafoContador.innerText =
				tiempo.getHours() +
				":" +
				tiempo.getMinutes() +
				":" +
				tiempo.getSeconds();
		}, 1000);
	}
}
