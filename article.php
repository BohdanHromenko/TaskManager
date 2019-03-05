<?php
error_reporting(-1);
require 'db.php';
require 'func.php';

$post = get_posts();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Show</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <img src="upload/<?=$post['img']?>" alt="" width="400">
      <h2><?=$post['title']?></h2>
      <p>
        <?=$post['description']?>
      </p>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
    </div>
  </body>
</html>
