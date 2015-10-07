<?php
  /* -----------------------------
  ログイン処理
  ----------------------------- */
  // ログインボタンが押された場合
  if (isset($_POST["loginbtn"])) {

    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    require_once('connectDB.php');

    $status = "none";
    $func = new func();

    //セッションにセットされていたらログイン済み
    if(isset($_SESSION["username"])) $status = "logged_in";
    
    else if(!empty($user) && !empty($pass)){

      //ユーザ名、パスワードが一致する行を探す
      $password = $func->passhash($pass);
      $stmt = $pdo->prepare("SELECT * FROM tsury_user WHERE id_name = :user AND pass = :pass");

      $stmt->bindValue(':user', $user, PDO::PARAM_STR);
      $stmt->bindValue(':pass', $password, PDO::PARAM_STR);

      $stmt->execute();

      $count = count($stmt->fetchAll());

      if($count == 1){
        $status = "ok";
        $_SESSION["username"] = $user;
        setcookie("user", $user);
        header('location: home.php');
        exit();
      } else {
        $status = "failed";
      }
    }
  }
?>