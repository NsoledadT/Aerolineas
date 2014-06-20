<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aerolinea Rustics</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>
<body>
<?php
session_start();

$puesto=$_POST['posto'];
$codelimit=$_POST['codelimit'];

		$link = mysql_connect('localhost','root','') or die("No se ha podido acceder"); /* determina asientos ya reservados para que sea 1 a 1 */
		$db = mysql_select_db('aerolinearustics',$link);
		$sql3 = "SELECT max(codigo_reserva) FROM reserva";
		$ubicacion3 = mysql_query($sql3);
			while ($rowid = mysql_fetch_row($ubicacion3))
			{
				$rowid[0];
				if ($codelimit!=$rowid[0])
					{
						die ("Usted ya ha reservado un asiento");
						mysql_close();
					}
			}
			mysql_close();
	
						
if ($puesto == 0) /* si le llega cero es porque uso selects*/
{
	$_SESSION['tipo']= $_POST['tipo'];
	$_SESSION['clase']= $_POST['clase'];
	$_SESSION['cambiar']= $_POST['cambiar'];
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
		if (($_SESSION['tipo']==1) && ($_SESSION['clase']=='Economy'))
		{
			echo "Fila:<br/>";
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila1>Fila 1</option><option value=Fila2>Fila 2</option><option value=Fila3>Fila 3</option><option value=Fila4>Fila 4</option><option value=Fila5>Fila 5</option><option value=Fila6>Fila 6</option><option value=Fila7>Fila 7</option><option value=Fila8>Fila 8</option><option value=Fila9>Fila 9</option><option value=Fila10>Fila 10</option></select>";
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
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila1>Fila 1</option><option value=Fila2>Fila 2</option><option value=Fila3>Fila 3</option><option value=Fila4>Fila 4</option><option value=Fila5>Fila 5</option></select>";
			echo "<br/>Asiento:<br/>";
			echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=B>Asiento B</option><option value=D>Asiento D</option></select>";
		}
		if (($_SESSION['tipo']==2) && ($_SESSION['clase']=='Economy'))
		{
			echo "Fila:<br/>";
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila6>Fila 6</option><option value=Fila7>Fila 7</option><option value=Fila8>Fila 8</option><option value=Fila9>Fila 9</option><option value=Fila10>Fila 10</option><option value=Fila11>Fila 11</option><option value=Fila12>Fila 12</option><option value=Fila13>Fila 13</option><option value=Fila14>Fila 14</option><option value=Fila15>Fila 15</option><option value=Fila16>Fila 16</option><option value=Fila17>Fila 17</option><option value=Fila18>Fila 18</option><option value=Fila19>Fila 19</option></select>";
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
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila1>Fila 1</option><option value=Fila2>Fila 2</option><option value=Fila3>Fila 3</option><option value=Fila4>Fila 4</option><option value=Fila5>Fila 5</option><option value=Fila6>Fila 6</option><option value=Fila7>Fila 7</option><option value=Fila8>Fila 8</option><option value=Fila9>Fila 9</option><option value=Fila10>Fila 10</option></select>";
			echo "<br/>Asiento:<br/>";
			echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=B>Asiento B</option><option value=D>Asiento D</option></select>";
		}
		if (($_SESSION['tipo']==3) && ($_SESSION['clase']=='Economy'))
		{
			echo "Fila:<br/>";
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila11>Fila 11</option><option value=Fila12>Fila 12</option><option value=Fila13>Fila 13</option><option value=Fila14>Fila 14</option><option value=Fila15>Fila 15</option><option value=Fila16>Fila 16</option><option value=Fila17>Fila 17</option><option value=Fila18>Fila 18</option><option value=Fila19>Fila 19</option><option value=Fila20>Fila 20</option><option value=Fila21>Fila 21</option><option value=Fila22>Fila 22</option><option value=Fila23>Fila 23</option><option value=Fila24>Fila 24</option><option value=Fila25>Fila 25</option><option value=Fila26>Fila 26</option><option value=Fila27>Fila 27</option><option value=Fila28>Fila 28</option><option value=Fila29>Fila 29</option><option value=Fila30>Fila 30</option><option value=Fila31>Fila 31</option></select>";
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
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila1>Fila 1</option><option value=Fila2>Fila 2</option><option value=Fila3>Fila 3</option><option value=Fila4>Fila 4</option><option value=Fila5>Fila 5</option><option value=Fila6>Fila 6</option><option value=Fila7>Fila 7</option><option value=Fila8>Fila 8</option><option value=Fila9>Fila 9</option><option value=Fila10>Fila 10</option></select>";
			echo "<br/>Asiento:<br/>";
			echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option></select>";
		}
		if (($_SESSION['tipo']==4) && ($_SESSION['clase']=='Economy'))
		{
			echo "Fila:<br/>";
			echo "<select name=fila id=fila><option selected value=Selec>Seleccione</option><option value=Fila11>Fila 11</option><option value=Fila12>Fila 12</option><option value=Fila13>Fila 13</option><option value=Fila14>Fila 14</option><option value=Fila15>Fila 15</option><option value=Fila16>Fila 16</option><option value=Fila17>Fila 17</option><option value=Fila18>Fila 18</option><option value=Fila19>Fila 19</option><option value=Fila20>Fila 20</option><option value=Fila21>Fila 21</option><option value=Fila22>Fila 22</option><option value=Fila23>Fila 23</option><option value=Fila24>Fila 24</option><option value=Fila25>Fila 25</option><option value=Fila26>Fila 26</option><option value=Fila27>Fila 27</option><option value=Fila28>Fila 28</option><option value=Fila29>Fila 29</option><option value=Fila30>Fila 30</option><option value=Fila31>Fila 31</option><option value=Fila32>Fila 32</option><option value=Fila33>Fila 33</option><option value=Fila34>Fila 34</option><option value=Fila35>Fila 35</option><option value=Fila36>Fila 36</option><option value=Fila37>Fila 37</option><option value=Fila38>Fila 38</option><option value=Fila39>Fila 39</option><option value=Fila40>Fila 40</option></select>";
			echo "<br/>Asiento:<br/>";
			echo "<select name=asiento id=asiento><option selected value=Selec>Seleccione</option><option value=A>Asiento A</option><option value=B>Asiento B</option><option value=C>Asiento C</option><option value=D>Asiento D</option></select>";
		}

		echo "<br/><input type=submit value=Confirmar ><input type=reset value=Reset >";
	echo "</form>";
}

?>
</body>
</html>