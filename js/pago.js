function valida_pago(){
                      var combo1 = document.getElementById("tipo_documento");
					  if (combo1.value == null || combo1.value == ""){
					  alert('Seleccione un tipo de documento');
					  return false;
					  } 
                      var b=0;
					  var seleccion_tarjetas = document.getElementsByName("tarjetas");
					  for(i=0;i<seleccion_tarjetas.length;i++){
					   if(seleccion_tarjetas.item(i).checked == false) {
					       b++;
						   }
					    }
                       
					   if(b==seleccion_tarjetas.length){
					     alert('Seleccione una tarjeta');
						 return false;
					     }
					   
					   var digi = document.getElementById("digitos").value;
					   if(digi == null || digi == "" || !(/^\d{6}$/.test(digi))){
					    alert('No ha escrito los primeros seis digitos de su tarjeta');
						return false;
					     }	 
					   var c=0;
                       var cant_cuotas = document.getElementsByName("cuotas");
                       for(j=0;j<cant_cuotas.length;j++){
					     if(cant_cuotas.item(j).checked == false){
						    c++;
						    } 
					      }
						  
					    if(c==cant_cuotas.length){
						alert('Seleccione cantidad de cuotas');
						return false;
						}
						
                      }