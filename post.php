<?php
error_reporting(-1);
require 'db.php';
require 'func.php';

$path = 'upload';
$extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
$filename = getRandomFileName($path, $extension);
$filename = $filename . '.' . $extension;
$target = $path . '/' . $filename;

if( !empty($_FILES) ){
	move_uploaded_file($_FILES['file']['tmp_name'], $target);
}

// Array with data from create form
$data = array(
'title' => $_POST['title'],
'description' => $_POST['description'],
'id_user' => $_SESSION['id_user'],
'img' => $filename
);

// Form validation for emptiness
validateField($data);



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



$path = 'upload';

$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

$filename = getRandomFileName($path, $extension);
$target = $path . '' . $filename . '.' . $extension;
if( !empty($_FILES) ){
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
?>