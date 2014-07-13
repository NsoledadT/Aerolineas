
<?php
	if(isset($_POST['bot2'])){
	
	require_once('../../../php/pear/dompdf/dompdf_config.inc.php');	
	$html = '<html><body>'.'<img src="../graficos/pasajes_vendidos.php" alt="grafico morondanga!"/>'.'</body></html>';
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream("graficos.pdf"); 
	}
?>
