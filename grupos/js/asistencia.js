function listarGrupos()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'grupos/grupos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarGrupos'
    );
}
function verIntegratesGrupo(idGrupo)
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'grupos/grupos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyIntegrantes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=verIntegratesGrupo'
        +'&idGrupo='+idGrupo
    );
}
function listarClienteFiltrado()
{
    //  alert('funcion javascript');
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarClienteFiltrado'
            +'&idCliente='+idCliente

    );
}
function listarClienteFiltradoDesdeGrupos()
{
    //  alert('funcion javascript');
    var id = document.getElementById('id').value;
    const http=new XMLHttpRequest();
    const url = 'grupos/grupos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarClienteFiltradoDesdeGrupos'
            +'&id='+id

    );
}


function formuNuevoGrupo()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'grupos/grupos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoCliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=formuNuevoGrupo'
    );

}

function grabarGrupo()
{
    //  alert('funcion javascript');
    var nombre = document.getElementById('nombre').value;
   
    // var idTipoContribuyente = document.getElementById('idTipoContribuyente').value;
    // var sede = document.getElementById('sede').value;
    const http=new XMLHttpRequest();
    const url = 'grupos/grupos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoCliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=grabarGrupo'
    +'&nombre='+nombre
   
    // +'&idTipoContribuyente='+idTipoContribuyente
    // +'&sede='+sede
    );

}





