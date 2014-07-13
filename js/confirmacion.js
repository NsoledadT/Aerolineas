function valida_pago(){
                   var combo1 = document.getElementById("tipo_documento");
			       if(combo1.value == null || combo1.value ==""){
			        alert('Seleccione un tipo de documento');
			      return false;
			         }
				 var combo2 = document.getElementById("provincias");
			    if(combo2.value == null || combo2.value ==""){
			    alert('Seleccione una provincia');
			    return false;
			       } 	 
				   
				 var b=0, seleccion_tarjetas=document.getElementsByName("tarjetas");
                 for(j=0;j<seleccion_tarjetas.length;j++){
				 if(seleccion_tarjetas.item(j).checked == false){
				 b++;
				  }
				 }
                 if(b==seleccion_tarjetas.length){
				 alert("Seleccione una tarjeta");
				 return false;
				 }   				 
				
				var digi = document.getElementById("digitos").value;
				if(digi == null || digi == ""){
				alert('No ha escrito los primeros seis digitos de su tarjeta');
				return false;
				}

				var c=0, cant_cuotas=document.getElementsByName("cuotas");
                 for(i=0;i<cant_cuotas.length;i++){
				 if(cant_cuotas.item(i).checked == false){
				 c++;
				  }
				 }
                 if(c==cant_cuotas.length){
				 alert("Seleccione cantidad de cuotas");
				 return false;
				 }

                }