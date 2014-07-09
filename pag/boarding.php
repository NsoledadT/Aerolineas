<html>
<body>
<?php
//require("fpdf.php");
require("../dompdf/dompdf_config.inc.php");
//$pdf = new FPDF();// parametros posibles('p vertical l horizontal','mm milimetro','formato de hojaA4');
//$pdf -> AddPage();// parametros orientacion y tamaño.
//$pdf -> SetFont("Arial");

if(($_GET['idCliente'])!=NULL)
{
	$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
	$db = mysql_select_db('aerolineas',$link);
	$sql = "SELECT reserva.codigo_reserva, clase, asiento, fila, reserva.nro_vuelo, fecha_reserva, pasajero.dni, pasajero.nombre, pasajero.apellido
	FROM reserva inner join boarding_pass on reserva.codigo_reserva = boarding_pass.codigo_reserva 
	inner join pasajero on boarding_pass.dni = pasajero.dni WHERE reserva.codigo_reserva = '$_GET[idCliente]';";

	$result = mysql_query ($sql);
	if (!$result)
	{
	echo "".$_GET[idCliente]."";
		die ("La consulta SQL contiene errores.");
		mysql_close();
	}else	
		{		
			while ($row = mysql_fetch_row($result))
			{
			if(($row[2]&&$row[3])==NULL)
				{
					die("primero debe selecionar un lugar en el cual viajar <a href=../index.php> Volver </a>");
					mysql_close();
				}
				$html = '<table border="1"><tr><td>Codigo Reserva</td><td>Clase</td><td>Asiento</td> 
			<td>Fila</td><td>Nro. Vuelo</td><td>Fecha Reserva</td><td>Dni</td><td>Nombre</td><td>Apellido</td>
			</tr><tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td>
			<td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td></tr></table>';
			}
			
		}			
}
	$html=utf8_decode($html);
	$dompdf=new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream("boarding.pdf");
	
?>
</body>
</html>