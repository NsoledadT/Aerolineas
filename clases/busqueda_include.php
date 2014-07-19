<?php
				               $tipo_primera = array( 2 => 10,
													  3 => 20,
													  4 => 30);
												
								$tipo_economica = array(1 => 30,
														2 => 70,
														3 => 105,
														4 => 120);
							   
							   
							   
							   /*--------------------------------------------------------------------------------------------------------------------
								Primero se verifica si la categoria elegida. Si es primera los nro_tipo deben ser o  2 ó 3 ó 4
								si es economica solo nro_tipo = 1
							   --------------------------------------------------------------------------------------------------------------------   */
							 
							   if($categoria == "Primera"){
							   
								/*-------------------------------------------------------------------------------------------------------------------- 
								Realiza busqueda de los vuelos de acuerdo a las elecciones del usuario en la pagina anterior : Lugar_Partida,
								Lugar_Llegada, dia de la semana y nro_tipo ya fue definido anteriormente 
								 --------------------------------------------------------------------------------------------------------------------*/
								 
								$lista = $baseDatos->resultToArray($baseDatos->consulta("SELECT * FROM `vuelo`,`vuelos_dias`,`dias_semana` , `avion`,`tipoavion` WHERE `vuelo`.`nro_vuelo` = `vuelos_dias`.`nro_vuelo` and `vuelos_dias`.`dias_semana` = `dias_semana`.`codigo_dia` and `vuelo`.`matricula_avion` =`avion`.`matricula` and `tipoavion`.`nro_tipo`= `avion`. `nro_tipo` and `vuelo`.`lugar_partida`='$partida' and`vuelo`.`lugar_llegada`='$llegada' and `dias_semana`.`dia_semana`='$dia_ida'
								and`tipoavion`.`nro_tipo`in (2,3,4)"));
								
								$nfilas_ida=count($lista);
								
								
								
								 if($nfilas_ida > 0){
								     echo ("<table class='recuadro_tabla'>");
						              echo("<tr><th>Salida</th><th>Llegada</th><th>Econ&oacute;mica</th><th>Primera</th></tr>");

								
									   foreach($lista as $filas){
									   
										/*-------------------------------------------------------------------------------------------------------------------- 
										obtiene de la lista el tipo de avion que me permite saber la capacidad en primera información que será utilizada  en la funcion que viene a continuación, cuenta en reservas de acuerdo a Nro_vuelo,Fecha_ida(aa-mm-dd),Clase, 
										Estado_pasaje = Reserva se guarda el valor en la variable cantidad_reserva 
										Si 
										La cantidad_reserva es menor a la cantidad maxima se guarda en  numero= cantidad_maxima - cantidad_reserva  
										que seria lo que falta para llegar a llenar la capacidad del vuelo	
										Sino 			
										Se busca a los que estan en estado_pasaje = Espera 
										Si 
										La cantidad_espera es menor a la cantidad maxima se guarda en  numero= cantidad_maxima - cantidad_espera  
										que seria lo que falta para llegar a llenar la capacidad en espera
										Sino 
										El vuelo no se muestra
										--------------------------------------------------------------------------------------------------------------------*/
										  $tipo_avion = $filas['nro_tipo'];
										  
										  $nro_vuelo = $filas['nro_vuelo'];
										  $cantidad_reserva = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Primera' and (`estado_pasaje`='Reserva' or `estado_pasaje`='Pago') and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
										  
									 	 $cantidad_espera = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Primera' and `estado_pasaje`='Espera' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
									
										   evaluar_tipos( $cantidad_reserva[0]['numero'], $cantidad_espera[0]['numero'],$tipo_primera, $tipo_avion, $filas,$categoria,$value);
										   }
										  echo ("</table>");
								     }
									
									
						            else{
						                 echo("No hay vuelos disponibles");
							            }
					     	       
							   }
							   
							   
							   else {
							   $lista = $baseDatos->resultToArray($baseDatos->consulta("SELECT * FROM `vuelo`,`vuelos_dias`,`dias_semana` , `avion`,`tipoavion` WHERE `vuelo`.`nro_vuelo` = `vuelos_dias`.`nro_vuelo` and `vuelos_dias`.`dias_semana` = `dias_semana`.`codigo_dia` and `vuelo`.`matricula_avion` =`avion`.`matricula` and `tipoavion`.`nro_tipo`= `avion`. `nro_tipo` and `vuelo`.`lugar_partida`='$partida' and`vuelo`.`lugar_llegada`='$llegada' and `dias_semana`.`dia_semana`='$dia_ida'
								and`tipoavion`.`nro_tipo`in (1,2,3,4)"));
								
								$nfilas_ida=count($lista);
								
								if($nfilas_ida > 0){
								     echo ("<table class='recuadro_tabla'>");
						              echo("<tr><th>Salida</th><th>Llegada</th><th>Econ&oacute;mica</th><th>Primera</th></tr>");

								
									   foreach($lista as $filas){
									   
										/*-------------------------------------------------------------------------------------------------------------------- 
										obtiene de la lista el tipo de avion que me permite saber la capacidad en primera información que será utilizada en el
										switch que viene a continuacion, cuenta en reservas de acuerdo a Nro_vuelo,Fecha_ida(aa-mm-dd),Clase, 
										Estado_pasaje = Reserva se guarda el valor en la variable cantidad_reserva 
										Si 
										La cantidad_reserva es menor a la cantidad maxima se guarda en  numero= cantidad_maxima - cantidad_reserva  
										que seria lo que falta para llegar a llenar la capacidad del vuelo	
										Sino 			
										Se busca a los que estan en estado_pasaje = Espera 
										Si 
										La cantidad_espera es menor a la cantidad maxima se guarda en  numero= cantidad_maxima - cantidad_espera  
										que seria lo que falta para llegar a llenar la capacidad en espera
										Sino 
										El vuelo no se muestra
										--------------------------------------------------------------------------------------------------------------------*/
										  $tipo_avion = $filas['nro_tipo'];
										  
										  $nro_vuelo = $filas['nro_vuelo'];
										  $cantidad_reserva = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Economica' and  (`estado_pasaje`='Reserva' or `estado_pasaje`='Pago') and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
										  
										 
										  
									 	 $cantidad_espera = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Economica' and `estado_pasaje`='Espera' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
									
										  
										  evaluar_tipos( $cantidad_reserva[0]['numero'], $cantidad_espera[0]['numero'],$tipo_economica,$tipo_avion, $filas,$categoria,$value);
											
											
										}
										 echo ("</table>");
								   	}
									
									 else{
						                 echo("No hay vuelos disponibles");
							            }
								}
					     	     
				 ?>