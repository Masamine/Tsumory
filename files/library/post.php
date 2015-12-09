<?php
  /* -----------------------------
  DB登録
  ----------------------------- */
  
  class postData {

    /* ★初期設定
    ----------------------------------------- */
    function __construct() {
      date_default_timezone_set('Asia/Tokyo');
    }
    
    /* ★ユーザー登録
    ----------------------------------------- */
    function regUser($update) {
      
      require_once('connectDB.php');
      $func = new func();

      $id_name  = ($update) ? $_COOKIE["user"] : $_POST["reguser"];

      if(!$update) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id_name = :user");
        $stmt->bindValue(':user', $id_name, PDO::PARAM_STR);
        $stmt->execute();
        $count = count($stmt->fetchAll());
        if($count > 1){
          return '重複しています。';
        }
      }

      if($update) {
        $sql = "UPDATE users SET pass = :pass, name = :name, mail = :mail, thumb = :thumb WHERE id_name = :user";
      } else {
        $sql = "INSERT INTO users(id_name,pass,name,mail,thumb) VALUES (:user,:pass,:name,:mail,:thumb)";
      }
      $stmt  = $pdo->prepare($sql);
      $salt  = "mwefCMEP28DjwdW3lwdS239vVS";
      $thumb = $_FILES["thumb"];
      
      if (is_uploaded_file($thumb["tmp_name"])) {
        if (move_uploaded_file($thumb["tmp_name"], "files/uploads/" . $thumb["name"])) {
          chmod("files/uploads/" . $thumb["name"], 0644);
        }
      }

      $pass  = $func->passhash($_POST["regpass"]);
      $name  = $_POST["regname"];
      $mail  = $_POST["regmail"];
      $thumb = ($thumb["name"]) ? $thumb["name"] : "img_noimg.jpg";
      
      $stmt->bindValue(':user', $id_name, PDO::PARAM_STR);
      $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
      $stmt->bindValue(':thumb', $thumb, PDO::PARAM_STR);
      
      $stmt->execute();
      
      $pdo = null;

      return false;
    }
    
    /* ★案件登録
    ----------------------------------------- */
    function regWorks() {

      require_once('connectDB.php');
      $func = new func();

      $sql   = "INSERT INTO works(client,title,staff,regist,updates) VALUES (:client, :title, :staff, :reg, :rec)";
      $stmt  = $pdo->prepare($sql);
      
      $client     = $_POST["client"];
      $title      = $_POST["works"];
      $staff      = $_POST["staff"];
      $registDate = date("Y-m-d H:i:s");
      $recentDate = date("Y-m-d H:i:s");

      if(!$this->overlap($client)) {
        $this->regClient($client);
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
      $pdo = null;

      return false;

    }

    /* ★単価登録
    ----------------------------------------- */
    function regUnit() {

      require_once('connectDB.php');
      $func = new func();

      $sql   = "INSERT INTO unit(code,content,cost,sales) VALUES (:code, :content, :cost, :sales)";
      $stmt  = $pdo->prepare($sql);
      
      $code    = $_POST["code"];
      $content = $_POST["content"];
      $cost    = $_POST["cost"];
      $sales   = $_POST["sales"];

      $stmt->bindValue(':code', $code, PDO::PARAM_STR);
      $stmt->bindValue(':content', $content, PDO::PARAM_STR);
      $stmt->bindValue(':cost', $cost, PDO::PARAM_INT);
      $stmt->bindValue(':sales', $sales, PDO::PARAM_INT);

      $stmt->execute();
      $pdo = null;

      return false;

    }

    /* ★クライアント登録
    ----------------------------------------- */
    function regClient($data) {
      require('connectDB.php');
      
      $sql   = "INSERT INTO client(name) VALUES (:client)";
      $stmt  = $pdo->prepare($sql);
      $client = (isset($data)) ? $data : $_POST["regClient"];

      if($this->overlap($client)) {
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
  }
?>