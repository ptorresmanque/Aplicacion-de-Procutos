<?php
session_start();
if(isset($_POST['id_user_comentado']) && isset($_POST['comentario']) && isset($_SESSION['id'])){
	require '../config/db.php';
  $sql = "INSERT INTO comentario(id_usuario_comentado, id_usuario_comentando, descripcion, fecha) VALUES (
  ".$_POST['id_user_comentado'].", ".$_SESSION['id'].", '".$_POST['comentario']."', now())";
  $mysqli->query($sql);
  $id = $mysqli->insert_id;
  $res = "SELECT b.nombre, b.avatar, a.descripcion, a.fecha FROM comentario a, usuario b where a.id = ".$id." and a.id_usuario_comentando = b.id";
  $result = $mysqli->query($res);
  $row = $result->fetch_array(MYSQLI_BOTH);
  $arr = array('status' => 'ok', 'nombre' => $row['nombre'], 'avatar' => $row['avatar'], 'descripcion' => $row['descripcion'], 'fecha' => $row['fecha']);
  header('Content-Type: application/json');
  echo json_encode($arr);
}
?>
