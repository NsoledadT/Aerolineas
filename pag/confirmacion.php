<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aerolinea Rustics</title>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<script type="text/javascript" src="../js/tarjeta_seleccionada.js"></script>
<script type="text/javascript" src="../js/confirmacion.js"></script>
<?php 
include("../clases/DataBase.php");
$baseDatos = new DataBase("");

if (isset($_POST['cod_reserva'])){
	             $codigoReserva = $_POST['cod_reserva'];
				 $_SESSION['cod_reserva']=$codigoReserva;      }
if(isset($_POST['dni_pasajero'])){
             $dniPasajero = $_POST['dni_pasajero'];
             }


$reserva = $baseDatos -> consulta("select clase, nro_vuelo from `reserva` where codigo_reserva='$codigoReserva'");
$datosPasajeros = $baseDatos -> consulta("select nombre, apellido from `pasajero` where dni='$dniPasajero'");		 
$vuelos = $baseDatos -> consulta("select * from `vuelo`, `reserva` WHERE `vuelo`.`nro_vuelo` = `reserva`.`nro_vuelo` and `codigo_reserva`='$codigoReserva'");	

//$precio = $baseDatos->consulta("SELECT reserva.codigo_reserva, reserva.nro_vuelo, vuelo.precio_economica, vuelo.precio_primera, pasajero.dni FROM reserva
//INNER JOIN vuelo ON reserva.nro_vuelo = vuelo.nro_vuelo INNER JOIN boarding_pass ON reserva.codigo_reserva = boarding_pass.codigo_reserva INNER JOIN
 //pasajero ON boarding_pass.dni = pasajero.dni WHERE reserva.codigo_reserva = '$codigoReserva'");

//$precioEconomica = $baseDatos -> consulta("SELECT reserva.codigo_reserva, reserva.nro_vuelo, vuelo.precio_economica, pasajero.dni
//FROM reserva
//INNER JOIN vuelo ON reserva.nro_vuelo = vuelo.nro_vuelo
//INNER JOIN pasaje ON reserva.codigo_reserva = pasaje.codigo_reserva
//INNER JOIN pasajero ON pasaje.dni = pasajero.dni
//WHERE reserva.codigo_reserva"); 		

//$precioPrimera= $baseDatos ->consulta("SELECT reserva.codigo_reserva, reserva.nro_vuelo, vuelo.precio_primera, pasajero.dni
//FROM reserva
//INNER JOIN vuelo ON reserva.nro_vuelo = vuelo.nro_vuelo
//INNER JOIN pasaje ON reserva.codigo_reserva = pasaje.codigo_reserva
//INNER JOIN pasajero ON pasaje.dni = pasajero.dni
//WHERE reserva.codigo_reserva"); 	

$sql6= $baseDatos->consulta("select nro_vuelo, clase from reserva where codigo_reserva = '$codigoReserva'");
while($row = mysql_fetch_row($sql6)){
$row[0];
$row[1];
$nro_vuelo=$row[0];
$clase=$row[1];
}

$sql10=$baseDatos->consulta("select precio_economica, precio_primera from vuelo where nro_vuelo='$nro_vuelo'");
while($row2=mysql_fetch_array($sql10)){
$row2[0];
$row2[1];
$precio_econ=$row2[0];
$precio_prim=$row2[1];
}

//$sql7=$baseDatos->consulta("select precio_economica from vuelo where nro_vuelo='$nro_vuelo'");
//while($row2= mysql_fetch_row($sql7))
//{
//$row2[0];
//$precio_econ=$row2[0];
//}

//$sql8=$baseDatos->consulta("select precio_primera from vuelo where nro_vuelo='$nro_vuelo'");
//while($row3= mysql_fetch_row($sql8))
//{
//$row3[0];
//$precio_prim=$row3[0];
//}

$preciopasaje = $precio_econ;
$preciopasaje2 = $precio_prim;

$int_mensual = 0.03;
$cuota1 = 1;
$cuota2 = 3;
$cuota3 = 6;
$cuota4 = 12;
$iva = $preciopasaje * 1.21;
$iva2 = $preciopasaje2 * 1.21;
$resultado1= $iva + ($iva * $int_mensual) * ($cuota2);
$resultado2= $iva + ($iva * $int_mensual) * ($cuota3);
$resultado3= $iva + ($iva * $int_mensual) * ($cuota4);
$resultado4= $iva2 + ($iva2 * $int_mensual) * ($cuota2);
$resultado5= $iva2 + ($iva2 * $int_mensual) * ($cuota3);
$resultado6= $iva2 + ($iva2 * $int_mensual) * ($cuota4);
$porcuota1 = $resultado1 / $cuota2;
$porcuota2 = $resultado2 / $cuota3;
$porcuota3 = $resultado3 / $cuota4; 
$porcuota4 = $resultado4 / $cuota2;
$porcuota5 = $resultado5 / $cuota3;
$porcuota6 = $resultado6 / $cuota4; 
						?>
						   
</head>
<body>
 <div id="general">
     <div id="encabezado">
	   <div id="formulario">
        <form action="usuario.html" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="text" name="usuario"/></p>
		<p><input type="image" src="../img/boton_enviar.png"/></p>
        </form>
		</div>
    </div>
	
    <div id="encabezado_medio_vuelos">
	<img src="../img/logotipo_chico.png" id="logotipo" alt="logotipo aerolinea rutics" width="242" height="100"/>
	<img src="../img/mujer_tarjeta.png" class="aeromoza" alt="azafata2" width="227" height="280"/>
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
		   <p>04</p>
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
	   <h4>COMPRA TU PASAJE</h4>
	  </div>
	  <p>En est&aacute; secci&oacute;n, usted deber&aacute; seleccionar, en cuantos pagos usted desea abonar su pasaje. Dependiendo en cuantas cuotas lo haga, 
	   podr&aacute; observar que dinero tendr&aacute; que abonar en cada una de ellas</p><br/><br/><br/>
	   <img src="../img/chica_tarjeta_chiquita.gif" alt="imagen de recepcionista" width="138" height="179"/>
	   <h5><?php while ($row =  mysql_fetch_array($datosPasajeros)){
	   echo $row['nombre'].$row['apellido'];
	   }?></h5>
	   <div id="formulario_pagos">
       <form action="pasajeElectronico.php" method="post" onsubmit="return valida_pago()">
          <div id="documentacion">
            <p>Documento
            <select name="tipo_documento" id="tipo_documento">
			 <option value=''>Seleccione...</option>
             <option value='dni'>DNI</option>
             <option value='libreta de enrolamiento'>Libreta de enrolamiento</option>
             <option value='cedula'>Ced&uacute;la</option>
            </select>
			</p>
			
          <p>Provincias
            <select name="provincias" id="provincias">
            <option value=''>Seleccione...</option>
			<?php  
		    $listaprovincias=$baseDatos->resultToArray($baseDatos->consulta('select nombre from provincia'));
		    foreach($listaprovincias as $value){
		    echo("<option>".$value['nombre']."</option>");
			}
			?>
           </select>
		   </p>
         <p>N&uacute;mero
            <input type="text" name="numerodni" id="numero_documento" value="<?php echo "$dniPasajero"; ?>"></input></p>
          </div>
		  <div><img src="../img/linea_separadora.png" alt="linea separadora" width="700" height="6"/></div>
		  <div id="seleccion_tarjetas">
		  <p>Seleccione su tarjeta</p>
		  <p><input type="checkbox" name="tarjetas" id="visa" value="visa" onchange="mostrar()"/></p><div id="visa1"><img src="../img/visa.png" alt="tarjeta visa" width="60" height="26"/></div>
		  <p><input type="checkbox" name="tarjetas" id="american_express" value="american express" onchange="mostrar()"/></p><div id="AmericanExpress"><img src="../img/AmericanExpress.png" alt="tarjeta AmericanExpress" width="40" height="40"/></div>
		  <p><input type="checkbox" name="tarjetas" id="cabal" value="cabal" onchange="mostrar()"/></p><div id="cabal1"><img src="../img/cabal.png" alt="tarjeta cabal" width="50" height="38" /></div>
		  <p><input type="checkbox" name="tarjetas" id="mastercard" value="mastercard" onchange="mostrar()"/></p><div id="mastercard1"><img src="../img/Mastercard.png" alt="tarjeta Mastercard" width="50" height="34"/></div>
		  <p><input type="checkbox" name="tarjetas" id="tarjeta_naranja" value="tarjeta naranja" onchange="mostrar()"/></p><div id="TarjetaNaranja"><img src="../img/TarjetaNaranja.png" alt="tarjeta naranja" width="50" height="32"/></div>
		  </div>
		  <p>Ingrese los primeros 6 d&iacute;gitos de su tarjeta de cr&eacute;dito para poder continuar:<input type="text" name="digitos" id="digitos" size="8px"></input> 
		  </p> 
		  <p><span>Seleccione la condici&oacute;n de pago:</span></p>
          <div id="pagos_cuotas">
		  <div class="cuotas">
		     <input type="radio" name="cuotas" value="una_cuota"/> 	  
	         <h6>Un pago sin inter&eacute;s</h6>
	         <h6>Importe total: <?php 
              if($clase == "Primera")
			  {
				echo "$iva2";			 
			  }
			  else if ($clase == "Economica")
			  {
					echo "$iva";			 
			  }		 
			//if($clase=['Economica']){
			 //echo "$iva";
			  // }
            //else 
			 // }
			 ?></h6>
		  </div>	 
	      <div class="cuotas">
		     <input type="radio" name="cuotas" value="tres_cuotas"/>
	         <h6>Tres pagos con inter&eacute;s</h6>
	         <h6>Importe total: ARS 3632.85</h6>
		     <h6>Importe por cuota: ARS 1210.95</h6>
		  </div>	 
	      <div class="cuotas">
		     <input type="radio" name="cuotas" value="seis_cuotas"/>
	         <h6>Seis pagos con inter&eacute;s</h6>
	         <h6>Importe total: ARS 3845.05</h6>
		     <h6>Importe por cuota: ARS 640.84</h6>
		  </div>
		  <div class="cuotas">
		     <input type="radio" name="cuotas" value="doce_cuotas"/>
	         <h6>Doce pagos con inter&eacute;s</h6>
	         <h6>Importe total: ARS 4371.65</h6>
		     <h6>Importe por cuota: ARS 364.30</h6>
		  </div>
		  </div>		

		  <div><img src="../img/linea_separadora.png" alt="linea separadora" width="700" height="6"/></div>
		  <p>&iexcl;Comprando en therustics.com te ahorr&aacute;s el cargo de gesti&oacute;n&#33;</p>
          <p>Te recordamos que las tarifas adquiridas a trav&eacute;s de nuestro site para Argentina son exclusivas para residentes del territorio argentino</p>   
		  <input type="submit" name="enviar" value="enviar"/>
		  <p><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></p>
		  <p id="boton_continuar"><img src="../img/continuar.png"  alt="boton continuar" width="99" height="37"/></p>		  
		</form>
      </div>
	   </div>
	</div>
    <div id="pie">
     <img src="../img/logotipo_pie.png" alt="logotipo Aerolineas Rutics" width="251" height="76"/>
	 <div class="espacio_blanco_pie"></div>
	 <h2>(011)4667-8907 / 011)4667-8907 </h2>
	 <p>aerolineasRustics.com Sitio Oficial de Aerolineas. ÃÂ© 1996 - 2014 AerolÃÂ­neas Rustics S.A.
      Legales | Condiciones Generales de Transporte | Mapa del Sitio | Ud. est&aacute; en un SITIO SEGURO</p>
     </div>
</div>
</body>
</html>