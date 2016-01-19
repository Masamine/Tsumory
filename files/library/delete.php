<?php
  require('../conf/config.php');
  require('connectDB.php');
  require('load.php');

  date_default_timezone_set('Asia/Tokyo');
  
  $table = $_POST['table'];
  $id    = $_POST['id'];

  $query = "DELETE FROM ".$table." where id = :id";
  $stmt = $pdo->prepare($query);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  $stmt->execute();

  $pdo = null;
  
  header('Content-Type: application/json; charset=utf-8');
  print(json_encode('OK'));
  
  return false;

  exit;

?>