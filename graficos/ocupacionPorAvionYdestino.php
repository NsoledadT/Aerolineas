<?php

		$consulta = $BD->consulta("select vuelo.matricula_avion,vuelo.lugar_llegada,count(*) as Ocupacion from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.asiento != '' and reserva.fila != '' group by vuelo.matricula_avion,vuelo.lugar_llegada");

		$resultSet2 = $BD->resultToArray($consulta);

		$clasificaciones = array();
		$resultados2 = array();
		$i = 0;
		$cadena = "";
		$parte12 = "";
		$parte22 = "";
		foreach ($resultSet2 as $value) {
			$parte12 = $value['matricula_avion'];
			$parte22 = $value['lugar_llegada'];
			$cadena = $parte12."-".$parte22;
			$clasificaciones[$i] = $cadena;
			$resultados2[$i] = $value['Ocupacion'];
			$i++;
		}

		$graph3 = new Graph(500,300);
		$graph3->img->setMargin(50,40,20,40);
		$graph3->setScale("textlin",0,10);
		$graph3->title->set("Ocupacion por avion y destino");
		$graph3->xaxis->SetTitle("avion-destino","middle");
		$graph3->xaxis->setTickLabels($clasificaciones);
		$graph3->yaxis->setTitle("ocupacion","middle");
		$serie3 = new BarPlot($resultados);
		$serie3->SetFillgradient('orange','red',GRAD_VER); 
		$graph3->add($serie3);
		$numero = mt_rand(1,10000);
		$_SESSION['g_ocupacion'] = $numero;
		$graph3->stroke("graficoC".$numero.".png");
		
	
?>