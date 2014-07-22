<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aerolinea Rustics</title>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<?php
session_start();
if(isset($_SESSION['cod_reserva']))
{
$codigito=$_SESSION['cod_reserva'];
}
else
{
header('location:../index.php');
}
?>
<?php
include("../clases/DataBase.php");
$baseDatos = new DataBase("");

if(isset($_POST['enviar'])){
$cambiar_estadoPasaje =$baseDatos -> consulta("update `reserva` set estado_pasaje = 'Pago' WHERE codigo_reserva = '$codigito'" );
}

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
	    <form action="pasajeElectronico.php" method="post">
        <h3>Su pago se ha realizado con exito.</h3>
		<p>Presione el boton para imprimir su pasaje</p>
		<input type="submit" name="enviar" value="Imprimir pasaje"/>
	    <p>Recuerde que dentro de las 48hs antes del vuelo, podra realizar el check-in desde el home.</p>
		<p><a href="../index.php"><img src="../img/volver.png" alt="boton" volver id="boton_volver" width="99" height="37"/></a></p>		
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