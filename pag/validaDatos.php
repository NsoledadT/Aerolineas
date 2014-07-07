<?php
session_start();
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
        <form action="usuario.html" method="post">
		<p><label>Usuario:</label><input type="text" name="usuario"/>
		<label>Contrase&ntilde;a:</label><input type="text" name="usuario"/></p>
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
     <div id="menu_lateral">
	    <div id="menu_contenedor_li">
		   <p>03</p>
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
	   <h4>COMPLETA TUS DATOS</h4>
	  </div>
	   <div class="parrafos">Los datos de contacto son obligatorios y deben ser exactos,caso contrario 
	   	se cancelar&aacute;n las reservas.</div>
	    <p class="campos"><span class="asterisco">*</span>Campos obligatorios</p>
	    <div><img src="../img/chica_vuelos_chico.jpg" alt="imagen de recepcionista" width="137" height="179"/></div>
			<div id="formulario_datos">
			    <div class="pasajero">Pasajero:</div>
				<form action="validaDatos.php" method="post"> 
						<?php
								include('../clases/DataBase.php');
								$expNom = '/^[a-zA-Z]{4,10}$/';
								$expApe = '/^[a-zA-Z]{4,15}$/';
								$expDoc = '/^\d{8}$/';
								$expEmail = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
								$expTel = '/^[0-9]{2,3}-? ?[0-9]{6,7}$/';
								if(isset($_POST["nombre"])){
									if(preg_match($expNom, $_POST["nombre"])){
										$nombre = $_POST["nombre"];
									}
								}
								if(isset($_POST['apellido'])){
									if(preg_match($expApe, $_POST['apellido'])){
										$apellido = $_POST['apellido'];
									}
								}
								if(isset($_POST["documento"])){
									if(preg_match($expDoc, $_POST["documento"])){
										$documento = $_POST["documento"];
									}
								}

								if(isset($_POST["telefono"])){
									if(preg_match($expTel, $_POST["telefono"])){
										$telefono = $_POST["telefono"];
									}
								}

								if(isset($_POST["email"])){
									if(preg_match($expEmail, $_POST["email"])){
										$correo = $_POST["email"];
									}
								}

								if(isset($_POST["dia"])){
								$dia = $_POST["dia"];
								}
								if(isset($_POST["mes"])){
								$mes = $_POST["mes"];
								}
								if(isset($_POST["anio"])){
								$anio = $_POST["anio"];
								}
								
								if(isset($_SESSION['nro_vuelo_ida'])){
									$nro_vuelo_ida = $_SESSION['nro_vuelo_ida'];
								}
								if(isset($_SESSION['estado_pasaje_ida'])){
									$estado_pasaje_ida = $_SESSION['estado_pasaje_ida'];
								}
								if(isset($_SESSION['tipo_viaje_ida'])){
									$tipo_avion = $_SESSION['tipo_viaje_ida'];
								}
								if(isset($_SESSION['clase'])){
									$clase = strtolower($_SESSION['clase']);
								}
								date_default_timezone_set("America/Argentina/Buenos_Aires");
								$fecha_reserva = date("Y-m-d");

								$BD = new DataBase();
								$fecha = $anio."-".$mes."-".$dia;
								$query = "insert into pasajero values('$documento','$nombre','$apellido','$fecha','$correo','$telefono')";
								$consulta = $BD->consulta($query);
								$reserva = $BD->consulta("insert into reserva values(null,'$clase','','','$estado_pasaje_ida','$tipo_avion','$nro_vuelo_ida','$fecha_reserva')");
								
								$result = $BD->consulta("select count(codigo_reserva) as cant_reservas from reserva");
								$resultados = $BD->resultToArray($result);
								foreach ($resultados as $resultado) {
									$codigo_ida = $resultado['cant_reservas']; 
								}
									
								$codigo_vuelta = 0;
								if(isset($_SESSION['nro_vuelo_vuelta'],$_SESSION['estado_pasaje_vuelta'],$_SESSION['tipo_viaje_vuelta'])){
									
									$nro_vuelo_vuelta = $_SESSION['nro_vuelo_vuelta'];
									
									$estado_pasaje_vuelta = $_SESSION['estado_pasaje_vuelta'];
									
									$tipo_avion_vuelta = $_SESSION['tipo_viaje_vuelta'];
									
									$reserva2 = $BD->consulta("insert into reserva values(null,'$clase','','','$estado_pasaje_vuelta','$tipo_avion_vuelta','$nro_vuelo_vuelta','$fecha_reserva')");

									$result2 = $BD->consulta("select count(codigo_reserva) as cant_reservas from reserva");
									
									$resultados2 = $BD->resultToArray($result2);
									
									foreach ($resultados2 as $resultado2) {
									$codigo_vuelta = $resultado2['cant_reservas']; 
									}
									unset($_SESSION['nro_vuelo_vuelta'],$_SESSION['estado_pasaje_vuelta'],$_SESSION['tipo_viaje_vuelta']);
								}
								
								if(isset($reserva2)){
									if(isset($consulta,$reserva)){
										$mensaje = "Las reservas y sus datos fueron registrados";
									}else{
										$mensaje = "Hubo problemas al registrar sus datos o la reserva";
									}
								}else{
									if(isset($consulta,$reserva)){
										$mensaje = "Las reservas y sus datos fueron registrados";
									}else{
										$mensaje = "Hubo problemas al registrar sus datos o la reserva";
									}
								}
						echo "<p><label class = mensajeValido>".$mensaje.".</label></p>";	
            
            echo "<p><label class = codigoIda>Su codigo de reserva de ida es: ".$codigo_ida.".</label></p>";
            
            if($codigo_vuelta != 0){
            	echo "<p><label class = codigoVuelta>Su codigo de reserva de vuelta es: ".$codigo_vuelta.".</label></p>";
            }
           	echo "<p><label class=ltipo0><span class=asterisco>*</span>Nombre:</label>
										<input type = text name = nombre id = nom value ='$nombre' /></p>";

           	echo "<p><label class=ltipo1><span class=asterisco>*</span>Apellido:</label>
										<input type = text name = apellido id = ape value ='$apellido' /></p>";
						
						echo"<p><label class = ltipo2 ><span class = asterisco >*</span>Documento:</label>
						<input type = text name = documento  id = doc value ='$documento' /></p>";
                         
           	echo"<p><label class = ltipo3 ><span class = asterisco>*</span>Telefono Celular:</label>
						 <input type= text  name = telefono  id = tel value='$telefono'/></p>";
           
           	echo"<p><label class = ltipo4 ><span class= asterisco >*</span>Email:</label>
						  <input type= text  name= email  id= correo value='$correo' /></p>";
                          
            echo"<p><label class= ltipo5 ><span class= asterisco >*</span>Fecha de nacimiento:</label>
						  <input class= chico  type= text  name= dia  maxlength= 2  id=d value='$dia' /><label class= barra >/</label>
						  <input class= chico  type= text  name= mes  maxlength= 2  id=m value='$mes' /><label class= barra >/</label>
						  <input class= grande  type= text  name= anio  maxlength= 4  id= a value='$anio' /></p>";
            
            echo "<p><label class = mensajeValido>Para realizar el pago usted debera ingresar su codigo de reserva y dni en la pagina principal de Aerolineas.</label></p>";	
            ?>
              
              
                 <p><a href="verificacion.php"><img src="../img/volver.png" alt="boton volver" id="boton_volver" width="99" height="37"/></a></p>
		             <p id="boton_continuar"><a href="../index.php"><img src="../img/continuar.png"  alt="boton continuar" width="99" height="37"/></a></p>
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