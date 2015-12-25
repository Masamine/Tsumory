<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
$status = $_GET['status'];
?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tsumory〈見積りライブラリ〉 | 見積りライブラリー</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/style.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body id="index">
  <div id="all">
    <header>
      <h1><img src="files/img/common/img_logo.png" alt="見積りライブラリー Tsumory" /></h1>
    </header>
    <?php
// 変数宣言
	$msg = "";
	
// セッションに保持されているキーと、POSTで飛んできたキーが同じかどうか判別
	if ( isset($_SESSION["key"]) && isset($_POST["key"]) && $_SESSION["key"] == $_POST["key"]) {

// 合致しているので、送信処理を記述
		$msg = "登録完了です。";
		$postData = new postData();
		$postData->regUser();
	}
	else {
// 合致していないので、送信しない
		$msg = "2重送信はできません。";
	}
	
// セッションに保持されているキーを破棄する ※重要※
	unset($_SESSION['key']);

?>
<div class="box active">
  <p>
  <?=$msg?>
  </p>
  <p><a href="/">ログイン画面へどうぞ</a></p>
</div>
    
  </div>
  
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/script.js"></script>
</body>
</html>