<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>
<body>
<?php
session_start();
$_SESSION['cambiar']= $_GET['cambiar'];
$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
				$db = mysql_select_db('aerolineas',$link);
					$sql = "SELECT asiento, fila FROM reserva WHERE nro_vuelo = '$_SESSION[nro_vuelo]' AND codigo_reserva= '$_SESSION[codigo]'"; /* Se accede a la base para guardar los asientos ocupados en tipo 2*/
					$ubicacion = mysql_query($sql);
					while ($row = mysql_fetch_row($ubicacion))
					{
						$row[0];
						$row[1];
						if ($_SESSION['cambiar']==0)
						{
						if (($row[0]&&$row[1])!=NULL)
						{
							die ("Usted ya ha reservado un asiento");
							mysql_close();
						}
						}
					}
					mysql_close();

$puesto=$_GET['posto'];
	if ($puesto == 1)/* determina que uso el grafico del avion para elegir asiento, lo toma por url. */
	{
		$_SESSION['tipo']= $_GET['tipo'];
		$_SESSION['clase']= $_GET['clase'];
		$letras=$_GET['asiento'];
		$fila=$_GET['fila'];

		
		echo "<form action=reservabase.php id=formulary2 method=post enctype=multipart/form-data onsubmit=return active(this)>";
			echo "<input type=hidden name=tipo value=$_SESSION[tipo]>";
			echo "<input type=hidden name=clase value=$_SESSION[clase]>";
			echo "<input type=hidden name=asiento value=$letras>";
			echo "<input type=hidden name=fila value=$fila>";
			echo "Datos.<br/>";
			echo "Tipo: $_SESSION[tipo] <br/>";
			echo "Clase: $_SESSION[clase] <br/>";
			echo "Asiento: $letras <br/>";
			echo "Fila: $fila <br/>";
			echo "Desea realmente confirmar.";
			echo "<br/><input type=submit value=Confirmar >";/* se confirma el envio de la clase, tipo, asiento, fila*/
		echo "</form>";
	}
?>
</body>
</html>
