<?php
include_once("../database/database.php");

$admin = 0;
$login = trim($_POST['login']);
$email = trim($_POST['email']);
$passFirst = trim($_POST['passFirst']);
$passSecond = trim($_POST['passSecond']);
$chboxInf = trim($_POST['chboxInf']);

$error_fields = [];

if($login === ''){
	$error_fields[] = 'login';
}
if($email === ''){
	$error_fields[] = 'emailReg';
}
if($passFirst === ''){
	$error_fields[] = 'passFirst';
}
if($passSecond === ''){
	$error_fields[] = 'passSecond';
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Не все поля заполнены!",
		"type" => 1,
		"fieldsReg" => $error_fields,
	];
	echo json_encode($response);
	die();
}

else if($chboxInf === 'Не выбран'){
	$response = [
		"status" => false,
		"message" => "Для успешной регистрации необходимо принять пользовательское соглашение!"
	];
	echo json_encode($response);
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$response = [
		"status" => false,
		"message" => "Введите корректный email!"
	];
	echo json_encode($response);
}
elseif(mb_strlen($login, 'UTF8') < 2){
	$response = [
		"status" => false,
		"message" => "Ваш логин должен быть не менее двух символов!"
	];
	echo json_encode($response);
}
elseif(mb_strlen($passFirst, 'UTF8') < 6){
	$response = [
		"status" => false,
		"message" => "Ваш пароль должен быть не менее шести символов!"
	];
	echo json_encode($response);
}
elseif($passFirst !== $passSecond){
	$response = [
		"status" => false,
		"message" => "Пароли не совпадают!"
	];
	echo json_encode($response);
}

else{
	$existence = selectOne('users', ['email' => $email]);
	if(!empty($existence['email']) && $existence['email'] === $email){
		$response = [
			"status" => false,
			"message" => "Пользователь с такой почтой уже зарегистрирован!"
		];
		echo json_encode($response);
	}
	else{
		$pass = password_hash($passFirst, PASSWORD_DEFAULT);
		$post = [
			'admin' => $admin,
			'username' => $login,
			'email' => $email,
			'password' => $pass
		];
		$id_user = insert('users', $post);
		$user = selectOne('users', ['id_user' => $id_user]);
		$_SESSION['id_user'] = $user['id_user'];
		$_SESSION['login'] = $user['username'];
		$_SESSION['admin'] = $user['admin'];
		$response = [
			"status" => true
		];
		echo json_encode($response);
	}
}