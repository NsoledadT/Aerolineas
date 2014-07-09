<?php
function traer_codigo($result){


foreach ($result as $value) {
	$codigo_visible = $value['codigo_reserva'];	
}
return $codigo_visible;
}
?>