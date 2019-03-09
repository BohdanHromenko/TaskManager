<?php

function get_post_by_id_user()
{
	global $id_user;
	global $pdo;
	$sql = 'SELECT * FROM posts WHERE id_user=:id_user';
	$params = [':id_user' => $id_user];
	$statement = $pdo->prepare($sql);
	$statement->execute($params);
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}

function get_posts()
{
	global $pdo;
	$sql = 'SELECT * FROM posts WHERE id=:id';
	$params = [':id' => $_GET['id']];
	$statement = $pdo->prepare($sql);
	$statement->execute($params);
	$post = $statement->fetch(PDO::FETCH_LAZY);
	return $post;
}

function article_update($data)
{
	global $pdo;

	if ( isset($data['img']) )
	{
		$sql = 'UPDATE posts SET title=:title, description=:description, img=:img WHERE id=:id';
	} else {
		$sql = 'UPDATE posts SET title=:title, description=:description WHERE id=:id';
	}
	$statement = $pdo->prepare($sql);
	$statement->execute($data);
	
}

function article_delete()
{
	global $pdo;
	$sql = 'DELETE FROM posts WHERE id=:id';
	$params = [':id' => $_GET['id']];
	$statement = $pdo->prepare($sql);
	$statement->execute($params);
}

function check($var) 
{
	static $int=0;
	echo '<pre><b style="background: blue;padding: 1px 5px;">'.$int.'</b> ';
	var_dump($var);
	echo '</pre>';
	$int++;
}

function pdoSet($allowed, &$values, $source = array()) 
{
	$set = '';
	$values = array();
	if (!$source) $source = &$_POST;
	foreach ($allowed as $field) {
	if (isset($source[$field])) {
		$set.="`".str_replace("`","``",$field)."`". "=:$field, ";
		$values[$field] = $source[$field];
	}
	}
	return substr($set, 0, -2); 
}

function validateField($fields) 
{
	foreach ( $fields as  $key => $value ) {
		
		if ( empty($value) ){
			$errorMessage = "Enter your $key!";
			include 'errors.php';
			exit;
		}
	}
}

function validatePassword() 
{
	$password = strlen($_POST['password']);
	if ( $password <= 5 ) {
		$errorMessage = "Password must be at least 6 characters!";
		include 'errors.php';
		exit;
	}
}

function validateInput($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>