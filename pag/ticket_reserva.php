<?php
session_start();
require_once('../dompdf/dompdf_config.inc.php');
	
	if(isset($_SESSION['doc_ida'],$_SESSION['vuelo1'],$_SESSION['cod_ida'],$_SESSION['doc_vuelta'],$_SESSION['vuelo2'],$_SESSION['cod_vuelta'])){
		$documentoIda = $_SESSION['doc_ida'];
		$vueloIda = $_SESSION['vuelo1'];
		$codigoIda = $_SESSION['cod_ida'];
		$documentoVuelta = $_SESSION['doc_vuelta'];
		$vueloVuelta =  $_SESSION['vuelo2'];
		$codigoVuelta = $_SESSION['cod_vuelta'];
		$html = "<html>
						<head></head>
						<body>
							<h2>Ticket de Reserva</h2>
							</br>
							</br>
							<h4>Datos de pasaje de ida</h4>
							<table border = 1>
								<tr><td>Numero de Documento</td><td>Numero de Vuelo</td><td>Codigo de Reserva</td></tr>
								<tr><td>$documentoIda</td><td>$vueloIda</td><td>$codigoIda</td></tr>
							</table>
							</br>
							</br>
							<h4>Datos de pasaje de Vuelta</h4>
							<table border = 1>
								<tr><td>Numero de Documento</td><td>Numero de Vuelo</td><td>Codigo de Reserva</td></tr>
								<tr><td>$documentoVuelta</td><td>$vueloVuelta</td><td>$codigoVuelta</td></tr>
							</table>
						</body>
				</html>";
	}else{
			$html = "<html>
						<head></head>
						<body>
							<h2>Ticket de Reserva</h2>
							</br>
							</br>
							<h4>Datos de pasaje de ida</h4>
							<table border = 1>
								<tr><td>Numero de Documento</td><td>Numero de Vuelo</td><td>Codigo de Reserva</td></tr>
								<tr><td>$documentoIda</td><td>$vueloIda</td><td>$codigoIda</td></tr>
							</table>
						</body>
				</html>";
	}
	
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream("ticketReserva.pdf");
?>