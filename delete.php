<?php
error_reporting(-1);
require 'db.php';
require 'func.php';
if (isset($_GET['id']))
{
	$row = get_posts();
	$filename = "./upload/".$row['img'];
	article_delete();
	deleteFile($filename);
}

header('Location: index.php');

?>
