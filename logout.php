<?php
require 'db.php';
session_destroy();
header('Location: index.php');
setcookie('user', '', time()-7000000, '');
?>