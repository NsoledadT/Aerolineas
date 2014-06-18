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
		<label>Contrase&ntilde;a:</label><input type="text" name="pass"/></p>
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
	   
	  		<h3>Aqui verificar&aacute; las estadisticas de la empresa.</h3>
	    
	    	<h5>Ver estadisticas en forma nominal:<h5>
			
			    
				
             
                 <p><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></p>
		             <p id="boton_continuar"><img src="../img/continuar.png"  alt="boton continuar" width="99" height="37"/></p>
				  
	     	
	   
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