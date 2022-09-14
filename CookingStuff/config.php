<?php
$hostname = "http://localhost/cooking";
  define('ROOT_URL','');

$host = "ec2-34-200-72-77.compute-1.amazonaws.com";
$user = "fycisfrabxvnmd";
$password = "775c12fd18baed629463dd516079a49cd430076dc853e757a76cd6c735937c92";
$dbname = "d7c52o1qtlnun";
$port = "5432";

try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
?>
