<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}

$key = hash("SHA256",time()."as54654sdf54dffg3ad98sd2f");
$msg = "";

//登録画面かどうか
$isReg = ($_GET['mode'] == 'regist');

// if($_POST["key"] == $_SESSION["key"]) {
//   $postData = new postData();
//   $postData->regUnit();
//   $msg = "<span>「".$_POST["code"]." ".$_POST["content"]."」</span>の登録が完了しました！";
//   unset($_SESSION['key']);
// }
// if(isset($_POST["key"]) && isset($_SESSION["key"]) && $_POST["key"] !== $_SESSION["key"] ) {
//   header('location: cost.php');
// }

$_SESSION["key"] = $key;
$load = new loadDB();
$user = $load->getUser($_SESSION["username"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>見積作成 | 見積りライブラリー</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/estimate.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>

<?php $id = $_GET["p"]; ?>
<body class="noAcc isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box">
      <div class="title">
        <h1>見積作成</h1>
      </div>
      <?php if($msg): ?>
      <p class="msg"><?=$msg?></p>
      <?php endif; ?>
      <div id="works">
        <table>
          <?php
            $worksID = $_GET['pid'];
            $load    = new loadDB();
            $work    = $load->getWorks($worksID);
            $num     = count($work);
            for($i  = $num - 1; $i >= 0; $i--) {
              $works  = $work[0];
              $client = $load->getClient($works["client"] | 0);
          ?>
            <tr>
              <th>クライアント</th>
              <td><?=$client[0]['name']?></td>
            </tr>
            <tr>
              <th>案件名</th>
              <td><?=$works['title']?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="btnset">
        <h2>クイック見積り</h2>
        <ul class="radbtn">
          <li class="ttl"><a data-code="title">見出し</a></li>
          <li><a data-code="1-M-A">進行管理A</a></li>
          <li><a data-code="1-M-B">進行管理B</a></li>
          <li><a data-code="3-PC-A">ページ制作A</a></li>
          <li><a data-code="3-PC-B">ページ制作B</a></li>
          <li><a data-code="4-C">テンプレコーディング</a></li>
          <li><a data-code="4-S">Script</a></li>
          <li><a data-code="4-O">パーツ制作</a></li>
        </ul>
      </div>
      <div class="name table">
        <p class="code">作業コード</p>
        <p class="content">内容</p>
        <p class="count num">数量</p>
        <p class="unit num">単位</p>
        <p class="org num">原単価</p>
        <p class="sales num">売単価</p>
        <p class="profit num">利益率</p>
        <p class="selling num">売価金額</p>
      </div>

      <div id="data">
        <form action="" method="post" id="regist">
          <?php for($i = 0; $i < 0; $i++){ ?>
          <div class="data list">
            <ul class="table">
              <li class="code"><input type="text" /></li>
              <li class="content"><input type="text" /></li>
              <li class="count num"><input type="text" /></li>
              <li class="unit num"><input type="text" value="人日" /></li>
              <li class="org num"><input type="text" /></li>
              <li class="sales num"><input type="text" /></li>
              <li class="profit num"><input type="text" /></li>
              <li class="selling num"><input type="text" /></li>
            </ul>
          </div>
          <?php } ?>
        </form>
        <div class="radbtn" id="regbtn"><a href="">登録</a></div>
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
<script type="text/javascript" src="files/js/estimate.js"></script>
</body>
</html>