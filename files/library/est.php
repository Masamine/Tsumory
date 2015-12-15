<?php
  require('../conf/config.php');
  require('connectDB.php');

  getUnit();

  //データ呼び出し
  function getUnit() {
    
    global $pdo;

    $mode = $_POST['mode'];
    $id   = $_POST['id'];
    $code = $_POST['code'];
    $func = $_POST['func'];

    $query = ($func == 'unit') ? "SELECT * FROM unit WHERE code = :code" : "SELECT * FROM detail WHERE post_id = :id";
    $stmt = $pdo->prepare($query);

    if( $func == 'unit' ) {
      $stmt->bindValue(':code', $code, PDO::PARAM_STR);
    } else {
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    }

    $stmt->execute();

    $array = array();

    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $array[] = array(
        "id"      => $row["id"],
        "code"    => $row["code"],
        "content" => $row["content"],
        "cost"    => $row["cost"],
        "sales"   => $row["sales"],
        "profit"  => num2per($row["cost"], $row["sales"], 1)
      );
    }
    $pdo = null;
    
    header('Content-Type: application/json; charset=utf-8');
    print(json_encode($array));
    
    return false;
  }

  //利益率計算
  function num2per($cost, $sales, $precision = 0){
    try {
      $percent = (($sales - $cost) / $sales) * 100; 
      return round($percent, $precision);
    } catch (Exception $e) {
      return 0;
    }
  }

  exit;

?>