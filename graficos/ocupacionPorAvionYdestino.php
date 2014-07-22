<?php
	
	session_start();
	include('../clases/DataBase.php');
		require_once('../jpgraph/src/jpgraph.php');
		require_once('../jpgraph/src/jpgraph_bar.php');
	
		$BD = new DataBase();

		$consulta = $BD->consulta("select vuelo.matricula_avion,vuelo.lugar_llegada,count(*) as Ocupacion from reserva join vuelo on reserva.nro_vuelo = vuelo.nro_vuelo where reserva.asiento != '' and reserva.fila != '' group by vuelo.matricula_avion,vuelo.lugar_llegada");

		$resultSet = $BD->resultToArray($consulta);

		$clasificaciones = array();
		$resultados = array();
		$i = 0;
		$cadena = "";
		$parte1 = "";
		$parte2 = "";
		foreach ($resultSet as $value) {
			$parte1 = $value['matricula_avion'];
			$parte2 = $value['lugar_llegada'];
			$cadena = $parte1."-".$parte2;
			$clasificaciones[$i] = $cadena;
			$resultados[$i] = $value['Ocupacion'];
			$i++;
		}

		$graph = new Graph(500,300);
		$graph->img->setMargin(50,40,20,40);
		$graph->setScale("textlin",0,10);
		$graph->title->set("Ocupacion por avion y destino");
		$graph->xaxis->SetTitle("avion-destino","middle");
		$graph->xaxis->setTickLabels($clasificaciones);
		$graph->yaxis->setTitle("ocupacion","middle");
		$serie = new BarPlot($resultados);
		$serie->SetFillgradient('orange','red',GRAD_VER); 
		$graph->add($serie);
		$numero = mt_rand(1,10000);
		$_SESSION['g_ocupacion'] = $numero;
		$graph->stroke("graficoC".$numero.".png");
		echo "grafico generado"."<a href= ../pag/loginAdmin.php>volver</a>";
	
?>