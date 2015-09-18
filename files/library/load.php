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

      require_once('connectDB.php');
      
      // クエリ分を発行。
      $query = "SELECT id, client_name FROM tsury_client";
      
      // ステートメントを準備
      if ($stmt = $mysqli->prepare($query)) {
        
        $ID     = "id";
        $client = "client_name";

        $stmt->bind_param('s', $client);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $client);
        
        while ($stmt->fetch()) {
          
          $array = array(
            "ID"     => $ID,
            "client" => $client
          );
          
          return $array;
        }
        
        $stmt->close();
      } else {
        printf("NO DATA");
      }

      $mysqli->close();

      return false;
    }
    
  }

?>
