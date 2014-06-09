<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link type="text/css" rel="stylesheet" href="css/estilo.css" />
 <link rel="stylesheet" href="js/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <?php
   include("clases/DataBase.php");
   $baseDatos = new DataBase();
 
 
  ?>
</head>
<body>
 <div id="general">
     <div id="encabezado">
	    <div id="formulario">
        <form action="usuario.html" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="text" name="usuario"/></p>
		<p><input type="image" src="img/boton_enviar.png"/></p>
        </form>
		</div>
    </div>
	
    <div id="encabezado_medio">
	<img src="img/logotipo.png" id="logotipo" alt="logotipo aerolinea rutics" width="299" height="125"/>
	<ul>
	  <li><a href="pag/empresa.html">LA EMPRESA</a></li>
	  <li><a href="pag/reservas.html">RESERVAS</a></li>
	  <li><a href="pag/informacion.html">INFORMACION</a></li>
	  <li><a href="pag/corporativo.html">CORPORATIVO</a></li>
	</ul>
    </div>
	
   <div id="contenido">
      <div class="columna">
	  <h4>VUELOS Y CHECK-IN</h4>
	   <div id="tabs">
	   <ul>
	   
       <li><a href="#tabs-1">VUELOS</a></li>
       <li><a href="#tabs-2">CHECK-IN WEB</a></li>
	   <li><a href="#tabs-3">PAGO ONLINE</a></li>
       </ul>
	   <div id="tabs-1">
	   <form action="" method="post">
	   <p><input type="radio" name="ida"/>Ida<input type="radio" name="ida_vuelta" />Ida y Vuelta</p>
	   <p><select name="origen" class="primeros_input">
	    <?php
		$baseDatos->consulta('select nombre from provincia');
		$baseDatos->impresion();
		?>
	   </select></p>
	   
	   <p><select name="destino" class="primeros_input">
	    <?php
		$baseDatos->consulta('select nombre from provincia');
		$baseDatos->impresion();
		?>
	   </select></p>
	   <p><input type="text" name="origen" value="Destino" class="datepicker" />
	   <input type="text" name="destino" value="Origen" class="datepicker"  /></p>
	   <p><select id="categoria">
	   <option value="economica">Econ&oacute;mica</option>
	   <option value="primera">Primera</option>
	   </select></p>
	   <p><input type="image" src="img/boton_buscar.png" /></p>
	   </form>
	   <div class="blanco_tabs"></div>
	   </div>
	   
	   <div id="tabs-2">
	   <form action="" method="post">
       <p><input type="text" name="nombre" value="Apellido" />
	   <input type="text" name="apellido" value="Nombre"/></p>
	   <label>origen:</label>
	   <p><select name="destino" class="primeros_input">
	   </select></p>
	   <p><input type="text" name="nro_vuelo" value="Numero de vuelo AR"/>
	   <input type="text" name="codigo_reserva" value="Numero de reserva" /></p>
	   <p><input type="image" src="img/boton_buscar.png" /></p>
	   </form>
	   <div class="blanco_tabs"></div>
	   <div class="blanco_tabs"></div>
	   </div>
	   
	   <div id="tabs-3">
	   <p>Para comenzar a realizar el pago ingresá la siguiente información</p>
	   <form action="" method="post">
	   <label>Codigo de reserva</label>
	   <p><input type="text" name="codigo_reserva"/></p>
	   <label>Apellido de pasajero</label>
	   <p><input type="text" name="apellido_pasajero" /></p>
	   <p><input type="image" src="img/boton_buscar.png" /></p>
	   </form>
	   <div class="blanco_tabs"></div>
	   </div>
	   </div>
	 </div>
	 
	  <div class="columna">
	   <h4>DATOS GENERALES</h4>
	    <img src="img/informacion.gif" alt="link de Informacion de destinos y tarifas" width="351" height="91"/>
	    <p>CONOCE TODA LA INFO DE NUESTROS DESTINOS Y TARIFAS</p>
	    <a href="construccion.html"><img src="img/boton_promocion.gif" alt="Promocion Buenos Aieres" width="80" height="26" class="boton_info"/></a>
		<a href="construccion.html"><img src="img/estado_vuelo.gif" alt="link de Informacion de destinos y tarifas" width="351" height="90"/></a>
      </div>
	   <div class="blanco_columna">
		  </div>
	  <div class="columna">
	        <h4>A DONDE VIAJAR</h4>
		    <div class="recuadro_promocion">
		    <img src="img/promocion_1.gif" alt="Promocion Buenos Aires Cordoba" width="72" height="81" />
		    <h4>BS.AS - CORDOBA <br/>12 CUOTAS DE $100</h4>
		    <p>DESDE $1200</p>
		    <a href="contruccion.html"><img src="img/boton_promocion.gif" alt="Promocion Buenos Aieres" width="80" height="26"/></a>
		    </div>
		    <div class="recuadro_promocion">
		    <img src="img/promocion_1.gif" alt="Promocion Buenos Aires Cordoba" width="72" height="81" />
		    <h4>BS.AS - ENTRE RIOS <br/>12 CUOTAS DE $100</h4>
		    <p>DESDE $1200</p>
		    <a href="contruccion.html"><img src="img/boton_promocion.gif" alt="Promocion Buenos Aieres" width="80" height="26"/></a>
		    </div>
			<p><a href="contruccion.html">Conoc&eacute; m&aacute;s ofertas</a></p>
		    <p><a href="contruccion.html">Recib&iacute; m&aacute;s ofertas y novedades</a></p>
	  </div>
   </div>
     <div id="pie">
     <img src="img/logotipo_pie.png" alt="logotipo Aerolineas Rutics" width="251" height="76"/>
	 <div class="espacio_blanco_pie"></div>
	 <h2>(011)4667-8907 / 011)4667-8907 </h2>
	 <p>aerolineasRustics.com Sitio Oficial de Aerolineas. © 1996 - 2014 Aerolíneas Rustics S.A.
      Legales | Condiciones Generales de Transporte | Mapa del Sitio | Ud. est&aacute; en un SITIO SEGURO</p>
     </div>
</div>

</body>
</html>