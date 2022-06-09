<?php
include_once("../database/database.php");

$oldPass = trim($_POST['oldPass']);
$newPass1 = trim($_POST['newPass1']);
$newPass2 = trim($_POST['newPass2']);
$error_fields = [];
$existence1 = selectOne('users', ['id_user' => $_SESSION['id_user']]);


if($newPass1 === ''){
	$error_fields[] = 'newPass1';
}
if($newPass2 === ''){
	$error_fields[] = 'newPass2';
}
if($oldPass === ''){
	$error_fields[] = 'oldPass';
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Введите корректные данные!",
		"type" => 1,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}

if($existence1 && password_verify($oldPass, $existence1['password'])){
		if($newPass1 !== $newPass2){
			$error_fields[] = 'newPass1';
			$error_fields[] = 'newPass2';
		}
		if(!empty($error_fields)){
			$response = [
				"status" => false,
				"message" => "Пароли не совпадают!",
				"type" => 2,
				"fields" => $error_fields,
			];
			echo json_encode($response);
			die();
		}
		else if(mb_strlen($newPass1, 'UTF8') < 6){
			$error_fields[] = 'newPass1';
			$error_fields[] = 'newPass2';
		}
		if(!empty($error_fields)){
			$response = [
				"status" => false,
				"message" => "Ваш пароль должен быть не менее шести символов!",
				"type" => 2,
				"fields" => $error_fields,
			];
			echo json_encode($response);
			die();
		}
		else{
			$newPass = password_hash($newPass1, PASSWORD_DEFAULT);
			update('users', $_SESSION['id_user'], ['password' => $newPass]);
			$response = ["status" => true];
			echo json_encode($response);
		}
}
else{
	$error_fields[] = 'oldPass';
	if(!empty($error_fields)){
		$response = [
			"status" => false,
			"message" => "Неверный пароль!",
			"type" => 2,
			"fields" => $error_fields,
		];
		echo json_encode($response);
		die();
	}
}
