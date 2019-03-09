<?php
error_reporting(-1);
require 'db.php';
require 'func.php';
// Получение данных из $_POST и создание массива
$array = array(
'email' => $_POST['email'],
'password' => $_POST['password'] // Password hash
);

validateField($array);

// Hash password
$array['password'] = md5($_POST['password']);


// Делаем запрос в БД чтобы узнать если такой email

$query = 'SELECT * FROM users WHERE email=:email';
$statement = $pdo->prepare($query);
$statement->execute([':email' => $array['email']]);
$user = $statement->fetchColumn();




if ( $user ) {
	// Если есть id с таким email
	$query = 'SELECT name FROM users WHERE email=:email AND password=:password';
	$params = [':email' => $array['email'], ':password' => $array['password']];
	$statement = $pdo->prepare($query);
	$statement->execute($params);
	$name = $statement->fetchColumn();
	$result = $statement->execute($array);

	if ( $result && $name)
	{
		$_SESSION['name'] = $name;
		$_SESSION['id_user'] = $user;

		if (isset($_REQUEST['remember'])) {
		setcookie('user', $array['password'], strtotime('+30 days'), '');	
}
	header('Location: index.php');
	} else {
		$errorMessage = 'Имя пользователя или пароль введены не правильно';
		include 'errors.php';
		exit;
	}
	} else {
		$errorMessage = 'Пользователь с таким email не существует!';
		include 'errors.php';
		exit;
	}

?>