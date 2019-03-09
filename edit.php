<?php
  error_reporting(-1);
  require 'db.php';
  require 'func.php';

$row = get_posts();

if (isset($_POST['submit'])) 
{
  $params = array(
  'title' => $_POST['title'],
  'description' => $_POST['description'],
  'id' => $_GET['id']
  );

    if( !empty($_FILES) ){
      move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
    }

    if ( $_FILES['file']['name'] ) 
    {
      $params['img'] = $_FILES['file']['name'];
    }

article_update($params);

header('Location: index.php'); 
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Edit Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Редактировать запись</h1>
        <label for="inputEmail" class="sr-only">Название</label>
        <input type="text" name="title" id="inputEmail" class="form-control" placeholder="Название" required value="<?=$row['title']?>">
        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea name="description" name="description" class="form-control" cols="30" rows="10" placeholder="Описание"><?=$row['description']?></textarea>
        <input type="file" name="file">
        <img src="upload/<?=$row['img']?>" alt="" width="300" class="mb-3">
        <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Редактировать</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
<?php 

 ?>