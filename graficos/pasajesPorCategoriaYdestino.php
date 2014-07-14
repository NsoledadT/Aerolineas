<?php
		include('../clases/DataBase.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph.php');
		require_once('../../../php/pear/jpgraph/src/jpgraph_bar.php');
	
		$BD = new DataBase();

		
		$consulta1 = $BD->consulta("select reserva.clase,vuelo.lugar_llegada,count(*) as Pasajes_vendidos from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.estado_pasaje = 'Pago' group by reserva.clase,vuelo.lugar_llegada");
		
		$resultSet = $BD->resultToArray($consulta1);

		$clasificaciones = array();
		$resultados = array();
		$i = 0;
		$cadena = "";
		$parte1 = "";
		$parte2 = "";
		foreach ($resultSet as $value) {
			$parte1 = $value['clase'];
			$parte2 = $value['lugar_llegada'];
			$cadena = $parte1."-".$parte2;
			$clasificaciones[$i] = $cadena;
			$resultados[$i] = $value['Pasajes_vendidos'];
			$i++;
		}
		
		$graph = new Graph(500,300);
		$graph->img->setMargin(50,40,20,40);
		$graph->setScale("textlin",0,10);
		$graph->title->set("Pasajes vendidos por categoria y destino");
		$graph->xaxis->SetTitle("categoria-destino","middle");
		$graph->xaxis->setTickLabels($clasificaciones);
		$graph->yaxis->setTitle("cantidad","middle");
		$serie = new BarPlot($resultados);
		$serie->SetFillgradient('orange','red',GRAD_VER); 
		$graph->add($serie);
		$graph->stroke();
?>