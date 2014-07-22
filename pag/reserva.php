<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
$_SESSION['codigo']=$_POST['codigo_reserva'];
$_SESSION['nro_vuelo']=$_POST['nro_vuelo'];

/* --------------------- Controlo el codigo, si es valido entro a la pagina.------------------------------------*/
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql11 = "SELECT codigo_reserva FROM reserva " ; 
					$ubicacion11 = mysql_query($sql11);
						while ($rowcodigo = mysql_fetch_row($ubicacion11))
						{
							$rowcodigo[0];
							if($rowcodigo[0]==$_SESSION['codigo'])
							{
							$bandera=1;
							}
						}
					if ($bandera!=1)
						{
						header('location:../index.php');
						}
				mysql_close();
/* --------------------------------------------------------------------------------------------------------- */
/* ---------------------------------- Comienzo de html ----------------------------------------------------- */
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

	<?php
	
/* ------------------------------------------------------- Estableciendo fecha y fecha modifica con 48hs mas ---------------------------------- */	
	date_default_timezone_set("America/Buenos_Aires");
	$hoy = date("Y-m-d H:i:s");
	echo "$hoy<br/>";
	$sumarhs =  strtotime( '+48hour' , strtotime($hoy)) ;
	$nuevafecha = date ( 'Y-m-d, H:i:s' , $sumarhs );
	//echo "$nuevafecha<br/>";
	
/* --------------------------------------------------------------------------------------------------------- */	
/* ------------------------------------------------------ Confirma si el pasaje esta o no pago --------------------------------- */	
	$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql7 = "SELECT estado_pasaje FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; 
					$ubicacion7 = mysql_query($sql7);
						while ($row = mysql_fetch_row($ubicacion7))
						{
							$row[0];
							$estado_pasaje=$row[0];
							If($estado_pasaje!="Pago")
							{
							die("Debe pagar antes de seleccionar asiento, <a href=../index.php> volver </a>");
							}
						}
						
				mysql_close();
/* --------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------- Determinando horario de partida segun el vuelo ----------------------*/				
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql77 = "SELECT horario_partida FROM vuelo WHERE nro_vuelo LIKE '$_SESSION[nro_vuelo]'" ; 
					$ubicacion77 = mysql_query($sql77);
						while ($row77 = mysql_fetch_row($ubicacion77))
						{						
							$row77[0];
							$horarioini = $row77[0];
						}
				mysql_close();
/* --------------------------------------------------------------------------------------------------------- */			
/* ------------------------------------------------- Determinando la fecha de reserva para su uso en limite de horas y fechas -------------------------------------------------------- */				
	$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql99 = "SELECT fecha_reserva FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; 
					$ubicacion99 = mysql_query($sql99);
						while ($row99 = mysql_fetch_row($ubicacion99))
						{
							$row99[0];

							if ($nuevafecha<=$row99[0])
							{
								die("Debe esperar hasta 48 hs antes del vuelo para seleccionar asiento, <a href=../index.php> volver </a>");
							}
							$hoytiempo = date ( 'H:i:s');
							
							$restarhs= strtotime( '-2hour' , strtotime($horarioini)) ;
							$doshora = date ( 'H:i:s' , $restarhs );
							
							if ($hoy==$row99[0])
							{
								if ($hoytiempo<=$doshora)
								{
									die("Limite de tiempo de 2hs, consultar en agencia. <a href=../index.php> volver </a>");
								}
							}
							if($hoy>$row99[0])
							{
								echo("$row99[0]");
								die("Ha perdido el avion, <a href=../index.php> volver </a>");
							}
						}
						mysql_close();
/* --------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------- Busqueda de tipo de avion y clase ----------------------------------------------------------- */
						
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; 
					$ubicacion7 = mysql_query($sql7);
						while ($row = mysql_fetch_row($ubicacion7))
						{
							$row[0];
							$row[1];

							$tipos=$row[0];
							$clase=$row[1];
 	
						}
						
				mysql_close();
				
/* --------------------------------------------------------------------------------------------------------- */
	
/* Coneccion a la base es utilizada en otro paso para determinar si ya se ha reservado el asiento para hacer 1 asiento 1 persona. */
	
		echo"<p style='color:red'>Presione continuar si desea imprimir su pasaje,volver para ir a la pagina principal.</p>";
		echo "<form action=reserva2.php id=formulary3 method=post enctype=multipart/form-data >"; /* Pequeño formulario que direcciona a otra pagina para el cambio de reserva */
			echo "<p style='color:red' >Ingrese codigo de reserva si quiere cambiar su reserva: de ser incorrecto sera enviado a la pagina principal.</p>
			<p><input type=text name=cambiar id=cambiar size=20 maxlength=8 ></p>";/* ingresando el codigo podra cambiar la reserva.*/
			$tipo = $tipos; /* envio el tipo ya que es lo que la pagina necesita para la mayoria de las acciones */
			echo "<input type=hidden name=tipo value=$tipo>";
			echo "<p><input type=submit value=Confirmar /><input type=reset value=Reset /></p>";
		echo "</form>";
		
	echo "<form action=basedata.php target=basedata id=formulary method=post enctype=multipart/form-data onsubmit= seleccion() >";
	/* Formulario que apunta al iframe y carga basedata.php en el.. Selects de fila y asiento */
		echo "<input type=hidden name=posto value=0>";/* usado para determinar que se usan los select */
		echo "<input type=hidden name=cambiar value=0>";/* auto asignado el valor de cambiar en cero para en la ultima pagina determinar si se desea o no cambiar de reserva*/
		echo "<p>";
		echo "<p style='color:red' >Seleccionar asiento via Select con el boton! O utilice el avion!</p><br/>";
		$tipo = $tipos; 
		if ($clase=="Economica")
		{
			echo "<input type=hidden name=clase value=$clase>";
		}
		if ($clase=="Primera")
		{
		echo "<input type=hidden name=clase value=$clase>";
		}
		
		echo "<input type=hidden name=tipo value=$tipo>";

		echo "<br/><br/><input type=submit value='Seleccionar Asiento Con El Boton' /></p>";
	echo "</form>";
	
	echo "<iframe name=basedata>"; /* iframe en el que se cargan la paginas. */
	echo "</iframe>";
	
	echo "<div id=avioncito>"; /* Aqui comienza el avioncito */
		echo "<table border=0>";
		echo "<tr>
				<td></td>
				<td>";
					echo "<img src=../img/aviontup.png alt=avionup width=190 height=120/>
				</td>
				<td></td>
			  </tr>
				<tr>
				<td>";
					echo "<img src=../img/aviontleft.png alt=avionleft width=130 height=120/>
				</td>
			
			<td align=center>";
		
				$tipo = $tipos; /* Segun el tipo llegado se cargan los distintos aviones mas abajo estan los otros tipos. */
				if ($tipo==1)
				{
				
				
					//$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
					//$db = mysql_select_db('aerolinearustics',$link);
					//$sql = "SELECT asiento, fila FROM reserva WHERE tipo = '1'";
					//$ubicacion = mysql_query($sql);
					//while ($row = mysql_fetch_row($ubicacion)){
					//echo "El asiento ".$row[0]."La fila ".$row[1]."";}
					function tablas()
					{ 
					$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
					$db = mysql_select_db('aerolineas',$link);
						$sql8 = "SELECT fecha_reserva FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de fecha*/
							$ubicacion8 = mysql_query($sql8);
								while ($row = mysql_fetch_row($ubicacion8))
								{
									$row[0];

									$fecha=$row[0];

								}
							
						mysql_close();				
			
						$columna=['A','B','C']; /* Determinadas las letras de las columnas y su ubicacion para comparar, se limpian las variables ubi por si acaso. */
						for($i=1;$i<=10;$i++)
						{
							for($j=0;$j<=2;$j++)
							{
								$ubicol[$i][$j]= NULL;
								$ubifil[$i][$j]= NULL;
							}
						}	
					
						
						$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
						$db = mysql_select_db('aerolineas',$link);
						$sql = "SELECT asiento, fila FROM reserva WHERE fecha_reserva = '$fecha' AND nro_vuelo = '$_SESSION[nro_vuelo]'"; /* Se accede a la base para guardar los asientos ocupados en tipo 1*/
						$ubicacion = mysql_query($sql);
							while ($row = mysql_fetch_row($ubicacion))
							{
								$row[0];
								$row[1];
								for($i=1;$i<=10;$i++)
								{
									for($j=0;$j<=2;$j++)
									{
										if ($row[0] == $columna[$j])
										{
											if ($row[1]==$i) /*fila*/
											{
												$ubicol[$i][$j]= $columna[$j];
												$ubifil[$i][$j]= $i;
											}
										}
										
										
									}
								}
							}
						
						mysql_close();
							
						$letra=['Fl','A','B','C'];/* para que aparezcan en la tabla. */
			
						echo "<table border=1>";
							echo "<tr>";
							for($i=0;$i<=3;$i++)
							{
								echo "<td>$letra[$i]</td>";
							}
						//echo "<form action=basedata.php target=basedata id=formulary2 method=post enctype=multipart/form-data onsubmit=return active(this)>";
						$lettere=['A','B','C']; /* usado para enviar uno de ellos por url */
							$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
							$db = mysql_select_db('aerolineas',$link);
								$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de tipo, clase */
								$ubicacion7 = mysql_query($sql7);
								while ($row = mysql_fetch_row($ubicacion7))
								{
									$row[0];
									$row[1];
									
									$tipos=$row[0];
									$clase=$row[1];
								
								}
						
							mysql_close();
						$tipo = $tipos;

						for($i=1;$i<=10;$i++)
						{
							echo "<tr><td>$i</td>";
							for($j=0;$j<=2;$j++)
							{
								if (($ubicol[$i][$j]=='A'||$ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='C') && $ubifil[$i][$j]==$i)
								{ /* comparacion para saber asiento ocupado */
									echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
								}
								else
								{/* asiento disponible */
									echo   "<td align=center>";
											    //echo "<input type=radio name=posto value='1' style=width:45px; height:45px;>";
												//echo "<input type=hidden name=tipo value='$tipo'>";
												//echo "<input type=hidden name=clase value=Economy>";
												//$clase='Economy';
												$asiento=$lettere[$j];
												$fila=$i;
												echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
												<img src=../img/asientoeconomy.png width=35 height=15 /></a>";
								/*envio datos por url*/				
												//<a href="http://www.w3schools.com" target="_blank">Visit W3Schools</a>
												//<a href='ejercicio1-5.php?idCliente=$i' />
												//echo "<input type=hidden name=asiento value=$lettere[$j]>";
												//echo "<input type=hidden name=fila value=Fila$i>";
												
												
												
									echo "</td>";
								}	
							}
					
							echo "<tr/>"; 
						} 
						echo"</table>";
						//echo "<input type=submit value=Confirmar /><input type=reset value=Reset />";
						//echo"</form>";
					}
					tablas();

				} /* el resto es basicamente lo mismo con diferentes tipos, algunas letras de mas y los asientos de primera. */
		if ($tipo==2)
		{
			function tablas2()
			{ 
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql8 = "SELECT fecha_reserva FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de fecha*/
					$ubicacion8 = mysql_query($sql8);
						while ($row = mysql_fetch_row($ubicacion8))
						{
							$row[0];

							$fecha=$row[0];

						}
					
				mysql_close();				

				$lettere=['A','B','C','D','E'];
							$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
							$db = mysql_select_db('aerolineas',$link);
								$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de tipo, clase */
								$ubicacion7 = mysql_query($sql7);
								while ($row = mysql_fetch_row($ubicacion7))
								{
									$row[0];
									$row[1];
									
									$tipos=$row[0];
									$clase=$row[1];
								
								}
						
							mysql_close();
				$tipo = $tipos;
				$columna2=['A','B','C','D','E'];
					for($i=1;$i<=20;$i++)
					{
						for($j=0;$j<=4;$j++)
						{
							$ubicol[$i][$j]= NULL;
							$ubifil[$i][$j]= NULL;
						}
					}	
				$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
				$db = mysql_select_db('aerolineas',$link);
					$sql = "SELECT asiento, fila FROM reserva WHERE fecha_reserva = '$fecha'  AND nro_vuelo = '$_SESSION[nro_vuelo]'"; /* Se accede a la base para guardar los asientos ocupados en tipo 2*/
					$ubicacion = mysql_query($sql);
					while ($row = mysql_fetch_row($ubicacion))
					{
						$row[0];
						$row[1];
						for($i=1;$i<=20;$i++)
						{
							for($j=0;$j<=4;$j++)
							{
								if ($row[0] == $columna2[$j])
								{
									if ($row[1]==$i)
									{
										$ubicol[$i][$j]= $columna2[$j];
										$ubifil[$i][$j]= $i;
									}
								}
										
										
							}
						}
					}

				mysql_close();
							
			
				$letra=['Fl','A','B','C','D','E'];
				echo "<table border=1>";
					echo "<tr>";
					for($i=0;$i<=5;$i++)
					{
						echo "<td>$letra[$i]</td>";
					}
					for($i=1;$i<=20;$i++)
					{
						echo "<tr><td>$i</td>";
						for($j=0;$j<=4;$j++)
						{ 
							if ($i<6)
							{
								if (($j==1)||($j==3))
								{
									if ((($ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='D') && $ubifil[$i][$j]==$i)||$clase=="Economica")
									{
										echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
									}
									else
									{
										echo "<td>";												
											$asiento=$lettere[$j];
											$fila=$i;
											echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
											<img src=../img/asientoprimera.png width=35 height=15 /></a>";
										echo "</td>";
									}
								}
								else
								{
									echo "<td></td>";
								}
							}
							else
							{
								if ((($ubicol[$i][$j]=='A'||$ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='C'||$ubicol[$i][$j]=='D'||$ubicol[$i][$j]=='E') && $ubifil[$i][$j]==$i)||$clase=="Primera")
								{
									echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
								}
								else
								{
									echo "<td>";
										$asiento=$lettere[$j];
										$fila=$i;
										echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
										<img src=../img/asientoeconomy.png width=35 height=15 /></a>";			
									echo"</td>";
								}
							}
						} 
						echo "<tr/>"; 
					} 
				echo"</table>";
			}
			tablas2();
		}
		if ($tipo==3)
		{
			function tablas3()
			{ 
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql8 = "SELECT fecha_reserva FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de fecha*/
					$ubicacion8 = mysql_query($sql8);
						while ($row = mysql_fetch_row($ubicacion8))
						{
							$row[0];

							$fecha=$row[0];

						}
					
				mysql_close();			
		
		
				$lettere=['A','B','C','D','E'];
							$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
							$db = mysql_select_db('aerolineas',$link);
								$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de tipo, clase */
								$ubicacion7 = mysql_query($sql7);
								while ($row = mysql_fetch_row($ubicacion7))
								{
									$row[0];
									$row[1];
									
									$tipos=$row[0];
									$clase=$row[1];
								
								}
						
							mysql_close();
				$tipo = $tipos;
				$columna3=['A','B','C','D','E'];
					for($i=1;$i<=32;$i++)
					{
						for($j=0;$j<=4;$j++)
						{
							$ubicol[$i][$j]= NULL;
							$ubifil[$i][$j]= NULL;
						}
					}	
				$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
				$db = mysql_select_db('aerolineas',$link);
				$sql = "SELECT asiento, fila FROM reserva WHERE fecha_reserva = '$fecha'  AND nro_vuelo = '$_SESSION[nro_vuelo]'";
				$ubicacion = mysql_query($sql);
				while ($row = mysql_fetch_row($ubicacion))
				{
					$row[0];
					$row[1];
					for($i=1;$i<=32;$i++)
					{
						for($j=0;$j<=4;$j++)
						{
							if ($row[0] == $columna3[$j])
							{
								if ($row[1]==$i)
								{
									$ubicol[$i][$j]= $columna3[$j];
									$ubifil[$i][$j]= $i;
								}
							}
						}
					}
				}

				mysql_close();
							
			
				$letra=['Fl','A','B','C','D','E'];
				echo "<table border=1>";
					echo "<tr>";
					for($i=0;$i<=5;$i++)
					{
						echo "<td>$letra[$i]</td>";
					}
					for($i=1;$i<=32;$i++)
					{
						echo "<tr><td>$i</td>";
						for($j=0;$j<=4;$j++)
						{ 
							if ($i<11)
							{
								if (($j==1)||($j==3))
								{
									if ((($ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='D') && $ubifil[$i][$j]==$i)||$clase=="Economica")
									{
										echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
									}
									else
									{
										echo "<td>";
											$asiento=$lettere[$j];
											$fila=$i;
											echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
											<img src=../img/asientoprimera.png width=35 height=15 /></a>";
										echo "</td>";
									}
								}
								else
								{
									echo "<td></td>";
								}
							}
							else
							{
								if ((($ubicol[$i][$j]=='A'||$ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='C'||$ubicol[$i][$j]=='D'||$ubicol[$i][$j]=='E') && $ubifil[$i][$j]==$i)||$clase=="Primera")
								{
									echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
								}
								else
								{
									echo "<td>";
										$asiento=$lettere[$j];
										$fila=$i;
										echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
										<img src=../img/asientoeconomy.png width=35 height=15 /></a>";
									echo "</td>";
								}
							}
						} 
						echo "<tr/>"; 
					} 
				echo"</table>";
			}
			tablas3();
		}
		if ($tipo==4)
		{
			function tablas4()
			{ 
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql8 = "SELECT fecha_reserva FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de fecha*/
					$ubicacion8 = mysql_query($sql8);
						while ($row = mysql_fetch_row($ubicacion8))
						{
							$row[0];

							$fecha=$row[0];

						}
					
				mysql_close();				
			
			
				$lettere=['A','B','C','D','E'];
							$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
							$db = mysql_select_db('aerolineas',$link);
								$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de tipo, clase */
								$ubicacion7 = mysql_query($sql7);
								while ($row = mysql_fetch_row($ubicacion7))
								{
									$row[0];
									$row[1];
									
									$tipos=$row[0];
									$clase=$row[1];
								
								}
						
							mysql_close();
				$tipo = $tipos;
				$columna4=['A','B','C','D'];
					for($i=1;$i<=41;$i++)
					{
						for($j=0;$j<=3;$j++)
						{
							$ubicol[$i][$j]= NULL;
							$ubifil[$i][$j]= NULL;
						}
					}	
				$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
				$db = mysql_select_db('aerolineas',$link);
				$sql = "SELECT asiento, fila FROM reserva WHERE fecha_reserva = '$fecha' AND nro_vuelo = '$_SESSION[nro_vuelo]'";
				$ubicacion = mysql_query($sql);
				while ($row = mysql_fetch_row($ubicacion))
				{
					$row[0];
					$row[1];
					for($i=1;$i<=41;$i++)
					{
						for($j=0;$j<=3;$j++)
						{
							if ($row[0] == $columna4[$j])
							{
								if ($row[1]==$i)
								{
									$ubicol[$i][$j]= $columna4[$j];
									$ubifil[$i][$j]= $i;
								}
							}
						}
					}
				}

				mysql_close();
							
				$letra=['Fl','A','B','C','D'];
				echo "<table border=1>";
					echo "<tr>";
					for($i=0;$i<=4;$i++)
					{
						echo "<td>$letra[$i]</td>";
					}
					for($i=1;$i<=41;$i++)
					{
						echo "<tr><td>$i</td>";
						for($j=0;$j<=3;$j++)
						{ 
							if ($i<11)
							{
								if (($j==0)||($j==1)||($j==2))
								{
									if ((($ubicol[$i][$j]=='A'||$ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='C') && $ubifil[$i][$j]==$i)||$clase=="Economica")
									{
										echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
									}
									else
									{
										echo "<td>";
											$asiento=$lettere[$j];
											$fila=$i;
											echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
											<img src=../img/asientoprimera.png width=35 height=15 /></a>";
										echo"</td>";
									}
								}
								else
								{
									echo "<td></td>";
								}
							}
							else
							{
								if ((($ubicol[$i][$j]=='A'||$ubicol[$i][$j]=='B'||$ubicol[$i][$j]=='C'||$ubicol[$i][$j]=='D') && $ubifil[$i][$j]==$i)||$clase=="Primera")
								{
									echo "<td><img src=../img/asientoocupado.png width=35 height=15 /></td>";
								}
								else
								{
									echo "<td>";
										$asiento=$lettere[$j];
										$fila=$i;
										echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=0' target=basedata>
										<img src=../img/asientoeconomy.png width=35 height=15 /></a>";
									echo "</td>";
								}
							}
						} 
						echo "<tr/>"; 
					} 
				echo"</table>";
			} 
			tablas4();
		}
		
		echo "</td>
		
			<td align=left>";
				echo "<img src=../img/aviontright.png alt=avionright width=130 height=120/>
			</td>
			</tr>
			<tr>
			<td></td>
			<td>";
				echo "<img src=../img/aviontdown.png alt=aviondown width=190 height=120/>
			</td>
			<td></td>
			</tr>
		</table>
	</div>";
/* --------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------- Envio de codigo para poder realizar el boarding ------------------------------------------------------ */
	echo"<p><a href=../index.php><img src=../img/volver.png alt=boton volver id=boton_volver width=99 height=37/></a></p>
		<p id=boton_continuar><a href=reservaconfirma.php?idCliente=$_SESSION[codigo]><img src=../img/continuar.png alt=boton continuar width=99 height=37/></a></p>";
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