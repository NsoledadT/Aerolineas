<?php
	
		include('../clases/DataBase.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph_pie.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph_pie3d.php');
	
		$BD = new DataBase();

		$consulta1 = $BD->consulta("select count(*) as total from reserva");
		$consulta2 = $BD->consulta("select count(*) as cantidad_pagas from reserva where estado_pasaje = 'Pago'");
		$consulta3 = $BD->consulta("select count(*) as cantidad_caidas from reserva where estado_pasaje = 'Reserva'");
		$result = $BD->resultToArray($consulta1);

		$result2 = $BD->resultToArray($consulta2);

		$result3 = $BD->resultToArray($consulta3);
		foreach ($result as $value) {
			$total = $value['total'];
		}

		foreach ($result2 as $value2) {
			$reservasPagas = $value2['cantidad_pagas'];
		}

		foreach ($result3 as $value3) {
			$reservasCaidas = $value3['cantidad_caidas'];
		}
		$vector = array($reservasPagas,$reservasCaidas);

		$ancho = 600;
		$alto = 300;
		
		$graph = new PieGraph($ancho,$alto,'auto');
		$graph->img->setAntiAliasing();
		$graph->setMarginColor('gray');
		$graph->setScale('textlin');
		$graph->title->set("Pasajes vendidos y reservas caidas");
		$serie = new PiePlot3D($vector);
		$serie->setSize(0.35);
		$serie->setCenter(0.5);
		$serie->value->SetFont(FF_FONT1,FS_BOLD); 
		$serie->value->SetColor("black");
		$serie->SetLabelPos(0.2);  
		$nombres = array("Pasajes Vendidos","Reservas Caidas");
		$serie->setLegends($nombres);
		$graph->add($serie);
		$graph->stroke(); 

?>