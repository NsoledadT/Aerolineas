<?php
	
	session_start();

	include('../clases/DataBase.php');
	require_once('../jpgraph/src/jpgraph.php');
	require_once('../jpgraph/src/jpgraph_pie.php');
	require_once('../jpgraph/src/jpgraph_pie3d.php');
	require_once('../jpgraph/src/jpgraph_bar.php');


	$BD = new DataBase();

	include('pasajes_vendidos.php');
	include('pasajesPorCategoriaYdestino.php');
	include('ocupacionPorAvionYdestino.php');

	header('location:../pag/loginAdmin.php');


?>