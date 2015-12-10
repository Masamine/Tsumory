<?php
  require('../conf/config.php');
  require('connectDB.php');

  $query = "SELECT * FROM unit WHERE code = :code";
  $stmt = $pdo->prepare($query);

  $stmt->bindValue(':code', $_POST['request'], PDO::PARAM_STR);

  $stmt->execute();

  $array = array();

  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $array[] = array(
      "id"     => $row["id"],
      "code" => $row["code"],
      "content"  => $row["content"],
      "cost"  => $row["cost"],
      "sales" => $row["sales"]
    );
  }

  $pdo = null;

  header('Content-Type: application/json; charset=utf-8');
  print(json_encode($array));
  exit;