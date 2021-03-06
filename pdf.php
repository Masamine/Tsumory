<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	//require_once(ABSPATH."files/library/logout.php");
}

$key = hash("SHA256",time()."as54654sdf54dffg3ad98sd2f");
$msg = "";

//登録画面かどうか
$isReg = ($_GET['mode'] == 'regist');
$title  = ($isReg) ? '作成' : '編集';
$btntxt = ($isReg) ? '登録' : '更新';

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
<title>見積<?=$title?> | 見積りライブラリー</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/estimate.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>

<body class="noAcc isForm" id="page">
<div id="all">
  
  <div id="contents">
    <div class="box">
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
              <th>案件名</th>
              <td><?=$works['title']?></td>
              <th>先方担当者</th>
              <td><?=$works['staff']?></td>
            </tr>
          <?php } ?>
            <tr>
              <th>要件</th>
              <td colspan="5"><input name="detail" value="" type="text" placeholder="Webサイトリニューアル etc" /></td>
            </tr>
            <tr>
              <th>関連チーム</th>
              <td colspan="5"><ul id="teamlist"><?php
                for($i = 0; $i < $teamnum; $i++) {
              ?>
                <li class="<?=$team[$i]["name"]?>" data-id="<?=$team[$i]["id"]?>" id="team02-<?=$team[$i]["name"]?>"><a href="#" data-id="<?=$team[$i]["id"]?>"><?=$team[$i]["name"]?></a></li>
              <?php } ?></ul></td>
            </tr>
        </table>
        <div id="lightboxTotal">
          <p>売価金額合計：<span>￥0</span></p>
        </div>
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
        <form action="" method="post" id="regist" class="sortable">
        </form>
        <div id="totalArea">
          <p id="total">売価金額合計：<span data-total='0'>￥0</span></p>
        </div>
      </div>

    </div>
  </div>
  <?php
    if(isset($_GET['secret']) && ($_GET['secret'] == 1)) {
      echo '<audio src="files/sound/insert.mp3" id="sound"></audio>';
    }
  ?>
  
</div>
<div id="loading"><div class="inner"></div></div>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script type="text/javascript" src="files/js/estimate.js"></script>
<?php
include('files/library/pdf.php');
?>
</body>
</html>