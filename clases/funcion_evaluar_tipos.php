<?php
function evaluar_tipos($cantidad_reserva,$cantidad_espera,$array,$tipo_avion,$filas,$categoria,$value) { 

         if($cantidad_reserva < $array[$tipo_avion]){
			  $numero = $array[$tipo_avion] - $cantidad_reserva;
			     echo("<tr><td align='center'>".$filas['horario_partida']."</td>
				  <td align='center'>".$filas['horario_llegada']."</td>");
			  
			     if($categoria == "Primera"){
					  echo ("<td align='center'>-</div></td>
					  <td align='center'><input type='radio' name='$value' value='Reserva+$tipo_avion+".$filas['nro_vuelo']."'/>".$filas['precio_primera']."<div class='vuelo_asiento'>$numero</div></td>
					  </tr>");
				  }
				  else{
					   echo ("<td align='center'><input type='radio' name='$value' value='Reserva+$tipo_avion+".$filas['nro_vuelo']."'/>".$filas['precio_economica']."<div class='vuelo_asiento'>$numero</div></td>
					  <td align='center'>-</div></td>");
				  }
				  echo("</tr>");
		   
		 }
		 else{
			
			 
			   if($cantidad_espera < 10){
				  $numero = 10 - $cantidad_espera;
				  echo("<tr><td align='center'>".$filas['horario_partida']."</td>
				  <td align='center'>".$filas['horario_llegada']."</td>");
			  
					 if($categoria == "Primera"){
						  echo ("<td align='center'>-</div></td>
						  <td align='center'><input type='radio' name='$value' value='Espera+$tipo_avion+".$filas['nro_vuelo']."'/>".$filas['precio_primera']."<div class='vuelo_espera'>$numero</div></td>
						  </tr>");
					  }
					  else{
						   echo ("<td align='center'><input type='radio' name='$value' value='Espera+$tipo_avion+".$filas['nro_vuelo']."'/>".$filas['precio_economica']."<div class='vuelo_espera'>$numero</div></td>
						  <td align='center'>-</div></td>");
					  }
					  echo("</tr>");
			  
			  }
		}
}
?>