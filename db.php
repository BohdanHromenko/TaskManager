<?php




$pdo = new PDO('mysql:host=localhost;dbname=task_manager', 'root', '');


session_start();




if(!isset($_SESSION['name']))    {
	header('Location: login-form.php');
} else {
	$nm = $_SESSION['name'];
	$id_user = $_SESSION['id_user'];
}



/*$servername = "localhost";
$username = "root";
$password = "";
$db = "task_manager";

$connection = mysqli_connect($servername, $username, $password, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
*/
?>