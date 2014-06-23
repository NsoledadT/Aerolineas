<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
 <link type="text/css" rel="stylesheet" href="../js/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    $( "#tabs_vuelos" ).tabs();
	$( "#tabs_vuelos_2" ).tabs();
	$( "#tabs_vuelos" ).tabs({ active:3 });
	$( "#tabs_vuelos_2" ).tabs({ active:3 });
  });
 
  </script>
  
  <?php
   include("../clases/funcionFecha.php");
    include("../clases/funcion_evaluar_tipos.php");
   include("../clases/DataBase.php");
   $baseDatos = new DataBase();
   $partida = $_POST['partida'];
   $categoria = $_POST['categoria'];
   $tipo_viaje=$_POST['tipoViaje'];
   $llegada =$_POST['destino'];
   $fecha_ida =$_POST['fechaPartida'];
   $fecha_vuelta =$_POST['fechaDestino'];
   $fecha_ida_invertir = fechaDma($fecha_ida);
   $fecha_vuelta_invertir = fechaDma($fecha_vuelta);
  
   $lista_vuelta = $baseDatos->resultToArray($baseDatos->consulta("select * from vuelo where lugar_partida='$llegada' and lugar_llegada='$partida'"));
 
   $dias = array('nada','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
   $dia_ida=$dias[date('N', strtotime($_POST['fechaPartida']))];
   $dia_vuelta=$dias[date('N', strtotime($_POST['fechaDestino']))];
   $nfilas_vuelta=count($lista_vuelta);
	


?>
</head>
<body>
 <div id="general">
     <div id="encabezado">
	   <div id="formulario">
        <form action="usuario.html" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="text" name="usuario"/></p>
		<p><input type="image" src="../img/boton_enviar.png" /></p>
        </form>
		</div>
	</div>
    <div id="encabezado_medio_vuelos">
	<img src="../img/logotipo_chico.png" id="logotipo" alt="logotipo aerolinea rutics" width="242" height="100"/>
	<img src="../img/chica_vuelos.png" class="aeromoza" alt="azafata" width="227" height="280"/>
	<ul>
	  <li><a href="pag/empresa.html">LA EMPRESA</a></li>
	  <li><a href="pag/reservas.html">RESERVAS </a></li>
	  <li><a href="pag/informacion.html">INFORMACION</a></li>
	  <li><a href="pag/corporativo.html">CORPORATIVO</a></li>
	</ul>
    </div>
	
   <div id="contenido">
     <div id="menu_lateral">
	    <div id="menu_contenedor_li">
		   <p>01</p>
		  <div id="contenedor_li">
		  <div class="blanco_columna_li">
		  </div>
		     <a href="vuelos.html">Selecciona tu vuelo</a>
			 <a href="verificacion.html">Verifica tu elecci&oacute;n</a>
			 <a href="datos.html">Completa tus datos</a>
			 <a href="confirmacion.html">Compra tu pasaje</a>
			 <a href="reserva.html">Reserva tu asiento</a>
		   </div>
		</div>
	 </div>
	 <div id="columna_contenido">
	   <div id="barra_titulo">
	   <img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16"/>
	   <h4>SELECCIONA TU VUELO</h4>
	   </div>
	   <form action="verificacion.php" method="POST">
	   <p>La tarifa informada en este paso corresponde a una tarifa base para pasajero
	   oculto y no incluye tasas ni impuestos. En el pr&oacute;ximo paso podr&aacute;s ver la tarifa
	   total a abonar. Al combinar tarifas con diferentes condiciones, las regulaciones m&aacute;
	   restrictivas ser&aacute;n aplicadas para todos el billete.</p>
	    <img src="../img/chica_vuelos_chico.gif" alt="imagen de recepcionista" width="137" height="179"/>
		<div class="espacio_blanco"></div>
			 <p><img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16" class="cuadradito"/><span class="titulito">IDA</span></p>
		     <h5>IDA</h5>
			 <div id="tabs_vuelos">
	            <ul>
                  <li><a href="#tabs-1">Fecha 1</a></li>
                  <li><a href="#tabs-2">Fecha 2</a></li>
	              <li><a href="#tabs-3">Fecha 3</a></li>
				  <li><a href="#tabs-4"><?php echo($dia_ida); ?></a></li>
                  <li><a href="#tabs-5">Fecha 5</a></li>
	              <li><a href="#tabs-6">Fecha 6</a></li>
				  <li><a href="#tabs-7">Fecha 7</a></li>
                </ul>
	           <?php
				                echo("<div id='tabs-4'>");
								
								
					 
				                /*--------------------------------------------------------------------------------------------------------------------
								Primero se verifica si la categoria elegida. Si es primera los nro_tipo deben ser o  2 ó 3 ó 4
								si es economica solo nro_tipo = 1
							   --------------------------------------------------------------------------------------------------------------------   */
							 
							   if($categoria == "Primera"){
							   
								/*-------------------------------------------------------------------------------------------------------------------- 
								Realiza busqueda de los vuelos de acuerdo a las elecciones del usuario en la pagina anterior : Lugar_Partida,
								Lugar_Llegada, dia de la semana y nro_tipo ya fue definido anteriormente 
								 --------------------------------------------------------------------------------------------------------------------*/
								 
								$lista = $baseDatos->resultToArray($baseDatos->consulta("SELECT * FROM `vuelo`,`vuelos_dias`,`dias_semana` , `avion`,`tipoavion` WHERE `vuelo`.`nro vuelo` = `vuelos_dias`.`nro_vuelo` and `vuelos_dias`.`dias_semana` = `dias_semana`.`codigo_dia` and `vuelo`.`matricula avion` =`avion`.`matricula` and `tipoavion`.`nro_tipo`= `avion`. `nro tipo` and `vuelo`.`lugar_partida`='$partida' and`vuelo`.`lugar_llegada`='$llegada' and `dias_semana`.`dia_semana`='$dia_ida'
								and`tipoavion`.`nro_tipo`in (2,3,4)"));
								
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
										  $cantidad_reserva = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Primera' and `estado pasaje`='Reserva' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
										  
									 	 $cantidad_espera = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Primera' and `estado pasaje`='Espera' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
									
										  
											 switch($tipo_avion){
												case 2:
													  evaluar_tipos( $cantidad_reserva[0]['numero'], $cantidad_espera[0]['numero'], 10 , $filas);
												      break;
												
												case 3:
													 evaluar_tipos( $cantidad_reserva[0]['numero'],$cantidad_espera[0]['numero'], 20 ,$filas);
												     break;
													 
											   case 4:
													 evaluar_tipos( $cantidad_reserva[0]['numero'],$cantidad_espera[0]['numero'], 30 ,$filas);
												     break;
											 
											    }
										   }
										  echo ("</table>");
								     }
									
									
						            else{
						                 echo("No hay vuelos disponibles");
							            }
					     	       
							   }
							   
							   
							   else {
							    $lista = $baseDatos->resultToArray($baseDatos->consulta("SELECT * FROM `vuelo`,`vuelos_dias`,`dias_semana` , `avion`,`tipoavion` WHERE `vuelo`.`nro vuelo` = `vuelos_dias`.`nro_vuelo` and `vuelos_dias`.`dias_semana` = `dias_semana`.`codigo_dia` and `vuelo`.`matricula avion` =`avion`.`matricula` and `tipoavion`.`nro_tipo`= `avion`. `nro tipo` and `vuelo`.`lugar_partida`='$partida' and`vuelo`.`lugar_llegada`='$llegada' and `dias_semana`.`dia_semana`='$dia_ida'
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
										  $cantidad_reserva = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Economica' and `estado pasaje`='Reserva' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
										  
									 	 $cantidad_espera = $baseDatos->resultToArray($baseDatos->consulta("SELECT count(*) as numero from `reserva` where clase='Economica' and `estado pasaje`='Espera' and fecha_reserva='$fecha_ida_invertir' and nro_vuelo='$nro_vuelo'"));
									
										  
											 switch($tipo_avion){
												case 1:
													  evaluar_tipos( $cantidad_reserva[0]['numero'], $cantidad_espera[0]['numero'], 10 , $filas);
												      break;
												
												case 2:
													 evaluar_tipos( $cantidad_reserva[0]['numero'],$cantidad_espera[0]['numero'], 20 ,$filas);
													 break;
												
												case 3:
													 evaluar_tipos( $cantidad_reserva[0]['numero'],$cantidad_espera[0]['numero'], 30 ,$filas);
													 break;
												
												case 4:
													 evaluar_tipos( $cantidad_reserva[0]['numero'],$cantidad_espera[0]['numero'], 30 ,$filas);
												     break;
											 
											  }
										 }
										 echo ("</table>");
								   	}
									
									 else{
						                 echo("No hay vuelos disponibles");
							            }
								}
					     	      echo("</div>");
				 ?>
			
			 <div id="tabs-2">
			  <h1>Natalia soledad Tocci tab 2</h1>
			 </div>
			 
			  <div id="tabs-3">
			 <h1>Natalia soledad Tocci tab 3</h1>
			 </div>
			  <div id="tabs-1">
			  <h1>Natalia soledad Tocci tab 4</h1>
			 </div>
			  <div id="tabs-5">
			 <h1>Natalia soledad Tocci tab 5</h1>
			 </div>
			   <div id="tabs-6">
			 <h1>Natalia soledad Tocci tab 6</h1>
			 </div>
			   <div id="tabs-7">
			 <h1>Natalia soledad Tocci tab 7</h1>
			 </div>
			 </div>
		       <?php 
			 if(strlen($tipo_viaje) > 3){
			   echo('<p><img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16" class="cuadradito"/><span class="titulito">IDA</span></p>
		         <h5>IDA</h5>
			     <div id="tabs_vuelos_2">
	                <ul>
                  <li><a href="#tabs-1-a">Fecha 1</a></li>
                  <li><a href="#tabs-2-a">Fecha 2</a></li>
	              <li><a href="#tabs-3-a">Fecha 3</a></li>
				  <li><a href="#tabs-4-a">'.$fecha_vuelta.'</a></li>
                  <li><a href="#tabs-5-a">Fecha 5</a></li>
	              <li><a href="#tabs-6-a">Fecha 6</a></li>
				  <li><a href="#tabs-7-a">Fecha 7</a></li>
                </ul>
	           <div id="tabs-4-a">');
		            if($nfilas_vuelta > 0){
						      echo ("<table class='recuadro_tabla'>");
						      echo("<tr><th>Salida</th><th>Llegada</th><th>Econ&oacute;mica</th><th>Primera</th></tr>");
						         foreach($lista as $filas){
								    echo ("<tr><td>".$filas['horario_partida']."</td><td>".$filas['horario_llegada']."</td>
									 <td><input type='radio' name='vuelo_ida' value='economica+".$filas['nro vuelo']."'></input>".$filas['precio_economica']."</td><td>
									 <input type='radio' name='vuelo_ida' value='primera+".$filas['nro vuelo']."'></input>".$filas['precio_primera']."</td>");
		                           }
							   echo ("</table>");
						    }
						    else{
						       echo("No hay vuelos disponibles");
							 }
				echo("</div>
				</div>");
				}
				?>
				<p><a href="../index.php"><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></a></p>
		        <p id="boton_continuar"><input type="image" src="../img/continuar.png"  alt="boton continuar"/></p>
				</form>
	   </div>
	</div>
    <div id="pie">
     <img src="../img/logotipo_pie.png" alt="logotipo Aerolineas Rutics" width="251" height="76"/>
	 <div class="espacio_blanco_pie"></div>
	 <h2>(011)4667-8907 / 011)4667-8907 </h2>
	 <p>aerolineasRustics.com Sitio Oficial de Aerolineas. © 1996 - 2014 Aerolíneas Rustics S.A.
      Legales | Condiciones Generales de Transporte | Mapa del Sitio | Ud. est&aacute; en un SITIO SEGURO</p>
     </div>
</div>
</body>
</html>