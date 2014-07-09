    <?php
	session_start();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />

   <?php
    include("../clases/DataBase.php");
	$vuelo_ida =$_POST['vuelo_ida'];
	$vuelo_ida_separada = explode("+",$vuelo_ida);
	$clase=$texto = strtolower($_SESSION['clase']);
	$estado_pasaje=$vuelo_ida_separada[0];
	$tipo_avion=$vuelo_ida_separada[1];
	$nro_vuelo_ida=$vuelo_ida_separada[2];
	$baseDatos = new DataBase();
	$fila = $baseDatos->resultToArray($baseDatos->consulta("select * from vuelo, tipoavion, avion where`vuelo`.`matricula_avion`=`avion`.`matricula`
    and `avion`.`nro_tipo` = `tipoavion`.`nro_tipo` and `vuelo`.`nro_vuelo`= '$nro_vuelo_ida'"));
    $precio=$fila[0]['precio_'.$clase] ;
	if(isset($_POST['vuelo_vuelta'])){
		  $vuelo_vuelta =$_POST['vuelo_vuelta'];
		  $vuelo_vuelta_separada = explode("+",$vuelo_vuelta);
		  $estado_pasaje_vuelta=$vuelo_vuelta_separada[0];
		  $tipo_avion_vuelta=$vuelo_vuelta_separada[1];
		  $nro_vuelo_vuelta=$vuelo_vuelta_separada[2];
		  $fila2 = $baseDatos->resultToArray($baseDatos->consulta("select * from vuelo, tipoavion, avion where`vuelo`.`matricula_avion`=`avion`.`matricula`
          and `avion`.`nro_tipo` = `tipoavion`.`nro_tipo` and `vuelo`.`nro_vuelo`= '$nro_vuelo_vuelta'"));
		  $precio=$fila[0]['precio_'.$clase]* 2 ;
		  $tasa=$precio * 1.21;
		  $_SESSION['tipo_viaje_vuelta'] =  $tipo_avion_vuelta;
		  $_SESSION['nro_vuelo_vuelta'] = $nro_vuelo_vuelta;
		  $_SESSION['estado_pasaje_vuelta'] = $estado_pasaje_vuelta;
	}
	else{
	  $tasa=$precio* 1.21;
	}
	
	$_SESSION['nro_vuelo_ida'] = $nro_vuelo_ida;
	$_SESSION['estado_pasaje_ida'] = $estado_pasaje;
	$_SESSION['tipo_viaje_ida'] = $tipo_avion;
	
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
		   <p>02</p>
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
	   <h4>VERIFICA TU ELECCION</h4>
	   </div>
	   <p>Conoce las condiciones de la tarifa</p>
	    <img src="../img/chica_vuelos_chico.gif" alt="imagen de recepcionista" width="137" height="179"/>
		<div class="espacio_blanco"></div>
		 <div id="tarifa">
		   <p>Tarifa<span><?php echo($tasa); ?></span></p>
		   <h6><?php echo($precio." + IVA = $tasa" ); ?></h6>
		 </div>
		 <p><img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16" /><span class="titulito">IDA</span></p>
		     <div class="recuadro_tabla_verificacion">
				<table>
				    <tr>
				    <td><span>salida:</span></td>
					<td>Dia año de salida</td>
					<td>Aerolinea Rustics</td>
					</tr>
					<tr>
					<td><?php echo($fila[0]['horario_partida']); ?></td>
					<td><?php echo($fila[0]['lugar_partida']); ?></td>
					<td><?php echo("caracteristicas del vuelo Nro:" .$nro_vuelo_ida);?></td>
					</tr>
					<tr>
					<td><span>Llegada:</span></td>
					<td><?php echo($_SESSION['fecha_ida']);?></td>
					<td><?php echo("Cabina:".$_SESSION['clase']." +/Modelo:".$fila[0]['modelo']); ?></td>
					</tr>
					<tr>
					<td><?php echo($fila[0]['horario_llegada']);?></td>
					<td><?php echo($fila[0]['lugar_llegada']); ?></td>
					<td>&nbsp;</td>
					</tr>
				</table>
			 </div>
			 <?php
			 if(isset($_POST['vuelo_vuelta'])){
		     echo("<p><img src='../img/cuadradito.gif' alt='cuadradito' width='16' height='16' /><span class='titulito'>VUELTA</span></p>
		     <div class='recuadro_tabla_verificacion'>
				<table>
				   <tr>
				    <td><span>salida:</span></td>
					<td>Dia de salida</td>
					<td>Aerolinea Rustics</td>
					</tr>
					<tr>
					<td>".$fila2[0]['horario_partida']."</td>
					<td>".$fila2[0]['lugar_partida']. "</td>
					<td>caracteristicas del vuelo:" .$nro_vuelo_vuelta."</td>
					</tr>
					<tr>
					<td><span>Llegada:</span></td>
					<td>".$_SESSION['fecha_vuelta']."</td>
					<td>Cabina:".$_SESSION['clase']." +/Modelo:".$fila2[0]['modelo']."</td>
					</tr>
					<tr>
					<td>".$fila2[0]['horario_llegada']."</td>
					<td>".$fila2[0]['lugar_llegada']."</td>
					<td>&nbsp;</td>
					</tr>
				</table>
		     </div>");
			 }
			 ?>
			 <div id="recuadrito_tarifa">
			 <h4>Tarifa</h4>
			 <p>Tarifa base</p>
			 <p><span><?php echo($precio); ?></span></p>
			 <p>Impuesto</p>
			 <p><span><?php echo("21%"); ?></span></p>
			 <hr/>
			 <p><span><?php echo($precio." + IVA = $tasa" ); ?></span></p>
			 </div>
				<p><a href="vuelos.php"><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></a></p>
		        <p id="boton_continuar"><a href="datos.php"><input type="image" src="../img/continuar.png"  alt="boton continuar"/></a></p>
			 <div class="espacio_blanco_formulario"></div>
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