<?php
	function consulta($query){
		$conexion = mysql_connect('localhost','root','');
		if(!$conexion){
			
			mysql_close($conexion);
			
			return "hubo error al conectarse a la base";
		}else{
			
			if(!mysql_select_db("aerolineas",$conexion)){
			
			 mysql_close($conexion);
			
			 return "no se puso seleccionar la base!";			
			
			}else{
					if(!mysql_query($query,$conexion)){
								mysql_close();
							return "sus datos no pudieron ser registrados correctamente!";
								}else{
									return "sus datos fueron registrados con exito!";
								}
								mysql_close($conexion);
							}
		 }
	
	}

	?>