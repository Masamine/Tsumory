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
      
      // 変数に値を代入
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
      
      // プリペアドステートメントを実行
      $stmt->execute();
      
      $pdo = null;
    }
    
    /* ★案件登録
    ----------------------------------------- */
    function regWorks() {

      require_once('connectDB.php');
      $func = new func();

      $sql   = "INSERT INTO tsury_works(client_id,title,client_staff,regist_date,recent_date) VALUES (?,?,?,?,?)";
      $stmt  = $mysqli->prepare($sql);
      
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
      require_once('connectDB.php');
      
      $sql   = "INSERT INTO tsury_client(client_name) VALUES (?)";
      $stmt  = $mysqli->prepare($sql);

      // 変数に値を代入
      $client = $_POST["regClient"];
      
      $stmt->bind_param('s',$client);
      $stmt->execute();
      $stmt->close();
      $mysqli->close();
    }
  }
?>