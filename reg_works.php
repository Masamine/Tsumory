<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}

$key = hash("SHA256",time()."5s4fg6h4fdkgs634tfh5g5d2g");
$msg = "";

if($_POST["key"] == $_SESSION["key"]) {
  $postData = new postData();
  $postData->regWorks();
  $msg = "案件名「".$_POST["works"]."」の登録が完了しました！";
  unset($_SESSION['key']);
}
if(isset($_POST["key"]) && isset($_SESSION["key"]) && $_POST["key"] !== $_SESSION["key"] ) {
  header('location: reg_works.php');
}

$_SESSION["key"] = $key;
$load = new loadDB();
$user = $load->getUser($_SESSION["username"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>新規案件登録 | Tsury〈ツリー〉</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/reg_works.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body class="isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box">
      <div class="title">
        <h1>新規案件登録</h1>
      </div>
      <?php if($msg): ?>
      <p class="msg"><?=$msg?></p>
      <?php endif; ?>
      <div class="inner">
        <form action="" method="post" class="accBox" id="regist">
          <div class="form">
          	<div class="select">
              <input type="text" name="client" id="client" placeholder="クライアント名" value="" class="input chkrequired">
              <span class="input">▼</span>
              <ul>
              <?php
                $load   = new loadDB();
                $client = $load->getClient();
                $num = count($client);
                for($i = $num - 1; $i >= 0; $i--) {
              ?>
              <li><?=$client[$i]['name']?></li>
              <?php } ?>
              </ul>
            </div>
          </div>
          <div class="form"><input type="text" value="" name="staff" id="client_staff" placeholder="先方担当者"></div>
          <div class="form"><input type="text" value="" name="works" id="works" class="chkrequired" placeholder="案件名"></div>
          <div class="radbtn"><input type="submit" value="登録"></div>
          <input type="hidden" name="key" value="<?php echo $key ?>">
        </form>
      </div>
    </div>
  </div>
  
  <?php require_once(ABSPATH."files/display/common/side.php"); ?>
  <footer>
    <p><?php echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']; ?></p>
  </footer>
</div>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
<script type="text/javascript" src="files/js/exvalidation.js"></script>
<script type="text/javascript" src="files/js/exchecker-ja.js"></script>
</body>
</html>