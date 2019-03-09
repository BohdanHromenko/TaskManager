<?php
error_reporting(-1);
require 'db.php';
require 'func.php';

// Array with data from registration form
$data = array(
'name' => validateInput($_POST['name']),
'email' => validateInput($_POST['email']),
'password' => validateInput($_POST['password'])
);

// Form validation for emptiness
validateField($data);

// Password length check
validatePassword();

// Hash password
$data['password'] = md5($_POST['password']);

// Checking the existence of email in the database
$sql = 'SELECT id FROM users WHERE email=:email';
$statement = $pdo->prepare($sql);
$statement->execute([':email' => $data['email']]);
$user = $statement->fetchColumn();
if ( $user ) {
	$errorMessage = 'A user with this email already exists';
	include 'errors.php';
	exit;
}

// Insert data into the database and check for success
$allowed = array("name","email","password");
$sql = "INSERT INTO users SET ".pdoSet($allowed,$array,$data);
$statement = $pdo->prepare($sql);
$result = $statement->execute($data);

if ( !$result ) {
	$errorMessage = 'Could not register!';
	include 'errors.php';
	exit;
}

header('Location: /login-form.php'); exit;

?>