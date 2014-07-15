<?php
 session_start();
 if(!isset($_SESSION['log'])){
 	header('location:datos.php');
 }
 ?>
 	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Aerolinea Rustics</title>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
</head>
<body>
 <div id="general">
     <div id="encabezado">
	   <div id="formulario">
        <form action="loginAdmin.php" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="password" name="pass" class="adminCont"/></p>
		<p><input type="image" src="../img/boton_enviar.png" /></p>
        </form>
		</div>
    </div>
	
    <div id="encabezado_medio_vuelos">
	<img src="../img/logotipo_chico.png" id="logotipo" alt="logotipo aerolinea rutics" width="242" height="100"/>
	<img src="../img/chica_grande.png" class="aeromoza" alt="azafata" width="227" height="280"/>
	<ul>
	  <li><a href="pag/empresa.html">LA EMPRESA</a></li>
	  <li><a href="pag/reservas.html">RESERVAS </a></li>
	  <li><a href="pag/informacion.html">INFORMACION</a></li>
	  <li><a href="pag/corporativo.html">CORPORATIVO</a></li>
	</ul>
    </div>
	
   <div id="contenido">
    
	 
	   		<h1>Bienvenido Administrador</h1>
	   
	  		<div id="nominal">
	    		<h3>Estadisticas en forma nominal</h3>
	    		<form action="nominal.php" method="post">
	    				<input type="image" name="bot1" src="../img/boton_ver.png"/>
	    		</form>
	    	</div>
			<div id="graficos">
				<div>
					<h3>Estadisticas en graficos</h3>
					<p>Pasajes vendidos y reservas caidas</p>
					<form action="../graficos/pasajes_vendidos.php" method="post">
						<input type="image" name="bot2" src="../img/boton_generar.png"/>
					</form>
				</div>
				<div>	
					<p>Cantidad de pasajes vendidos por categoria y destino</p>
					<form action="../graficos/pasajesPorCategoriaYdestino.php" method="post">
						<input type="image" name="bot3" src="../img/boton_generar.png"/>
					</form>
				</div>
				<div>
					<p>Ocupacion por avion y destino</p>	
					<form action="../graficos/ocupacionPorAvionYdestino.php" method="post">
						<input type="image" name="bot4" src="../img/boton_generar.png"/>
					</form>
				</div>
				<div>
					<p>Ver graficos</p>
					<form action="graficos.php" method="post">
						<input type="image" name="bot5" src="../img/boton_ver.png"/>
					</form>
				</div>	
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