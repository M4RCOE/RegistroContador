    //Agregar onclick a la tabla de prestadores de servicio
    var $table = $("#table");
    $('#table td').each(function(e,value) {
        value.onclick = function(e){
            $("#mostrarModal"+e.target.parentNode.firstChild.innerHTML).modal('show');
        } 
    });


    //Petición de insertar con php
    function peticionInsertar(e){
        $.ajax({
            url: 'http://localhost:82/Contador/php/respuesta.php',
            type: 'POST',
            data: $("#formulario").serialize(),
            success: function(res){
                $("#respuesta").html(res);
            }
        });
    }

    //Petición de modificar con php
    function peticionModificar(e){
        $.ajax({
            url: 'http://localhost:82/Contador/php/respuesta2.php',
            type: 'POST',
            data: $("#formulario").serialize(),
            success: function(res){
                $("#respuesta").html(res);
            }
        }); 
        $("#tiempo")[0].value = e.parentNode.parentNode.childNodes[1].childNodes[2].value = "0:0:0"; 
        e.parentNode.childNodes[1].innerHTML = "Iniciar";
        e.parentNode.parentNode.childNodes[1].childNodes[4].innerText = "0:0:0"
    }

    function consulta(){
        $.ajax({
            url: 'http://localhost:82/Contador/php/respuesta3.php',
            success: function(res){
                $("#respuesta").html(res);
            }
        }); 
    }


    function accionContador2(e){
        f = new Date();
        $("#nombre")[0].value = e.parentNode.parentNode.childNodes[1].childNodes[0].nodeValue;
        $("#fecha")[0].value = f.getFullYear()+"-"+(f.getMonth()+1)+"-"+f.getDate(); 
        $('#tiempo')[0].value = e.parentNode.parentNode.childNodes[1].childNodes[2].value; 
        $("#tiempofinal")[0].value = f.getHours()+":"+f.getMinutes()+":"+f.getSeconds(); 
        clearInterval(intervalo[e.parentNode.childNodes[1].id])
        peticionModificar(e); 
    }

    function aber(e){
        cadena = e.parentNode.id;
        let indice = cadena.replace("nav-tab","");
        
    }
    
    //Acción de botón para activar el contador
    function accionContador(e){
        console.log(e.parentNode.parentNode.childNodes[1].childNodes[0].nodeValue);
        f = new Date();
        $("#nombre")[0].value = e.parentNode.parentNode.childNodes[1].childNodes[0].nodeValue;
        $("#fecha")[0].value = f.getFullYear()+"-"+(f.getMonth()+1)+"-"+f.getDate();
        $("#tiempoinicial")[0].value = f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
        let botonContador = e;
        let contador = $("#contador"+e.id)[0];
        /* let contador2 = $("#contador2"+e.id)[0]; */
        let parrafoContador = $('#tiempohoy'+e.id)[0];
        let tiempoArray = contador.value.split(':');
        let tiempo = new Date("2021","07","09",tiempoArray[0],tiempoArray[1],tiempoArray[2]);
        if(botonContador.innerHTML === "Iniciar"){
            peticionInsertar(e);
            botonContador.innerHTML = "Detener";
            intervalo[e.id] = setInterval(() => {
                tiempo = new Date(tiempo.getTime()+1000)
                contador.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
                parrafoContador.innerText = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
                /* contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds(); */
            }, 1000);          
        }else if(botonContador.innerHTML === "Detener"){
            clearInterval(intervalo[e.id]);
            botonContador.innerHTML = "Continuar";     
        }else if(botonContador.innerHTML === "Continuar"){
            botonContador.innerHTML = "Detener";
            intervalo[e.id] = setInterval(() => {
                tiempo = new Date(tiempo.getTime()+1000)
                contador.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
                /* contador2.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds(); */
                parrafoContador.innerText = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();
            }, 1000);
        }
    } 