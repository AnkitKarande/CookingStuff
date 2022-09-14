<?php
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['title'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "category.php":
      if(isset($_GET['cid'])){
        $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['category_name'] . " News";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "author.php":
      if(isset($_GET['aid'])){
        $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = "News By " .$row_title['first_name'] . " " . $row_title['last_name'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "search.php":
      if(isset($_GET['search'])){

        $page_title = $_GET['search'];
      }else{
        $page_title = "No Search Result Found";
      }
      break;
    default :
      $sql_title = "SELECT websitename FROM settings";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = $row_title['websitename'];
      break;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Cooking</title>
</head>

<body data-spy="scroll" data-target="#main-nav" id="home">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
    <div class="container">
      <a href="index.php" class="navbar-brand">Cooking</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php
          include "config.php";

          if(isset($_GET['cid'])){
            $cat_id = $_GET['cid'];
          }

          $sql = "SELECT * FROM category WHERE post > 0";
          $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
          if(mysqli_num_rows($result) > 0){
            $active = "";
        ?>
        <ul class="navbar-nav ml-auto">
          <?php while($row = mysqli_fetch_assoc($result)) {
            if(isset($_GET['cid'])){
              if($row['category_id'] == $cat_id){
                $active = "active";
              }else{
                $active = "";
              }
            }
            echo "<li class='nav-item'><a class='{$active} nav-link' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
          } ?>
        </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
<!--   Main Content -->