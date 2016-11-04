<?php
$mysqli = new mysqli("localhost", "root", "root", "DAE_PRODUCTOS");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");
?>
