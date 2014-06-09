<?php
class DataBase {
private $localhost;
private $usuario;
private $password;
private $base;
private $conexion;
private $consulta;


public function __construct(){
$this->array_ini = parse_ini_file("configuracion.ini");
$this->localhhost=$this->array_ini["localhost"];
$this->usuario= $this->array_ini["usuario"];
$this->password= $this->array_ini["password"];
$this->base = $this->array_ini["database"];
$this->conexionConBaseDatos();

}

private function conexionConBaseDatos(){
$this->conexion = mysql_connect($this->localhost,$this->usuario,$this->password,"") or die ("no se pudo realizar conexion");
}

public function consulta($sql){
$db = mysql_select_db($this->base,$this->conexion) or die ("no se pudo seleccionar base de datos");
$this->consulta = mysql_query($sql,$this->conexion) or die ("no se pudo hacer insercion");
}

public function impresion(){
$nfilas= mysql_num_rows($this->consulta);
   for($i=0; $i < $nfilas; $i++){
		   $fila = mysql_fetch_array($this->consulta);
		   echo('<option value="'.$fila['nombre'].'">'.$fila['nombre'].'</option>');
		  }
}

public function cerrar(){
mysql_close($this->conexion);
}

}
?>