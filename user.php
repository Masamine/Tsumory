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
$user = $load->getUser($_SESSION["username"], true);

?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ユーザー情報 | Tsumory〈見積りライブラリ〉</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/dropify.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body class="user isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box"> 
      <div class="title">
        <h1>ユーザー情報</h1>
      </div>
      <div class="inner">
        <form action="" method="post" enctype="multipart/form-data" id="regist">
          <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
          <ul>
            <li><input type="file" id="input-file-now" name="thumb" class="dropify" data-default-file="files/uploads/<?=$user['thumb']?>" /></li>
            <li><span class="name">ユーザーID</span><span><?=$user['author']?></span></li>
            <li><span class="name">パスワード</span><input type="password" value="" name="regpass" id="regpass" class="chkrequired" placeholder="Password"></li>
            <li><span class="name">ニックネーム</span><input type="text" value="<?=$user['name']?>" name="regname" class="chkrequired" id="regname" placeholder="Name"></li>
            <li><span class="name">メールアドレス</span><input type="text" value="<?=$user['mail']?>" name="regmail" class="chkrequired chkemail" id="regmail" placeholder="Mail"></li>
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
<script type="text/javascript" src="files/js/plugin/dropify.js"></script>
</body>
</html>