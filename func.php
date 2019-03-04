<?php

function get_post_by_id_user()
{
	global $id_user;
	global $pdo;
	$sql = 'SELECT * FROM posts WHERE id_user=:id_user';
	$params = [':id_user' => $id_user];
	$statement = $pdo->prepare($sql);
	$statement->execute($params);
	$posts = $statement->fetchAll();
	return $posts;
}

function get_posts()
{
	global $pdo;
	$sql = 'SELECT * FROM posts WHERE id=:id';
	$params = [':id' => $_GET['id']];
	$statement = $pdo->prepare($sql);
	$statement->execute($params);
	$post = $statement->fetch();
	return $post;
}

function article_update($data)
{
	global $pdo;
	$sql = 'UPDATE posts SET title=:title, description=:description, img=:img WHERE id=:id';
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
?>