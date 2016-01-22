<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
require_once(ABSPATH."files/library/search.php");

if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}

$getClient = $_GET['sClient'];
$getTeam   = $_GET['sTeam'];
$getWord   = $_GET['sKeyword'];
$isClient = ($getClient !== "");
$isTeam   = ($getTeam !== "");
$isWord   = ($getWord !== "");

$key = hash("SHA256",time()."as54654sdf54dffg3ad98sd2f");
$msg = "";

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
$user = $load->getUser($_SESSION["username"], true);
?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>見積検索 | 見積りライブラリー</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/search.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>

<body class="noAcc isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box">
      <div class="title">
        <h1>見積検索</h1>
        <p><?php if($isClient): ?>クライアント：<?=$getClient?><?php endif; ?></p>
        <p><?php if($isTeam): ?>チーム：<?=$getTeam?><?php endif; ?></p>
        <p><?php if($isWord): ?>キーワード：<?=$getWord?><?php endif; ?></p>
      </div>
      <div id="names">
        <ul>
          <li class="client">クライアント</li>
          <li class="works">案件名</li>
          <li class="update">更新日時</li>
        </ul>
      </div>
      <div id="data">
        <?php
          $data = searchData();
          $num  = count($data);
          for($i = 0; $i < $num; $i++) {
            $d        = $data[$i];
            $postID   = $d['postID'];   //見積りID
            $postName = $d['post_name'];//見積り名
            $team     = $d['team'];     //所属チームのID配列
            $author   = $d['author'];   //更新者
            $time     = $d['recent_date'];//更新日時
            $total    = $d['total'];    //合計金額
            $worksID  = $d['worksID'];  //案件ID
            $client   = $d['client'];   //クライアント
            $title    = $d['title'];    //案件名
            $detail   = $d['detail'];    //見積り詳細
        ?>
        <div class="list">
          <p><?=$postID?>　<?=$postName?>　<?=$team?>　<?=$author?>　<?=$time?>　<?=$total?>　<?=$worksID?>　<?=$client?>　<?=$title?><br><?php var_dump($detail); ?></p>
        </div>
        <?php } ?>
      </div>
      
    </div>
  </div>
  <?php
    if(isset($_GET['secret']) && ($_GET['secret'] == 1)) {
      echo '<audio src="files/sound/insert.mp3" id="sound"></audio>';
    }
  ?>
  <?php require_once(ABSPATH."files/display/common/side.php"); ?>
  
  <footer>
    <p><?php echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']; ?></p>
  </footer>
</div>
<div id="loading"><div class="inner"></div></div>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script type="text/javascript" src="files/js/search.js"></script>
</body>
</html>