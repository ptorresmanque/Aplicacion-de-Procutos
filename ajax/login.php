<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
	require '../config/db.php';
	session_start();

	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$hashpassword = hash('sha256', $pass);
	$result = $mysqli->query("SELECT * FROM usuario where email = '$user' and password = '$hashpassword'");

	if($result->num_rows > 0){
		$row = $result->fetch_array(MYSQLI_BOTH);
		$_SESSION['id'] = $row['id'];
		$_SESSION['nombre'] = $row['nombre'];
		$arr = array('status' => 'ok');
    header('Content-Type: application/json');
    echo json_encode($arr);
	}else{
		$arr = array('status' => 'error');
    header('Content-Type: application/json');
    echo json_encode($arr);
	}
}else{
	$arr = array('status' => 'error');
	header('Content-Type: application/json');
	echo json_encode($arr);
}

?>
