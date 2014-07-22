<?php

		$consulta4 = $BD->consulta("select reserva.clase,vuelo.lugar_llegada,count(*) as Pasajes_vendidos from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.estado_pasaje = 'Pago' group by reserva.clase,vuelo.lugar_llegada");
		
		$resultSet = $BD->resultToArray($consulta4);

		$clasificaciones = array();
		$resultados = array();
		$i = 0;
		$cadena2= "";
		$parte1 = "";
		$parte2 = "";
		foreach ($resultSet as $value) {
			$parte1 = $value['clase'];
			$parte2 = $value['lugar_llegada'];
			$cadena2 = $parte1."-".$parte2;
			$clasificaciones[$i] = $cadena2;
			$resultados[$i] = $value['Pasajes_vendidos'];
			$i++;
		}
		
		$graph2 = new Graph(500,300);
		$graph2->img->setMargin(50,40,20,40);
		$graph2->setScale("textlin",0,10);
		$graph2->title->set("Pasajes vendidos por categoria y destino");
		$graph2->xaxis->SetTitle("categoria-destino","middle");
		$graph2->xaxis->setTickLabels($clasificaciones);
		$graph2->yaxis->setTitle("cantidad","middle");
		$serie2 = new BarPlot($resultados);
		$serie2->SetFillgradient('orange','red',GRAD_VER); 
		$graph2->add($serie2);
		$numero2 = mt_rand(1,10000);
		$_SESSION['g_categoria'] = $numero2;
		$graph2->stroke("graficoB".$numero2.".png");
		
	
?>