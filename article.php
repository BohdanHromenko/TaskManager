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

    <title><?=$post['title']?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>

<header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О проекте</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white"><?=$_SESSION['name'];?></h4>
              <ul class="list-unstyled">
                <li><a href="logout.php" class="text-white">Выйти</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="index.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Tasks</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>


<div class="container">
<div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?=$post['title']?></h1>

      

        


        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="upload/<?=$post['img']?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
          
      <?=$post['description']?>
        </p>

        <hr>
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
      </div>





    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

   <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Наверх</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>

<!--     <div class="form-wrapper text-center">
  <img src="upload/<?=$post['img']?>" alt="" width="400">
  <h2><?=$post['title']?></h2>
  <p>
    <?=$post['description']?>
  </p>
  <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
</div> -->
  </body>
</html>
