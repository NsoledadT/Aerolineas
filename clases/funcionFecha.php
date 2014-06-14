<?php
function fechaDma($fecha)
{
   
    return substr($fecha, 6, 4) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2);
}
?>