
<?php

	
	session_start();
	$id_foto1 = $_SESSION['g_torta'];
	$id_foto2 = $_SESSION['g_categoria'];
	$id_foto3 = $_SESSION['g_ocupacion'];
	

	
	require_once('../dompdf/dompdf_config.inc.php');
	$ruta='../graficos/';
	$filename1 = 'graficoA'.$id_foto1.'.png';
	$filename2 = 'graficoB'.$id_foto2.'.png';
	$filename3 = 'graficoC'.$id_foto3.'.png';
	$html = '<html>
							<head>
								<style type="text/css">
									div{
										margin-bottom:60px;
										text-align:center;
									}
									h2{
										text-align:center;
									}
								</style>
							</head>
							<body>
							<h2>Estadisticas en graficos de Aerolineas Rustics</h2>
							<div><img src="'.$ruta.basename($filename1).'" /></div>
							<div><img src="'.$ruta.basename($filename2).'" /></div>
							<div><img src="'.$ruta.basename($filename3).'" /></div>
							</body>
					</html>';
	
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream("graficos.pdf");
	


?>
