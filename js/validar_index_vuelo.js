 var radio=document.getElementById('partida').options[document.getElementById('partida').selectedIndex].value;


function validar_index(){
  var partida = document.getElementById('partida').options[document.getElementById('partida').selectedIndex].value;
  var destino = document.getElementById('llegada').options[document.getElementById('llegada').selectedIndex].value;
   if(partida==destino){
    alert("Lugar de partida no puede ser el mismo que el de llegada");
	return false;
   }
   else{
    return true;
   }
}

function validar_vuelos(){

      var elementos = document.getElementById("formulario_vuelos").elements;
	  var tipo = document.getElementById("tipo_viaje").value;
	  var longitud = document.getElementById("formulario_vuelos").length;
	  var contador=0;
	 
        for (var i = 0; i < longitud; i++){
          if(elementos[i].type == "radio" && elementos[i].checked == true){
            contador+=1;
           }
		 }
		 
		 if(tipo=="ida" && contador==1){
		    return true;
		 }
		 else{
		   if(tipo=="idaVuelta" && contador==2){
		      return true;
		    }
			else{
			alert("no ha hecho ninguna eleccion o solo una");
			return false;
			}
		}
}