<?php
error_reporting(-1);
require 'db.php';
require 'func.php';

// Array with data from create form
$data = array(
'title' => $_POST['title'],
'description' => $_POST['description'],
'id_user' => $_SESSION['id_user'],
'img' => $_FILES['file']['name']
);

// Form validation for emptiness
validateField($data);

if( !empty($_FILES) ){
	move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
}

// Insert data into the database and check for success
$allowed = array("title", "description", "id_user", "img");
$sql = "INSERT INTO posts SET ".pdoSet($allowed,$values,$data);
$statement = $pdo->prepare($sql);
$result = $statement->execute($data);

if ( !$result ) {
	$errorMessage = 'Не удалось создать задачу';
	include 'errors.php';
	exit;
} else {
	header('Location: index.php'); 
	exit;
}

?>