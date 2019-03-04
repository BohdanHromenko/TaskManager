<?php
error_reporting(-1);
require 'db.php';

// Получение данных из $_POST и создание массива
$array = array(
'name' => $_POST['name'],
'email' => $_POST['email'],
'password' => md5($_POST['password']) // Password hash
);

// Проверка на пустоту полей ввода
if ( $array['name'] == '' )
{
	$errorMessage = 'Enter your name!';
	include 'errors.php';
} elseif ($array['email'] == '' )
{
	$errorMessage = 'Enter your email!';
	include 'errors.php';
} elseif ($_POST['password'] == '' )
{
	$errorMessage = 'Enter your password';
	include 'errors.php';
}

// Подготовка и выполнение запроса к БД

$sql = 'SELECT id FROM users WHERE email=:email';
$statement = $pdo->prepare($sql);
$statement->execute([':email' => $array['email']]);
$user = $statement->fetchColumn();
if ( $user ) {
	$errorMessage = 'Пользователь с таким email уже существует';
	include 'errors.php';
	exit;
}
// Подготовка sql для вставки новой записи
$sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
$statement = $pdo->prepare($sql);

$result = $statement->execute($array);
if ( !$result ) {
	$errorMessage = 'Не удалось зарегестрироватся!';
	include 'errors.php';
	exit;
}

header('Location: /login-form.php'); exit;

?>