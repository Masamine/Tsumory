<?php
  /* -----------------------------
  DB読み込み
  ----------------------------- */
  class loadDB {
    
    public function getUser($id) {

      /* -----------------------------
      値を取得
      ----------------------------- */
      require_once('connectDB.php');
      
      // クエリ分を発行。
      $query = "SELECT user_id,user_user,user_name,user_thumb FROM tsury_user WHERE user_user = :user";
      $stmt = $pdo -> prepare($query);

      $userID = "user_id";
      $author = $id;
      $name   = "user_name";
      $thumb  = "user_thumb";

      $stmt->bindValue(':user', $author, PDO::PARAM_STR);
      
      // 実行
      $stmt->execute();
      
      // 値を取得
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        
        $array = array(
          "id"     => $row[$userID],
          "author" => $row[$author],
          "name"   => $row[$name],
          "thumb"  => $row[$thumb]
        );
        
        return $array;
      }

      $pdo = null;

      return false;
    }

    /*  クライアント取得
    ----------------------------------- */
    public function getClient() {

      require('connectDB.php');
      
      // クエリ分を発行。
      $query = "SELECT * FROM tsury_client";
      $stmt = $pdo->prepare($query);
      $stmt->execute();

      $array = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $array[] = array(
          "id"   => $row['id'],
          "name" => $row['name']
        );
      }

      $pdo = null;
      

      return $array;
    }
    
  }

?>
