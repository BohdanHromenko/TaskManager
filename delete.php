<?php
error_reporting(-1);
require 'db.php';
require 'func.php';

article_delete();
header('Location: index.php');
?>