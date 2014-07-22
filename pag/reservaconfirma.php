<?php
session_start();
$_SESSION['codigo']=$_GET['idCliente'];

$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql99 = "SELECT asiento, fila FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; 
					$ubicacion99 = mysql_query($sql99);
						while ($row99 = mysql_fetch_row($ubicacion99))
						{
							$row99[0];
							$row99[1];
							if (($row99[0] && $row99[0]) == NULL)
							{
								echo "<html xmlns=http://www.w3.org/1999/xhtml>"; /* Se puede acceder a la pagina solo desde la principal con el codigo de reserva */
								echo "<head><title>Aerolinea Rustics</title>
									<meta http-equiv=Content-Type content=text/html; charset=iso-8859-1/>
									<link type=text/css rel=stylesheet href=../css/estilo.css />
									<script src=//code.jquery.com/jquery-1.11.0.min.js></script>	
									<script type=text/javascript src=../js/seleccion.js></script>
								</head>
							<body>

								<div id=general>
									<div id=encabezado>
										<div id=formulario>
											<form action=usuario.html method=post>
												<p><label>Usuario:</label><input type=text name=usuario/>
												<label>Contrase&ntilde;a:</label><input type=text name=usuario/></p>
												<p><input type=image src=../img/boton_enviar.png/></p>
											</form>
										</div>
									</div>
								
									<div id=encabezado_medio_vuelos>
										<img src=../img/logotipo_chico.png id=logotipo alt=logotipo aerolinea rutics width=242 height=100/>
										<img src=../img/chica_reserva.png class=aeromoza alt=azafata width=227 height=280/>
									<ul>
										<li><a href=pag/construccion.html>LA EMPRESA</a></li>
										<li><a href=reservas.html>RESERVAS </a></li>
										<li><a href=pag/construccion.html>INFORMACION</a></li>
										<li><a href=pag/construccion.html>CORPORATIVO</a></li>
									</ul>
									</div>
								
									<div id=contenido>
										<div id=menu_lateral>
											<div id=menu_contenedor_li>
												<p>01</p>
												<div id=contenedor_li>
													<div class=blanco_columna_li>
													</div>
												<a href=vuelos.html>Selecciona tu vuelo</a>
												<a href=verificacion.html>Verifica tu elecci&oacute;n</a>
												<a href=datos.html>Completa tus datos</a>
												<a href=confirmacion.html>Compra tu pasaje</a>
												<a href=reserva.html>Reserva tu asiento</a>
												</div>
											</div>
										</div>
									<div id=columna_contenido>
										<div id=barra_titulo>
											<img src=../img/cuadradito.gif alt=cuadradito width=16 height=16/>
											<h4>REALIZA TU RESERVA</h4>
										</div>
								   <p>Aqu&iacute; podr&aacute; realizar su reserva la cual contendr&aacute; los datos del 
								   tipo de avion, clase, asiento, fechas y lugar de partida como de llegada.
								   Recuerde confirmar su reserva pagandola 48hs antes.</p>
								   <img src=../img/china_reserva.png alt=imagen de recepcionista width=199 height=179/>";
										die("Seleccione asiento antes de imprimir el boarding. <a href=../index.php>Volver</a>"); 
							}
						}

?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Inicio de sesion y luego contenido de estilos y java en el header, Tambien titulo y validacion strict. -->
	<head><title>Aerolinea Rustics</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
	    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>	<!-- No lo use. -->
		<!--<script type="text/javascript" src="../js/seleccion.js"></script> Dejado de usar.. Simplemente usado para alertar si se selecciona una clase -->
	</head>
<body>

	<div id="general"> <!------------- Contenido normal de div, form de usuario para el gerente y visualizacion de estadisticas --------------->
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
			<img src="../img/chica_reserva.png" class="aeromoza" alt="azafata" width="227" height="280"/>
		<ul>
			<li><a href="pag/construccion.html">LA EMPRESA</a></li> <!---------------- Menu superior ---------------->
			<li><a href="reservas.html">RESERVAS </a></li>
			<li><a href="pag/construccion.html">INFORMACION</a></li>
			<li><a href="pag/construccion.html">CORPORATIVO</a></li>
		</ul>
		</div>
	
		<div id="contenido">
			<div id="menu_lateral">
				<div id="menu_contenedor_li">
					<p>01</p>
					<div id="contenedor_li">
						<div class="blanco_columna_li"> <!------------- Menu lateral por esta zona ------------------>
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
				<h4>REALIZA TU RESERVA</h4>
			</div>
	   <p>Aqu&iacute; podr&aacute; realizar su reserva la cual contendr&aacute; los datos del 
	   tipo de avion, clase, asiento, fechas y lugar de partida como de llegada.
	   Recuerde confirmar su reserva pagandola 48hs antes.</p>
	   <img src="../img/china_reserva.png" alt="imagen de recepcionista" width="199" height="179"/>
	   
	   <p>Ha realizado la reserva con exito.</p>
	   <p>Oprima volver para ir al home.</p>
		<p>Oprima continuar para imprimir el boarding pass.</p>
	<?php
	echo"<p><a href=../index.php><img src=../img/volver.png alt=boton volver id=boton_volver width=99 height=37/></a></p>
		<p id=boton_continuar><a href=boarding.php?idCliente=$_SESSION[codigo]><img src=../img/continuar.png alt=boton continuar width=99 height=37/></a></p>";
	?>
	</div>
    <div id="pie">
		<img src="../img/logotipo_pie.png" alt="logotipo Aerolineas Rutics" width="251" height="76"/>
		<div class="espacio_blanco_pie"></div>
			<h2>(011)4667-8907 / 011)4667-8907 </h2>
			<p>aerolineasRustics.com Sitio Oficial de Aerolineas. Â© 1996 - 2014 AerolÃ­neas Rustics S.A.
      Legales | Condiciones Generales de Transporte | Mapa del Sitio | Ud. est&aacute; en un SITIO SEGURO</p>
	</div>
	</div>
	</div>
</body>
</html>