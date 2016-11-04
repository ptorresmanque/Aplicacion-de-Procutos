<?php
  session_start();
  if(isset($_POST['pass']) && isset($_POST['pass2']) && isset($_SESSION['id'])){
    require '../config/db.php';
    $pass = $_POST["pass"];
    $hashpassword = hash('sha256', $pass);

    $pass2 = $_POST["pass2"];
    $hashpassword2 = hash('sha256', $pass2);

    $sql = "SELECT * FROM usuario where id = ".$_SESSION['id']." and password = '$hashpassword'";
    $result = $mysqli->query($sql);
    $c = $result->num_rows;
    if($c > 0){
      $sql = "UPDATE usuario SET password = '$hashpassword2', fecha_actualizacion = now() WHERE id = ".$_SESSION['id']."";
      $mysqli->query($sql);
      $arr = array('status' => 'ok', 'pass' => $pass2);
      header('Content-Type: application/json');
      echo json_encode($arr);
    }else{
      $arr = array('status' => 'errorpassword');
      header('Content-Type: application/json');
      echo json_encode($arr);
    }
  }else{
    $arr = array('status' => 'error');
    header('Content-Type: application/json');
    echo json_encode($arr);
  }
?>
