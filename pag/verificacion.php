<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />

   <?php
	$vuelo_ida =$_POST['vuelo_ida'];
	$vuelo_ida_separada = explode("+",$vuelo_ida);
	$clase=$vuelo_ida_separada[0];
	$nro_vuelo=$vuelo_ida_separada[1];
    $conexion = mysql_connect("localhost","root","xxxxxxxx","") or die ("no se pudo realizar conexion");
    $db = mysql_select_db("aerolineas",$conexion) or die ("no se pudo seleccionar base de datos");
    $query = "select * from vuelo where `nro vuelo`='$nro_vuelo'";
    $consulta = mysql_query($query,$conexion) or die ("no se pudo hacer insercion");
    $nfilas= mysql_num_rows($consulta);
	echo( $nfilas);
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
		   <p>Tarifa<span>Precio Total</span></p>
		   <h6>Adulto+Tasa=PrecioTotal</h6>
		 </div>
		 <p><img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16" class="cuadradito"/><span class="titulito">IDA</span></p>
		     <div class="recuadro_tabla_verificacion">
				<table>
				    <tr>
				    <td><span>salida:</span></td>
					<td>Dia año de salida</td>
					<td>Aerolinea Rustics</td>
					</tr>
					<tr>
					<td>Hora</td>
					<td>Lugar de Partida</td>
					<td>caracteristicas del vuelo AR/1682</td>
					</tr>
					<tr>
					<td><span>Llegada:</span></td>
					<td>Dia año de LLegada</td>
					<td>Cabina: Clase economica +/Boing 737-700</td>
					</tr>
					<tr>
					<td>Hora</td>
					<td>Lugar de llegada</td>
					<td>&nbsp;</td>
					</tr>
				</table>
			 </div>
		     <p><img src="../img/cuadradito.gif" alt="cuadradito" width="16" height="16" class="cuadradito"/><span class="titulito">VUELTA</span></p>
		     <div class="recuadro_tabla_verificacion">
				<table>
				    <tr>
				    <td><span>salida:</span></td>
					<td>Dia año de salida</td>
					<td>Aerolinea Rustics</td>
					</tr>
					<tr>
					<td>Hora</td>
					<td>Lugar de Partida</td>
					<td>caracteristicas del vuelo AR/1682</td>
					</tr>
					<tr>
					<td><span>Llegada:</span></td>
					<td>Dia año de LLegada</td>
					<td>Cabina: Clase economica +/Boing 737-700</td>
					</tr>
					<tr>
					<td>Hora</td>
					<td>Lugar de llegada</td>
					<td>&nbsp;</td>
					</tr>
				</table>
		     </div>
			 <div id="recuadrito_tarifa">
			 <h4>Tarifa</h4>
			 <p>Tarifa base</p>
			 <p><span>Precio_base</span></p>
			 <p>Impuesto</p>
			 <p><span>Valor_impuesto</span></p>
			 <hr/>
			 <p><span>Total</span></p>
			 </div>
			 <p><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></p>
		     <p id="boton_continuar"><img src="../img/continuar.png"  alt="boton continuar" width="99" height="37"/></p>
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