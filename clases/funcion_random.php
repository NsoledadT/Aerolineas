<?php
function random($result){
	$codigo_reserva = mt_rand(1,1000);

	$i = 0;
	$vector = array(0);
	foreach ($result as $var) {
		$vector[$i] = $var['codigo_reserva'];
		$i++;
	}

	$i = 0;
	if($vector[0] != 0){
				
		while($i < count($vector)){
				if($vector[$i] != $codigo_reserva){
					
					$i++;
					
				}else{
						$i = 0;
						$codigo_reserva = mt_rand(1,1000);
					
				}
		}

		return $codigo_reserva;
	}else{
		
		return $codigo_reserva;
	}

}

?>