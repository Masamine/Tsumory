<?php
  /* -----------------------------
  DB読み込み
  ----------------------------- */
  class loadDB {
    
    public function getUser($id) {

      /* -----------------------------
      値を取得
      ----------------------------- */
      require('connectDB.php');
      
      $query = "SELECT user_id,id_name,name,mail,thumb FROM tsury_user WHERE id_name = :user";
      $stmt = $pdo -> prepare($query);

      $userID = "user_id";
      $author = $id;
      $name   = "name";
      $mail   = "mail";
      $thumb  = "thumb";

      $stmt->bindValue(':user', $author, PDO::PARAM_STR);
      
      // 実行
      $stmt->execute();
      
      // 値を取得s
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        
        $array = array(
          "id"     => $row[$userID],
          "author" => $row["id_name"],
          "mail"   => $row[$mail],
          "name"   => $row[$name],
          "thumb"  => $row[$thumb]
        );
        
        return $array;
      }

      $pdo = null;

      return $array;
    }

    /*  案件一覧取得
    ----------------------------------- */
    public function getWorks() {
      require('connectDB.php');
      
      $query = "SELECT * FROM tsury_works";
      $stmt = $pdo->prepare($query);
      $stmt->execute();

      $array = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $array[] = array(
          "id"     => $row['id'],
          "client" => $row['client'],
          "title"  => $row['title'],
          "staff"  => $row['staff'],
          "regist" => $row['regist'],
          "update" => $row['updates']
        );
      }
      $pdo = null;

      return $array;
    }

    /*  クライアント取得
    ----------------------------------- */
    public function getClient($name) {

      require('connectDB.php');

      if(isset($name)) {
        $query = (is_string($name)) ? "SELECT * FROM tsury_client WHERE name = :name" : "SELECT * FROM tsury_client WHERE id = :name";
      } else {
        $query = "SELECT * FROM tsury_client";
      }
      
      $stmt = $pdo->prepare($query);

      if(isset($name)) $stmt->bindValue(':name', $name, PDO::PARAM_STR);

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

    /*  チーム取得
    ----------------------------------- */
    public function getTeam() {

      require('connectDB.php');
      
      $query = "SELECT * FROM team";
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
