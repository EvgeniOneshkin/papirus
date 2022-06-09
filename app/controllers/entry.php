<?php
include_once("../database/database.php");



$email = trim($_POST['emailEnt']);
$password = trim($_POST['password']);
$error_fields = [];
if($email === ''){
	$error_fields[] = 'emailEnt';
}
if($password === ''){
	$error_fields[] = 'password';
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Не все поля заполнены!",
		"type" => 1,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}
else{
	$existence = selectOne('users', ['email' => $email]);
	if($existence && password_verify($password, $existence['password'])){
		$_SESSION['id_user'] = $existence['id_user'];
		$_SESSION['login'] = $existence['username'];
		$_SESSION['admin'] = $existence['admin'];
		$response = [
			"status" => true
		];
		echo json_encode($response);
	}
	else{
		$response = [
			"status" => false,
			"message" => "Неверно введен логин или пароль!"
		];
		echo json_encode($response);
	}
}