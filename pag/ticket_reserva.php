<?php

require_once('../dompdf/dompdf_config.inc.php');
	
	
	if(isset($_POST['doc_ida'],$_POST['vuelo1'],$_POST['cod_ida'],$_POST['vuelo2'],$_POST['cod_vuelta'])){
			
			$documentoIda = $_POST['doc_ida'];
			$vueloIda = $_POST['vuelo1'];
			$codigoIda = $_POST['cod_ida'];
			$vueloVuelta = $_POST['vuelo2'];
			$codigoVuelta = $_POST['cod_vuelta'];
			
			$html = "<html>
						<head></head>
						<body>
							<h2>Ticket de Reserva</h2>
							</br>
							</br>
							<h4>Datos de pasaje de ida </h4>
							<table border = 1>
								<tr><td>Numero de Documento</td><td>Numero de Vuelo</td><td>Codigo de Reserva</td></tr>
								<tr><td>$documentoIda</td><td>$vueloIda</td><td>$codigoIda</td></tr>
							</table>
							</br>
							</br>
							<h4>Datos de pasaje de Vuelta</h4>
							<table border = 1>
								<tr><td>Numero de Documento</td><td>Numero de Vuelo</td><td>Codigo de Reserva</td></tr>
								<tr><td>$documentoIda</td><td>$vueloVuelta</td><td>$codigoVuelta</td></tr>
							</table>
						</body>
				</html>";
		
	
		}else{
				$documentoIda = $_POST['doc_ida'];
				$vueloIda = $_POST['vuelo1'];
				$codigoIda = $_POST['cod_ida'];
				$html = "<html>
						<head></head>
						<body>
							<h2>Ticket de Reserva</h2>
							</br>
							</br>
							<h4>Datos de pasaje de ida </h4>
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