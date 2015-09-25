<?php
  /* -----------------------------
  DB登録
  ----------------------------- */
  
  class postData {
    
    /* ★ユーザー登録
    ----------------------------------------- */
    function regUser() {
      
      require_once('connectDB.php');
      $func = new func();

      $sql   = "INSERT INTO tsury_user(user_user,user_pass,user_name,user_mail,user_thumb) VALUES (:user,:pass,:name,:mail,:thumb)";
      $stmt  = $pdo->prepare($sql);
      $salt  = "mwefCMEP28DjwdW3lwdS239vVS";
      $thumb = $_FILES["thumb"];
      
      if (is_uploaded_file($thumb["tmp_name"])) {
        if (move_uploaded_file($thumb["tmp_name"], "files/uploads/" . $thumb["name"])) {
          chmod("files/uploads/" . $thumb["name"], 0644);
        }
      }
      
      $user_user  = $_POST["reguser"];
      $user_pass  = $func->passhash($_POST["regpass"]);
      $user_name  = $_POST["regname"];
      $user_mail  = $_POST["regmail"];
      $user_thumb = ($thumb["name"]) ? $thumb["name"] : "img_noimg.jpg";
      
      $stmt->bindValue(':user', $user_user, PDO::PARAM_STR);
      $stmt->bindValue(':pass', $user_pass, PDO::PARAM_STR);
      $stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
      $stmt->bindValue(':mail', $user_mail, PDO::PARAM_STR);
      $stmt->bindValue(':thumb', $user_thumb, PDO::PARAM_STR);
      
      $stmt->execute();
      
      $pdo = null;
    }
    
    /* ★案件登録
    ----------------------------------------- */
    function regWorks() {

      require_once('connectDB.php');
      $func = new func();

      $sql   = "INSERT INTO tsury_works(client_id,title,client_staff,regist_date,recent_date) VALUES (?,?,?,?,?)";
      $stmt  = $pdo->prepare($sql);
      
      $clientID    = $_POST["client"];
      $title       = $_POST["works"];
      $clientStaff = $_POST["client_staff"];
      $registDate  = date("Y-m-d H:i:s");
      $recentDate  = date("Y-m-d H:i:s");

      $stmt->bind_param('sssss', $clientID, $title, $clientStaff, $registDate, $recentDate);

      $stmt->execute();
      $stmt->close();
      $mysqli->close();

      return false;
    }

    /* ★クライアント登録
    ----------------------------------------- */
    function regClient() {
      require('connectDB.php');
      
      $sql   = "INSERT INTO tsury_client(name) VALUES (:client)";
      $stmt  = $pdo->prepare($sql);
      $client = $_POST["regClient"];

      if($this->overlap($client)) {
        $msg = '「'.$client.'」は重複してます。';
      } else {
        $stmt->bindValue(':client', $client, PDO::PARAM_STR);
        $stmt->execute();
        $msg = "登録が完了しました。";
      }
      
      $pdo = null;

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