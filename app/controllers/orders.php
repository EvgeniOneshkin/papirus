<?php

include_once("../../path.php");
include_once("../database/database.php");


$sql = ("SELECT * FROM products, orders;");
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
$productsInfo = $query->fetchAll();


$sqlCount = $pdo->query("SELECT COUNT(1) FROM products");
$count = $sqlCount->fetch(PDO::FETCH_NUM)[0];

$sqlPrice = ("SELECT products.id_product, products.price_product FROM products");
$queryPrice = $pdo->prepare($sqlPrice);
$queryPrice->execute();
dbCheckError($queryPrice);
$infPrice = $queryPrice->fetchAll();

$j = 0;
$arrayPrice = array();
foreach ($infPrice as $key => $infPrices){
	$arrayPrice[$j] = $infPrices['price_product'];
	$j++;
}
$count = $_POST['count'];


$id_product = $count;
$price_product = $arrayPrice[$count - 1];

$error_fields = [];
$quantity = trim($_POST['quantity']);
$id_user = $_SESSION['id_user'];
$description_order = trim($_POST['description_order']);
$delivery = trim($_POST['delivery']);

if(!empty($_FILES['file']['name'])){
	$fileName = $id_user . "_" . time() . "_" . $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$destination = ROOT_PATH . "\assets\img\download\\" . $fileName;
	$result = move_uploaded_file($fileTmpName, $destination);
	if($result){
		$pattern_order = $fileName;
	}
	else{
		$response = [
			"status" => false,
			"message" => "Ошибка загрузки файла на сервер"
		];
		echo json_encode($response);
	}
}
else{
	$pattern_order = '';
}
if($quantity === ''){
	$error_fields[] = "quantity";
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Не все обязательные поля заполнены!",
		"type" => 1,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}
elseif($quantity < 1){
	$error_fields[] = "quantity";
}
if(!empty($error_fields)){
	$response = [
		"status" => false,
		"message" => "Введите корректное значение!",
		"type" => 2,
		"fields" => $error_fields,
	];
	echo json_encode($response);
	die();
}
else{
	if($quantity <= 5){
		$price_order =  $price_product * $quantity;
	}
	elseif($quantity > 5 and  $quantity <= 10){
		$price_order = ($price_product - ($price_product / 100 * 10)) * $quantity;
	}
	elseif($quantity > 10 and  $quantity <= 30){
		$price_order = ($price_product - ($price_product / 100 * 20)) * $quantity;
	}
	elseif($quantity > 30 and  $quantity <= 50){
		$price_order = ($price_product - ($price_product / 100 * 30)) * $quantity;
	}
	elseif($quantity > 50){
		$price_order = ($price_product - ($price_product / 100 * 40)) * $quantity;
	}
	if($price_order < 500 && $delivery != ''){
		$response = [
			"status" => false,
			"message" => "Ошибка! Доставка работает при заказе от 500руб."
		];
		echo json_encode($response);
		return;
	}
	if($delivery === '')
		$delivery = "Самовывоз";
	$existence = selectOne('orders', []);
	$order = [
		'id_product' => $id_product,
		'id_user' => $id_user,
		'quantity' => $quantity,
		'price_order' => $price_order,
		'description_order' => $description_order,
		'delivery' => $delivery,
		'pattern_order' => $pattern_order,
		'id_orderStatus' => '1'
	];
	$id_user = insert('orders', $order);
	$response = [
		"status" => true
	];
	echo json_encode($response);
}
