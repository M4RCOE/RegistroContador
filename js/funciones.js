    var $table = $("#table");
    $('#table td').each(function(e,value) {
        value.onclick = function(e){
            $("#mostrarModal"+e.target.parentNode.firstChild.innerHTML).modal('show');
        } 
    });


    function accionBotonDos(e){
        $.ajax({
            url: 'http://localhost:82/Contador/js/respuesta.php',
            type: 'POST',
            data: $("#formulario").serialize(),
            success: function(res){
                $("#respuesta").html(res);
            }
        });
    }


    function accionBoton(e){
        f = new Date();
        $("#nombre")[0].value = e.parentNode.parentNode.childNodes[1].innerHTML;
        $("#fecha")[0].value = f.getFullYear()+"-"+(f.getMonth()+1)+"-"+f.getDate();
        $("#tiempoinicial")[0].value = f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
        let botonContador = e;
        let contador = $("#contador"+e.id)[0];
        let contador2 = $("#contador2"+e.id)[0];
        let tiempoArray = contador.value.split(':');
        let tiempo = new Date("2021","07","09",tiempoArray[0],tiempoArray[1],tiempoArray[2]);
        if(botonContador.innerHTML === "Iniciar"){
            botonContador.innerHTML = "Detener";
            intervalo[e.id] = setInterval(() => {
                tiempo = new Date(tiempo.getTime()+1000)
                contador.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
                contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
            }, 1000);          
        }else if(botonContador.innerHTML === "Detener"){
            clearInterval(intervalo[e.id]);
            botonContador.innerHTML = "Continuar";     
        }else if(botonContador.innerHTML === "Continuar"){
            botonContador.innerHTML = "Detener";
            intervalo[e.id] = setInterval(() => {
                tiempo = new Date(tiempo.getTime()+1000)
                contador.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
                contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
            }, 1000);
        }
    } 