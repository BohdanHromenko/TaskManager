<?php
error_reporting(-1);
require 'db.php';

// Получение данных из $_POST и создание массива
$array = array(
'title' => $_POST['title'],
'description' => $_POST['description'],
'id_user' => $_SESSION['id_user'],
'img' => $_FILES['file']['name']
);
// Проверка на пустоту полей ввода
if ( $array['title'] == '' )
{
	$errorMessage = 'Enter your title!';
	include 'errors.php';
} elseif ($array['description'] == '' )
{
	$errorMessage = 'Enter your description!';
	include 'errors.php';
}

if( !empty($_FILES) ){
	move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
}

$sql = 'INSERT INTO posts (title, description, id_user, img) VALUES (:title, :description, :id_user, :img)';
$statement = $pdo->prepare($sql);

$result = $statement->execute($array);
if ( !$result ) {
	$errorMessage = 'Не удалось создать задачу';
	include 'errors.php';
	exit;
} else {
	header('Location: index.php'); 
	exit;
}

?>