<?php
  /* -----------------------------
  各種小規模機能
  ----------------------------- */
  class func {
    
    //パスワード暗号化処理
    function passhash($str) {

      $salt   = "mwefCMEP28DjwdW3lwdS239vVS";
      $result = hash("SHA256", $str.$salt);

      return $result;
      
    }
    
    //HTMLエンティティ変換
    function spchar($str) {
      
      $result = htmlspecialchars($str, ENT_QUOTES);
      
      return $result;
      
    }
  }
?>