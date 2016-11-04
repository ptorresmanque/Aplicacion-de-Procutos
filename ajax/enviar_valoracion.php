<?php
session_start();
if(isset($_POST['id_user_valorado']) && isset($_POST['nota']) && isset($_SESSION['id'])){
	require '../config/db.php';
  $sql = "SELECT * FROM valoracion where id_usuario_valorando = ".$_SESSION['id']." and id_usuario_valorado = ".$_POST['id_user_valorado']."";
  $result = $mysqli->query($sql);
  $c = $result->num_rows;
  if($c == 0){
    $sql = "INSERT INTO valoracion(id_usuario_valorado, id_usuario_valorando, nota) VALUES (
    ".$_POST['id_user_valorado'].", ".$_SESSION['id'].", ".$_POST['nota'].")";
    $mysqli->query($sql);
  }else{
    $sql = "UPDATE valoracion SET nota=".$_POST['nota']." WHERE id_usuario_valorando = ".$_SESSION['id']." and id_usuario_valorado = ".$_POST['id_user_valorado']."";
    $mysqli->query($sql);
  }
  $sqlNota = "SELECT avg(nota) as nota FROM valoracion where id_usuario_valorado = ".$_POST['id_user_valorado']."";
  $nota = $mysqli->query($sqlNota);
  $rowNota = $nota->fetch_array(MYSQLI_BOTH);
  $arr = array('status' => 'ok', 'nota' => round($rowNota['nota'], 1));
  header('Content-Type: application/json');
  echo json_encode($arr);
}
?>
