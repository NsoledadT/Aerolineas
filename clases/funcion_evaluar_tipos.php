<?php
function evaluar_tipos($cantidad_reserva,$cantidad_espera,$capacidad_maxima,$filas) {  

      if($cantidad_reserva < $capacidad_maxima){
			  $numero = $capacidad_maxima - $cantidad_reserva;
				echo ("<tr>
				  <td align='center'>".$filas['horario_partida']."</td>
				  <td align='center'>".$filas['horario_llegada']."</td>
				  <td align='center'>-</div></td>
				  <td align='center'><input type='radio' name='vuelo_ida' value='primera+".$filas['nro vuelo']."'/>".$filas['precio_primera']."<div class='vuelo_asiento'>$numero</div></td>
				  </tr>");
		   
		 }
		 else{
			
			 
			   if($cantidad_espera < 10){
				  $numero = 10 - $cantidad_espera;
				  echo ("<tr>
				  <td align='center'>".$filas['horario_partida']."</td>
				  <td align='center'>".$filas['horario_llegada']."</td>
				  <td align='center'>-</div></td>
				  <td align='center'><input type='radio' name='vuelo_ida' value='primera+".$filas['nro vuelo']."'/>".$filas['precio_primera']."<div class='vuelo_espera'>$numero</div></td>
				  </tr>");
			  
			  }
		}
}
?>