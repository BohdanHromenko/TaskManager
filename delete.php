<?php
error_reporting(-1);
require 'db.php';
require 'func.php';
if (isset($_GET['id']))
{
	article_delete();
}
header('Location: index.php');
?>