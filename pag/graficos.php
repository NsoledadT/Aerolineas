<?php
	if(isset($_POST['bot2'])){
		require_once('../../../php/pear/jpgraph/src/jpgraph.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph_pie.php');

		$vector = array(5,5,5,25,17,35,10);

		$ancho = 600;
		$alto = 300;
		$graph = new PieGraph($ancho,$alto,'auto');
		$graph->setScale('intint');

		$curva = new PiePlot($vector);
		$graph->add($curva);
		$graph->stroke(); 

	}

?>