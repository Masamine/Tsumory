<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}
if(isset($_POST["regClient"])) {
  $postData = new postData();
  $postData->regClient();
  header('location: client.php');
} else {
  $load = new loadDB();
  $user = $load->getUser($_SESSION["username"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>クライアント管理 | Tsury〈ツリー〉</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/client.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body class="noList client" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box"> 
      <div class="title">
        <h1>クライアント管理</h1>
        <div class="radbtn" id="reg"><a href="/reg_client.php" class="modal">新規登録</a></div>
      </div>
      <?php
        $load   = new loadDB();
        $client = $load->getClient();
        $num = count($client);
        for($i = 0; $i < $num; $i++) {
      ?>
      <div class="list">
        <div class="names">
          <p class="radbtn editbtn"><a href="/edit_client.php">編集</a></p>
          <h2><?=$client[$i]['name']?></h2>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <?php require_once(ABSPATH."files/display/common/side.php"); ?>
  <footer>
    <p><?php echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']; ?></p>
  </footer>
</div>

<div id="modal">
  <div id="regBox">
    <h3>クライアント新規登録</h3>
    <p class="radbtn" id="close"><a href="#" class="modal close">×</a></p>
    <form method="post">
    	<p><input type="text" value="" placeholder="クライアント名" name="regClient" id="regClient" class="chkrequired"></p>
    	<div class="radbtn"><input type="submit" value="登録"></div>
    </form>
  </div>
</div>

<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
<script type="text/javascript" src="files/js/exvalidation.js"></script>
<script type="text/javascript" src="files/js/exchecker-ja.js"></script>
</body>
</html>