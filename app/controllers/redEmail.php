<?php
include_once("../database/database.php");

$redEmail = trim($_POST['redEmail']);
$error_fields = [];
if($redEmail === '' or (!filter_var($redEmail, FILTER_VALIDATE_EMAIL))){
	$error_fields[] = 'redEmail';
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Введите корректный email!",
		"type" => 1,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}
else{
	$existence = selectOne('users', ['email' => $redEmail]);
	if(!empty($existence['email']) && $existence['email'] === $redEmail){
		$error_fields[] = 'redEmail';
		if(!empty($error_fields)){
			$response = [
				"status" => false,
				"message" => "Пользователь с такой почтой уже зарегистрирован!",
				"type" => 2,
				"fields" => $error_fields,
			];
			echo json_encode($response);
			die();
		}
	}
	else{
		update('users', $_SESSION['id_user'], ['email' => $redEmail]);
		$response = ["status" => true];
		echo json_encode($response);
	}
}
