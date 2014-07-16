<html>
<body>
<?php
//require("fpdf.php");
require("../dompdf/dompdf_config.inc.php");
//$pdf = new FPDF();// parametros posibles('p vertical l horizontal','mm milimetro','formato de hojaA4');
//$pdf -> AddPage();// parametros orientacion y tamaño.
//$pdf -> SetFont("Arial");
/* ---------------------------------------------- Dentro del if se realiza la busqueda de los datos para el boarding pass --------- */
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
				
				$output = $_GET['idCliente'];
				
				include "../phpqrcode/qrlib.php"; 				

				//set it to writable location, a place for temp generated PNG files
				$PNG_TEMP_DIR = 'temp/';
				
				//html PNG location prefix
				$PNG_WEB_DIR = 'temp/';

			   

				//ofcourse we need rights to create temp dir
				if (!file_exists($PNG_TEMP_DIR))
					{mkdir($PNG_TEMP_DIR);}

				$filename = $PNG_TEMP_DIR.'test.png';

				$matrixPointSize = 8;
				$errorCorrectionLevel = 'L';

				$filename = $PNG_TEMP_DIR.'test'.md5($errorCorrectionLevel.'|'.$matrixPointSize).'.png';
				QRcode::png($output, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
				//die($PNG_TEMP_DIR.basename($filename));
				//echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>'; 
				/* ----------------------------------------------------- Esto es lo que imprime en el pdf -------------------------- */
				$html = '<table border="1"><tr><td>Codigo Reserva</td><td>Clase</td><td>Asiento</td> 
			<td>Fila</td><td>Nro. Vuelo</td><td>Fecha Reserva</td><td>Dni</td><td>Nombre</td><td>Apellido</td><td>QR</td>
			</tr><tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td>
			<td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td><img src="temp/'.basename($filename).'" /></td></tr></table>';
			}
						
		}			
	}
	$html=utf8_decode($html);
	$dompdf=new DOMPDF();
	$dompdf->load_html($html);
	ini_set("memory_limit","32M");
	$dompdf->render();
	$dompdf->stream("boarding.pdf");

?>
</body>
</html>