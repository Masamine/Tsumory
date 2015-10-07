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
  $postData->regUser(true);
  
  $msg = "更新が完了しました。";
  unset($_SESSION['key']);
}
if(isset($_POST["key"]) && isset($_SESSION["key"]) && $_POST["key"] !== $_SESSION["key"] ) {
  header('location: user.php');
}

$_SESSION["key"] = $key;
$load = new loadDB();
$user = $load->getUser($_SESSION["username"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>見積作成 | Tsury〈ツリー〉</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/dropify.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body class="isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box"> 
      <div class="title">
        <h1>見積り登録</h1>
      </div>
      <div class="inner">
        <form action="" method="post" enctype="multipart/form-data" id="regist">
          <ul class="line">
            <li class="title"><input type="text" value="" placeholder="作業名" /></li>
            <li class=""></li>
            <li></li>
            <li></li>
          </ul>
          <p class="submit radbtn"><input type="submit" value="登録"></p>
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
</body>
</html>