<?php
error_reporting(-1);
require 'db.php';
// Получение данных из $_POST и создание массива
$array = array(
'email' => $_POST['email'],
'password' => md5($_POST['password']) // Password hash
);

// Проверка на пустоту полей ввода
if ( $array['email'] == '' )
{
	$errorMessage = 'Enter your email!';
	include 'errors.php';
	exit;
} elseif ( $_POST['password'] == '' )
{
	$errorMessage = 'Enter your password';
	include 'errors.php';
	exit;
} 

// Делаем запрос в БД чтобы узнать если такой email
$sql = 'SELECT id FROM users WHERE email=:email';
$statement = $pdo->prepare($sql);
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

		header('Location: /index.php');
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