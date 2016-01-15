<?php
  require('../conf/config.php');
  require('connectDB.php');
  require('load.php');

  date_default_timezone_set('Asia/Tokyo');

  $type = $_POST['type'];

  if($type == 'loadUnit') {
    getUnit();
  } else if($type == 'matters' || $type == 'update') {
    registMatters($type);
  } else if($type == 'edit'){
    getEst();
  }

  /* =========================================
  見積りデータ呼び出し
  ========================================= */
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

    return false;
  }


  /* =========================================
  要件登録
  ========================================= */
  function registMatters($type) {

    global $pdo;
    $isRegist = ($type == 'matter');
    $load   = new loadDB();
    $user   = $load -> getUser($_COOKIE["user"], true);
    $userID = $user['id'];

    $pid     = $isRegist ? $_POST['pid'] : $_POST['pid'];
    $title   = $_POST['title'];
    $total   = $_POST['total'];
    $team    = serialize($_POST['team']);
    $detail  = $_POST['detail'];
    $regTime = date("Y-m-d H:i:s");

    //$typeが「matters」か「update」かでQueryを分岐させる
    $query  = $isRegist ? "INSERT INTO posts(works_id,post_name,team, total, regist_date, author, modified, details) VALUES (:id,:name,:team,:total,:regTime,:author,:modified,:details)" : "UPDATE posts(post_name,team, total, regist_date, author, modified, details) SET (:id,:name,:team,:total,:regTime,:author,:modified,:details) WHERE id = :id";

    $query2 = "UPDATE works SET updates = :updates WHERE id = :id";

    $stmt   = $pdo->prepare($query);
    $stmt2  = $pdo->prepare($query2);

    $stmt->bindValue(':id', $pid, PDO::PARAM_INT);
    $stmt->bindValue(':name', $title, PDO::PARAM_STR);
    $stmt->bindValue(':team', $team, PDO::PARAM_STR);
    $stmt->bindValue(':total', $total, PDO::PARAM_INT);
    $stmt->bindValue(':regTime', $regTime, PDO::PARAM_STR);
    $stmt->bindValue(':author', $userID, PDO::PARAM_INT);
    $stmt->bindValue(':modified', $userID, PDO::PARAM_INT);

    $num = count($detail);
    $arr = array();

    for($i = 0; $i < $num; $i++) {
      array_unshift($detail[$i], $lastID);
    }

    $stmt->bindValue(':details', serialize($detail), PDO::PARAM_STR);

    $stmt2->bindValue(':updates', $regTime, PDO::PARAM_STR);
    $stmt2->bindValue(':id', $pid, PDO::PARAM_INT);

    $stmt->execute();
    $lastID = $pdo->lastInsertId('id');

    $stmt2->execute();

    header('Content-Type: application/json; charset=utf-8');
    print(json_encode( $detail ));

    $pdo = null;

    return false;
  }

  /* =========================================
  見積り登録
  ========================================= */
  function registEst($id, $data) {

    global $pdo;

    $contents    = '';
    
    //insert into goods(id, name) values(5, '本棚'), (6, 'ゴミ箱'); で一括登録

    $sql  = 'INSERT INTO detail (post_id, code, content, count, unit, cost, sales, price) values';
    $sql .= implode(",", $data);
    $stmt   = $pdo->prepare($sql);
    $stmt->execute();

    // header('Content-Type: application/json; charset=utf-8');
    // print(json_encode('OK!'));

    $pdo = null;

    return true;
  }

  /* =========================================
  見積り呼び出し
  ========================================= */
  function getEst() {

    global $pdo;

    $query = "SELECT * FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_POST['postID'], PDO::PARAM_INT);
    $stmt->execute();

    $array = array();

    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $array[] = array(
        "title"  => $row["post_name"],
        "team"   => unserialize($row["team"]),
        "total"  => $row["total"],
        "detail" => unserialize($row["details"])
      );
    }
    
    header('Content-Type: application/json; charset=utf-8');
    print(json_encode($array));

    $pdo = null;

    return false;
  }

  exit;

?>