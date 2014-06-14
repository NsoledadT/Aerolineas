<?php
class impresionBase {

 public function resultToArray($resultado) {
        $lista = array();

        // Recorro el resultado
        while ($fila = mysql_fetch_assoc($resultado)) {

            // Agrego el array resultante a la lista
            $lista[] = $fila;
        }
        return $lista;
    }

}
?>