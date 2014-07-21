<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
	$_SESSION['cambiar']=$_POST['cambiar'];
	if (isset($_SESSION['cambiar']))
	{
		$cambiar=$_POST['cambiar'];
	}
/* --------------------------------------------- Se establece si el usuario quiere cambiar reserva ------------------------------------------------------ */
		$bandera=0;
		$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql11 = "SELECT codigo_reserva FROM reserva"; /* */
					$ubicacion11 = mysql_query($sql11);
						while ($rowcodigo = mysql_fetch_row($ubicacion11))
						{
							$rowcodigo[0];
							if($rowcodigo[0]==$cambiar)
							{
							$bandera=$bandera+1;
							}
						}
						if ($bandera!=1)
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
						die ("El codigo de reserva no existe <a href=../index.php>Volver</a>");
						}
				mysql_close();
/* --------------------------------------------------------------------------------------------------------- */
?>
<html xmlns="http://www.w3.org/1999/xhtml"><!-- Se puede acceder a la pagina solo desde la principal con el codigo de reserva -->
	<head><title>Aerolinea Rustics</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
	    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>	
		<script type="text/javascript" src="../js/seleccion.js"></script>
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
			<img src="../img/chica_reserva.png" class="aeromoza" alt="azafata" width="227" height="280"/>
		<ul>
			<li><a href="pag/construccion.html">LA EMPRESA</a></li>
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
				<h4>REALIZA TU RESERVA</h4>
			</div>
	   <p>Aqu&iacute; podr&aacute; realizar su reserva la cual contendr&aacute; los datos del 
	   tipo de avion, clase, asiento, fechas y lugar de partida como de llegada.
	   Recuerde confirmar su reserva pagandola 48hs antes.</p>
	   <img src="../img/china_reserva.png" alt="imagen de recepcionista" width="199" height="179"/>

	<?php	
	echo"Presione continuar si desea imprimir su pasaje,volver para ir a la pagina principal.";
			$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
			$db = mysql_select_db('aerolineas',$link);
				$sql7 = "SELECT tipo_viaje, clase FROM reserva WHERE codigo_reserva LIKE '$_SESSION[codigo]'" ; /* Busqueda de tipo, clase*/
					$ubicacion7 = mysql_query($sql7);
						while ($row = mysql_fetch_row($ubicacion7))
						{
							$row[0];
							$row[1];

							$tipos=$row[0];
							$clase=$row[1];
 	
						}
						
				mysql_close();
		
		$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
		$db = mysql_select_db('aerolineas',$link);
		$sql4 = "SELECT codigo_reserva FROM reserva";
		$ubicacion4 = mysql_query($sql4);
		while ($rowreserva = mysql_fetch_row($ubicacion4))/* comparando en la base los codigos. Si existe puede cambiar asiento. */
		{
			$rowreserva[0];
			
			if ($cambiar==$rowreserva[0])
			{
				//codigo de la pagina por aca. Es igual a la pag. principal pero con la funcion de cambio de reserva.
				echo "Siga los pasos para reservar normalmente";
			echo "<form action=basedata.php target=basedata id=formulary method=post enctype=multipart/form-data onsubmit= seleccion() >";
			/* Formulario que apunta al iframe y carga basedata.php en el.. Selects de fila y asiento */
				echo "<input type=hidden name=posto value=0>";/* usado para determinar que se usan los select */
				echo "<input type=hidden name=cambiar value=$cambiar>";/* auto asignado el valor de cambiar en cero para en la ultima pagina determinar si se desea o no cambiar de reserva*/
				echo "<p>";
				echo "<br/>Clase: Seleccionar via Select!<br/>";
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

				echo "<br/><br/><input type=submit value=Iniciar /></p>";
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
								
								$sql3 = "SELECT max(codigo_reserva) FROM reserva";
								$ubicacion3 = mysql_query($sql3);
								while ($rowid = mysql_fetch_row($ubicacion3))
								{
									$rowid[0];
									$codelimit=$rowid[0];
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
														echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
							for($i=1;$i<=19;$i++)
							{
								for($j=0;$j<=4;$j++)
								{
									$ubicol[$i][$j]= NULL;
									$ubifil[$i][$j]= NULL;
								}
							}	
						$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
						$db = mysql_select_db('aerolineas',$link);
							$sql = "SELECT asiento, fila FROM reserva WHERE fecha_reserva = '$fecha' AND nro_vuelo = '$_SESSION[nro_vuelo]'"; /* Se accede a la base para guardar los asientos ocupados en tipo 2*/
							$ubicacion = mysql_query($sql);
							while ($row = mysql_fetch_row($ubicacion))
							{
								$row[0];
								$row[1];
								for($i=1;$i<=19;$i++)
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
						$sql3 = "SELECT max(codigo_reserva) FROM reserva";
						$ubicacion3 = mysql_query($sql3);
						while ($rowid = mysql_fetch_row($ubicacion3))
						{
							$rowid[0];
							$codelimit=$rowid[0];
						}
						mysql_close();
									
					
						$letra=['Fl','A','B','C','D','E'];
						echo "<table border=1>";
							echo "<tr>";
							for($i=0;$i<=5;$i++)
							{
								echo "<td>$letra[$i]</td>";
							}
							for($i=1;$i<=19;$i++)
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
													echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
												echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
							for($i=1;$i<=31;$i++)
							{
								for($j=0;$j<=4;$j++)
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
							for($i=1;$i<=31;$i++)
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
						
						$sql3 = "SELECT max(codigo_reserva) FROM reserva";
						$ubicacion3 = mysql_query($sql3);
						while ($rowid = mysql_fetch_row($ubicacion3))
						{
							$rowid[0];
							$codelimit=$rowid[0];
						}
						mysql_close();
									
					
						$letra=['Fl','A','B','C','D','E'];
						echo "<table border=1>";
							echo "<tr>";
							for($i=0;$i<=5;$i++)
							{
								echo "<td>$letra[$i]</td>";
							}
							for($i=1;$i<=31;$i++)
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
													echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
												echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
							for($i=1;$i<=40;$i++)
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
							for($i=1;$i<=40;$i++)
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
						
						$sql3 = "SELECT max(codigo_reserva) FROM reserva";
						$ubicacion3 = mysql_query($sql3);
						while ($rowid = mysql_fetch_row($ubicacion3))
						{
							$rowid[0];
							$codelimit=$rowid[0];
						}
						mysql_close();
									
						$letra=['Fl','A','B','C','D'];
						echo "<table border=1>";
							echo "<tr>";
							for($i=0;$i<=4;$i++)
							{
								echo "<td>$letra[$i]</td>";
							}
							for($i=1;$i<=40;$i++)
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
													echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Primera&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
												echo "<a href='basedata2.php?posto=1&tipo=$tipo&clase=Economica&asiento=$lettere[$j]&fila=$i&cambiar=$_POST[cambiar]' target=basedata>
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
			}
			  
		}

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