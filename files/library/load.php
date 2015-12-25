<?php
  /* -----------------------------
  DB読み込み
  ----------------------------- */
  class loadDB {
    
    public function getUser($id, $judge) {

      /* -----------------------------
      値を取得
      ----------------------------- */
      require('connectDB.php');
      
      $query = ($judge) ? "SELECT user_id,id_name,name,mail,thumb FROM users WHERE id_name = :user" : "SELECT user_id,id_name,name,mail,thumb FROM users WHERE user_id = :id";
      $stmt = $pdo -> prepare($query);
			
      $userID = "user_id";
      $author = $id;
      $name   = "name";
      $mail   = "mail";
      $thumb  = "thumb";

      if($judge) {
        $stmt->bindValue(':user', $author, PDO::PARAM_STR);
      } else {
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      }
      
      // 実行
      $stmt->execute();
      
      // 値を取得
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
    public function getWorks($id) {
      require('connectDB.php');
      
      $query = (isset($id)) ? "SELECT * FROM works WHERE id = :id" : "SELECT * FROM works";
      $stmt = $pdo->prepare($query);

      if(isset($id)) $stmt->bindValue(':id', $id, PDO::PARAM_STR);

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

    /*  見積り一覧取得
    ----------------------------------- */
    public function getDetail($id) {
      require('connectDB.php');
      
      $query = "SELECT * FROM posts WHERE works_id = :id";
      $stmt = $pdo->prepare($query);

      $stmt->bindValue(':id', $id, PDO::PARAM_STR);

      $stmt->execute();

      $array = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $array[] = array(
          "id"       => $row['id'],
          "title"    => $row['post_name'],
          "total"    => $row['total'],
          "team"     => $row['team'],
          "regDate"  => $row['regist_date'],
          "update"   => $row['recent_date'],
          "author"   => $row['author'],
          "modified" => $row['modified']
        );
      }
      $pdo = null;

      return $array;
    }

    /*  単価一覧取得
    ----------------------------------- */
    public function getUnit() {
      require('connectDB.php');
      
      $query = "SELECT * FROM unit";
      $stmt = $pdo->prepare($query);
      $stmt->execute();

      $array = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $array[] = array(
          "id"     => $row['id'],
          "code" => $row['code'],
          "content"  => $row['content'],
          "cost"  => $row['cost'],
          "sales" => $row['sales']
        );
      }
      $pdo = null;

      //作業コード順に並べ替え
      foreach ($array as $key => $value){
        $key_id[$key] = $value['code'];
      }
      array_multisort ( $key_id , SORT_DESC , $array);

      return $array;
    }

    /*  クライアント取得
    ----------------------------------- */
    public function getClient($name) {

      require('connectDB.php');

      if(isset($name)) {
        $query = (is_string($name)) ? "SELECT * FROM client WHERE name = :name" : "SELECT * FROM client WHERE id = :name";
      } else {
        $query = "SELECT * FROM client";
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
