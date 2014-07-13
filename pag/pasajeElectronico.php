<html>
<body>
<?php
require("../dompdf/dompdf_config.inc.php");

include("../clases/DataBase.php");
$baseDatos = new DataBase("");

//$pago= $baseDatos -> consulta("SELECT codigo_reserva, estado_pasaje
//FROM reserva
//WHERE codigo_reserva='$codigoReserva'
//AND estado_pasaje = 'Pago'");

$economica=$baseDatos -> consulta("SELECT reserva.codigo_reserva, clase, reserva.nro_vuelo, fecha_reserva, vuelo.lugar_partida, vuelo.lugar_llegada, vuelo.horario_partida, vuelo.horario_llegada, vuelo.precio_economica, pasajero.dni, pasajero.nombre, pasajero.apellido
FROM reserva
INNER JOIN vuelo ON reserva.nro_vuelo = vuelo.nro_vuelo
INNER JOIN pasaje ON reserva.codigo_reserva = pasaje.codigo_reserva
INNER JOIN pasajero ON pasaje.dni = pasajero.dni
WHERE reserva.codigo_reserva");

$primera = $baseDatos -> consulta("SELECT reserva.codigo_reserva, clase, reserva.nro_vuelo, fecha_reserva, 
vuelo.lugar_partida, vuelo.lugar_llegada, vuelo.horario_partida, vuelo.horario_llegada, vuelo.precio_primera, 
pasajero.dni, pasajero.nombre, pasajero.apellido
FROM reserva
INNER JOIN vuelo ON reserva.nro_vuelo = vuelo.nro_vuelo
INNER JOIN pasaje ON reserva.codigo_reserva = pasaje.codigo_reserva
INNER JOIN pasajero ON pasaje.dni = pasajero.dni
WHERE reserva.codigo_reserva");

if($economica){
      while ($row = mysql_fetch_row($economica)){
   
	   $pasaje = '<table border="1"><tr bgcolor="#5882FA"><td colspan="2" align="center">Datos vuelo</td></tr><tr><td>Codigo Reserva</td><td>'.$row[0].'</td></tr><tr><td>Clase</td><td>'.$row[1].'</td></tr><tr><td>Nro. Vuelo</td><td>'.$row[2].'</td></tr>
	       <tr><td>Fecha Reserva</td><td>'.$row[3].'</td></tr><tr><td>Origen</td><td>'.$row[4].'</td></tr><tr><td>Destino</td><td>'.$row[5].'</td></tr><tr><td>Horario partida</td><td>'.$row[6].'</td></tr>
		   <tr><td>Horario llegada</td><td>'.$row[7].'</td></tr><tr><td>Precio</td><td>'.$row[8].'</td></tr></table>
		   
		   <table border="1"><tr bgcolor="#5882FA" color="white"><td colspan="2" align="center">Datos pasajero</td></tr><tr><td>Documento</td><td>'.$row[9].'</td></tr><tr><td>Nombre</td><td>'.$row[10].'</td><</tr>
		   <tr><td>Apellido</td><td>'.$row[11].'</td></tr></table>';
			}
         }
 
 else if($primera){
     while ($row2 = mysql_fetch_row($primera)){
   
	      $pasaje = '<table border="1"><tr bgcolor="#5882FA"><td colspan="2" align="center">Datos vuelo</td></tr><tr><td>Codigo Reserva</td><td>'.$row[0].'</td></tr><tr><td>Clase</td><td>'.$row[1].'</td></tr><tr><td>Nro. Vuelo</td><td>'.$row[2].'</td></tr>
	       <tr><td>Fecha Reserva</td><td>'.$row[3].'</td></tr><tr><td>Origen</td><td>'.$row[4].'</td></tr><tr><td>Destino</td><td>'.$row[5].'</td></tr><tr><td>Horario partida</td><td>'.$row[6].'</td></tr>
		   <tr><td>Horario llegada</td><td>'.$row[7].'</td></tr><tr><td>Precio</td><td>'.$row[8].'</td></tr></table>
		   
		   <table border="1"><tr bgcolor="#5882FA"><td colspan="2" align="center">Datos pasajero</td></tr><tr><td>Documento</td><td>'.$row[9].'</td></tr><tr><td>Nombre</td><td>'.$row[10].'</td><</tr>
		   <tr><td>Apellido</td><td>'.$row[11].'</td></tr></table>';
			}
     }

$pasaje=utf8_decode($pasaje);
$dompdf=new DOMPDF();
$dompdf->load_html($pasaje);
$dompdf->render();
$dompdf->stream("pasaje.pdf");
?>
</body>
</html>