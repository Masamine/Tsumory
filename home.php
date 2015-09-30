<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_COOKIE["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}

$key = hash("SHA256",time()."as54654sdf54dffg3ad98sd2f");
$msg = "";

if($_POST["key"] == $_SESSION["key"]) {
  $postData = new postData();
  $postData->regWorks();
  $msg = "案件名<span>「".$_POST["works"]."」</span>の登録が完了しました！";
  unset($_SESSION['key']);
}
if(isset($_POST["key"]) && isset($_SESSION["key"]) && $_POST["key"] !== $_SESSION["key"] ) {
  header('location: home.php');
}

$_SESSION["key"] = $key;
$load = new loadDB();
$user = $load->getUser($_SESSION["username"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tsury〈ツリー〉 | 見積りライブラリー</title>
<meta name="robots" content="all" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="files/css/common/base.css" media="all" rel="stylesheet" />
<link href="files/css/page.css" media="all" rel="stylesheet" />
<link href="files/css/common/exvalidation.css" media="all" rel="stylesheet" />
</head>

<?php $id = $_GET["p"]; ?>
<body class="isForm" id="page">
<div id="all">
  <?php require_once(ABSPATH."files/display/common/header.php"); ?>
  
  <div id="contents">
    <?php require_once(ABSPATH."files/display/common/search.php"); ?>
    <div class="box">
      <div class="title">
        <h1>案件一覧</h1>
        <div class="radbtn trigger" id="reg"><a href="#">新規案件登録</a></div>
      </div>
      <?php if($msg): ?>
      <p class="msg"><?=$msg?></p>
      <?php endif; ?>
      <div class="formBox">
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
          <div class="radbtn"><input type="submit" class="submit" value="登録"></div>
          <input type="hidden" name="key" value="<?php echo $key ?>">
        </form>
      </div>

      <div id="names">
        <ul>
          <li class="client">クライアント</li>
          <li class="works">案件名</li>
          <li class="update">更新日時</li>
        </ul>
      </div>
      <?php
        $load   = new loadDB();
        $work  = $load->getWorks();
        $num = count($work);
        for($i = $num - 1; $i >= 0; $i--) {
        $works = $work[$i];
        $client = $load->getClient($works["client"] | 0);
      ?>
      <div class="list">
        <div class="names">
          <h2><?=$client[0]["name"]?></h2>
          <p class="works"><?=$works["title"]?></p>
          <p class="update"><?=$works["update"]?></p>
        </div>
        <div class="contents">
          <div class="inner">
            <div class="reg radbtn"><a href="reg_tsury.php">見積り登録</a></div>
            <div class="data">
              <table>
                <tr>
                  <td class="icon">
                    <ul>
                      <li class="web"><span>Web</span></li>
                      <li class="design"><span>Design</span></li>
                      <li class="edit"><span>Edit</span></li>
                      <li class="dtp"><span>DTP</span></li>
                    </ul>
                  </td>
                  <td class="detail">レスポンシブ対応版</td>
                  <td class="price">￥1,000,000</td>
                  <td class="name">Doko</td>
                  <td class="update">2014/02/14 15:07</td>
                  <td class="btns">
                    <ul>
                      <li class="radbtn pdf"><a href="#">PDF</a></li>
                      <li class="radbtn delete"><a href="#">削除</a></li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
          </div>
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
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
<script type="text/javascript" src="files/js/exvalidation.js"></script>
<script type="text/javascript" src="files/js/exchecker-ja.js"></script>
</body>
</html>