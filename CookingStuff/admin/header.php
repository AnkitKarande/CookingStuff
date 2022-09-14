<?php
  include "config.php";
  session_start();

  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN Panel</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
<body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
    <div class="container">
      <a href="index.php" class="navbar-brand col-md-2">Cooking</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto mr-auto col-md-6">
          <li class="nav-item">
            <a href="post.php" class="nav-link">POST</a>
          </li>
          <?php
            if($_SESSION["user_role"] == '1'){
          ?>
          <li class="nav-item">
            <a href="category.php" class="nav-link">CATEGOREY</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">USER</a>
          </li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link">SETTING</a>
          </li>
          <?php
            }
          ?>
        </ul>
        <div class="col-md-offset-2  col-md-1">
            <a href="logout.php" class="admin-logout" >logout</a>
        </div>
      </div>
    </div>
  </nav>