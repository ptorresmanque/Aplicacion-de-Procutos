<?php
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
    require '../config/db.php';
    session_start();
  	$email = $_POST["email"];
  	$pass = $_POST["pass"];
    $name = $_POST['name'];
  	$hashpassword = hash('sha256', $pass);
  	$result = $mysqli->query("SELECT * FROM usuario where email = '$email'");
    if($result->num_rows == 0){
      $sql = "INSERT INTO usuario (nombre, email, password, avatar, fecha_creacion, fecha_actualizacion) VALUES('$name', '$email', '$hashpassword', 'avatar.jpg', now(), now())";
      $mysqli->query($sql);
      $id = $mysqli->insert_id;
      $_SESSION['id'] = $id;
  		$_SESSION['nombre'] = $name;
  		$arr = array('status' => 'ok');
      header('Content-Type: application/json');
      echo json_encode($arr);
  	}else{
  		$arr = array('status' => 'erroremail');
      header('Content-Type: application/json');
      echo json_encode($arr);
  	}
  }else{
    $arr = array('status' => 'error');
    header('Content-Type: application/json');
    echo json_encode($arr);
  }
?>
