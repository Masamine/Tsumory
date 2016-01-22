<?php
  require('../conf/config.php');
  require('connectDB.php');
  require('function.php');
  require('load.php');

  date_default_timezone_set('Asia/Tokyo');

  $type = $_POST['type'];

  if($type == 'works') {
    regWorks();
  }

  /* ★案件登録
  ----------------------------------------- */
  function regWorks() {
    
    global $pdo;
    global $type;

    $func = new func();

    $sql   = "INSERT INTO works(client,title,staff,regist,updates) VALUES (:client, :title, :staff, :reg, :rec)";
    $stmt  = $pdo->prepare($sql);
    
    $client     = $_POST["client"];
    $title      = $_POST["works"];
    $staff      = $_POST["staff"];
    $registDate = date("Y-m-d H:i:s");
    $recentDate = date("Y-m-d H:i:s");

    if(!overlap($client)) {
      regClient($client);
    }

    $load = new loadDB();
    $clientData = $load->getClient($client);
    $id = $clientData[0]["id"];

    $stmt->bindValue(':client', $id, PDO::PARAM_INT);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':staff', $staff, PDO::PARAM_STR);
    $stmt->bindValue(':reg', $registDate, PDO::PARAM_STR);
    $stmt->bindValue(':rec', $recentDate, PDO::PARAM_STR);

    $stmt->execute();
    $lastID = $pdo->lastInsertId('id');
    $pdo = null;

    $array = array(
      'id'     => $lastID,
      'type'   => $type,
      'client' => $client,
      'staff'  => $staff,
      'works'  => $title,
      'time'   => $registDate
    );

    header('Content-Type: application/json; charset=utf-8');
    print(json_encode($array));

    return false;

  }

  /* ★クライアント登録
  ----------------------------------------- */
  function regClient($data) {

    global $pdo;
    
    $sql    = "INSERT INTO client(name) VALUES (:client)";
    $stmt   = $pdo->prepare($sql);
    $client = $data;

    if(overlap($client)) {
      $msg = '「'.$client.'」は重複してます。';
    } else {
      $stmt->bindValue(':client', $client, PDO::PARAM_STR);
      $stmt->execute();
      $msg = "登録が完了しました。";
    }
    
    //$pdo = null;

    return $msg;
  }

  /* ★クライアント登録　重複確認
  ----------------------------------------- */
  function overlap($a) {

    $getData = new loadDB();
    $data = $getData->getClient($a);

    $judge = (count($data) > 0) ? true : false;

    return $judge;
  }

?>