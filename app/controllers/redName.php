<?php
include_once("../database/database.php");

$redName = trim($_POST['redName']);
$error_fields = [];
if($redName === ''){
	$error_fields[] = 'redName';
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Введите корректное имя!",
		"type" => 1,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}
else{
	if(mb_strlen($redName, 'UTF8') < 2){
		$error_fields[] = 'redName';
		if(!empty($error_fields)){
			$response = [
				"status" => false,
				"message" => "Ваш логин должен быть не менее двух символов!",
				"type" => 2,
				"fields" => $error_fields,
			];
			echo json_encode($response);
			die();
		}
	}
	else{
		update('users', $_SESSION['id_user'], ['username' => $redName]);
		$response = ["status" => true];
		echo json_encode($response);
	}
}
