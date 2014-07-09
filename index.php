<?php
					$admin = "marcos";
					$clave = "M4rcos2014";
					if(isset($_POST['usuario']) && isset($_POST['pass'])){
						if(($_POST['usuario'] == $admin) && ($_POST['pass'] == $clave)){
						session_start();
						$_SESSION['log'] = true;
						header('location:pag/loginAdmin.php');
						}
					}
				?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
 <link   type="text/css" rel="stylesheet" href="js/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="css/estilo.css" />
<script type="text/javascript" src="js/validar_index_vuelo.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
   $(function() {
  var d = $.datepicker.formatDate('dd-mm-yy', new Date());
  $("#fechaPartida").attr("value",d);
   $("#fechaDestino").attr("value",d);
  
    $( ".datepicker" ).datepicker(
	       { dateFormat: "dd-mm-yy",
             		   }
		   );
	
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
        <form action="index.php" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="text" name="pass"/></p>
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
	   <form action="pag/vuelos.php" method="post" onSubmit="return validar_index()">
	   <p><input type="radio" name="tipoViaje" value="ida" checked="checked"/>Ida<input type="radio" name="tipoViaje"  value="idaVuelta"/>Ida y Vuelta</p>
	   <p><select name="partida" class="primeros_input" id="partida" >
	    <?php
		$lista=$baseDatos->resultToArray($baseDatos->consulta('select nombre from provincia'));
		  foreach($lista as $value){
		    echo("<option>".$value['nombre']."</option>");
			}
		?>
	  </select></p>
	   <p><select name="destino" class="primeros_input" id="llegada">
	    <?php
		$lista=$baseDatos->resultToArray($baseDatos->consulta('select nombre from provincia'));
		foreach($lista as $value){
		  echo("<option>".$value['nombre']."</option>");
		  }
		?>

	   </select></p>
	   <p><input type="text" name="fechaPartida" value="Destino" id="fechaPartida" class="datepicker" />
	   <input type="text" name="fechaDestino" value="Origen" id="fechaDestino" class="datepicker"  /></p>
	   <p><select name="categoria" id="categoria">
	   <option value="Economica">Econ&oacute;mica</option>
	   <option value="Primera">Primera</option>
	   </select></p>
	   <p><input type="image" src="img/boton_buscar.png" /></p>
	   </form>
	   <div class="blanco_tabs"></div>
	   </div>
	   
	   <div id="tabs-2">
	   <form action="pag/reserva.php" method="post">
       <p><input type="text" name="dni"  placeholder="documento"/></p>
	   <div class="input_invisible"></div>
	   <p><input type="text" name="nro_vuelo" placeholder="Numero de vuelo AR"/>
	   <input type="text" name="codigo_reserva" placeholder="Numero de reserva" /></p>
	   <p><input type="image" src="img/boton_buscar.png" /></p>
	   </form>
	   <div class="blanco_tabs"></div>
	   <div class="blanco_tabs"></div>
	   </div>
	   
	   <div id="tabs-3">
	   <p>Para comenzar a realizar el pago ingresá la siguiente información</p>
	   <form action="pag/pago.php" method="post">
	   <p><label>Codigo de reserva</label></p>
	   <p><input type="text" placeholder="codigo_reserva"/></p>
	   <p><label>DNI</label></p>
	   <p><input type="text" placeholder="dni_pasajero" /></p>
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