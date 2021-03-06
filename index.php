<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
require_once(ABSPATH."files/library/login.php");
if($_SESSION["username"]) {
	header('location: /home.php');
	exit();
};
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
<link href="files/css/dropify.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>
<body id="index">
  <div id="all">
    <header>
      <h1><img src="files/img/common/img_logo.png" alt="見積りライブラリー Tsumory" /></h1>
    </header>
    <?php showDisplay('index', 'form'); ?>
  </div>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/script.js"></script>
</body>
</html>