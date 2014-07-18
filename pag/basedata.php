<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['nro_vuelo']))
{
}
else
{
die ("Accion no permitida. Volver a la pagina principal, o imprima el boarding pass.");  	
}
$_SESSION['cambiar']= $_POST['cambiar'];

				$link = mysql_connect('localhost','root','') or die("No se ha podido acceder");
				$db = mysql_select_db('aerolineas',$link);
					$sql = "SELECT asiento, fila FROM reserva WHERE nro_vuelo = '$_SESSION[nro_vuelo]' AND codigo_reserva= '$_SESSION[codigo]'"; /* Se accede a la base para guardar los asientos ocupados en tipo 2*/
					$ubicacion = mysql_query($sql);
					while ($row = mysql_fetch_row($ubicacion))
					{
						$row[0];
						$row[1];
						if ($_SESSION['cambiar']==0)
						{
						if (($row[0]&&$row[1])!=NULL)
						{
							die ("Usted ya ha reservado un asiento");
							mysql_close();
						}
						}
					}
					mysql_close();
		
	$puesto=$_POST['posto'];


	if ($puesto == 0) /* si le llega cero es porque uso selects*/
	{
		$_SESSION['tipo']= $_POST['tipo'];
		$_SESSION['clase']= $_POST['clase'];

		/* selects en el form que envian segun el tipo y clase la fila y asientos seleccionados. */
		echo "<form action=reservabase.php id=formulary method=post enctype=multipart/form-data onsubmit=return active(this)>";
			if (($_SESSION['tipo']==1) && ($_SESSION['clase']=='Selec'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option></select>";
			}
			if (($_SESSION['tipo']==1) && ($_SESSION['clase']=='Primera'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>No hay fila</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>No hay asiento</option></select>";
			}
			if (($_SESSION['tipo']==1) && ($_SESSION['clase']=='Economica'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=1>Fila 1</option><option value=2>Fila 2</option><option value=3>Fila 3</option><option value=4>Fila 4</option><option value=5>Fila 5</option><option value=6>Fila 6</option><option value=7>Fila 7</option><option value=8>Fila 8</option><option value=9>Fila 9</option><option value=10>Fila 10</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option></select>";
			}



			if (($_SESSION['tipo']==2) && ($_SESSION['clase']=='Selec'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option></select>";
			}
			if (($_SESSION['tipo']==2) && ($_SESSION['clase']=='Primera'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=1>Fila 1</option><option value=2>Fila 2</option><option value=3>Fila 3</option><option value=4>Fila 4</option><option value=5>Fila 5</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=B>Asiento B</option><option value=D>Asiento D</option></select>";
			}
			if (($_SESSION['tipo']==2) && ($_SESSION['clase']=='Economica'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=6>Fila 6</option><option value=7>Fila 7</option><option value=8>Fila 8</option><option value=9>Fila 9</option><option value=10>Fila 10</option><option value=11>Fila 11</option><option value=12>Fila 12</option><option value=13>Fila 13</option><option value=14>Fila 14</option><option value=15>Fila 15</option><option value=16>Fila 16</option><option value=17>Fila 17</option><option value=18>Fila 18</option><option value=19>Fila 19</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option><option value=D>Asiento D</option><option value=E>Asiento E</option></select>";
			}



			if (($_SESSION['tipo']==3) && ($_SESSION['clase']=='Selec'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option></select>";
			}
			if (($_SESSION['tipo']==3) && ($_SESSION['clase']=='Primera'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=1>Fila 1</option><option value=2>Fila 2</option><option value=3>Fila 3</option><option value=4>Fila 4</option><option value=5>Fila 5</option><option value=6>Fila 6</option><option value=7>Fila 7</option><option value=8>Fila 8</option><option value=9>Fila 9</option><option value=10>Fila 10</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=B>Asiento B</option><option value=D>Asiento D</option></select>";
			}
			if (($_SESSION['tipo']==3) && ($_SESSION['clase']=='Economica'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=11>Fila 11</option><option value=12>Fila 12</option><option value=13>Fila 13</option><option value=14>Fila 14</option><option value=15>Fila 15</option><option value=16>Fila 16</option><option value=17>Fila 17</option><option value=18>Fila 18</option><option value=19>Fila 19</option><option value=20>Fila 20</option><option value=21>Fila 21</option><option value=22>Fila 22</option><option value=23>Fila 23</option><option value=24>Fila 24</option><option value=25>Fila 25</option><option value=26>Fila 26</option><option value=27>Fila 27</option><option value=28>Fila 28</option><option value=29>Fila 29</option><option value=30>Fila 30</option><option value=31>Fila 31</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option><option value=D>Asiento D</option><option value=E>Asiento E</option></select>";
			}



			if (($_SESSION['tipo']==4) && ($_SESSION['clase']=='Selec'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option></select>";
			}
			if (($_SESSION['tipo']==4) && ($_SESSION['clase']=='Primera'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=1>Fila 1</option><option value=2>Fila 2</option><option value=3>Fila 3</option><option value=4>Fila 4</option><option value=5>Fila 5</option><option value=6>Fila 6</option><option value=7>Fila 7</option><option value=8>Fila 8</option><option value=9>Fila 9</option><option value=10>Fila 10</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option></select>";
			}
			if (($_SESSION['tipo']==4) && ($_SESSION['clase']=='Economica'))
			{
				echo "Fila:<br/>";
				echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=11>Fila 11</option><option value=12>Fila 12</option><option value=13>Fila 13</option><option value=14>Fila 14</option><option value=15>Fila 15</option><option value=16>Fila 16</option><option value=17>Fila 17</option><option value=18>Fila 18</option><option value=19>Fila 19</option><option value=20>Fila 20</option><option value=21>Fila 21</option><option value=22>Fila 22</option><option value=23>Fila 23</option><option value=24>Fila 24</option><option value=25>Fila 25</option><option value=26>Fila 26</option><option value=27>Fila 27</option><option value=28>Fila 28</option><option value=29>Fila 29</option><option value=30>Fila 30</option><option value=31>Fila 31</option><option value=32>Fila 32</option><option value=33>Fila 33</option><option value=34>Fila 34</option><option value=35>Fila 35</option><option value=36>Fila 36</option><option value=37>Fila 37</option><option value=38>Fila 38</option><option value=39>Fila 39</option><option value=40>Fila 40</option></select>";
				echo "<br/>Asiento:<br/>";
				echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option><option value=D>Asiento D</option></select>";
			}

			echo "<br/><input type=submit value=Confirmar ><input type=reset value=Reset >";
		echo "</form>";
	}

?>
</body>
</html>