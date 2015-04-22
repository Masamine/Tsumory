<?php
session_start();
define('ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/');
require_once(ABSPATH."files/conf/base.php");
if(!$_SESSION["username"] || !($_GET["user"] == $_SESSION["username"])) {
	require_once(ABSPATH."files/library/logout.php");
}
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
<body id="page">
<div id="all">
  <header>
    <div class="inner">
      <p><img src="/files/img/common/img_logo.png" alt="見積りライブラリー Tsury" /></p>
      <ul id="info">
        <li><a href="/logout.php">ログアウト</a></li>
        <li><a href="#"><img src="/files/img/common/icon_search.png" alt="" /</a></li>
        <li class="user"><a href="#"><img src="/files/uploads/yellow.png" alt="" /></a></li>
      </ul>
    </div>
  </header>
  
  <div id="contents">
    <div id="search">
    	<div class="box">
      <form action="search.php?user=<?php echo $_GET["user"]; ?>">
      	<div class="select">
        	<input type="text" name="sClient" placeholder="クライアント選択" value="" readonly="readonly">
          <ul>
            <li>Sample A</li>
            <li>Sample B</li>
            <li>Sample C</li>
            <li>Sample D</li>
            <li>Sample E</li>
            <li>Sample F</li>
            <li>Sample G</li>
            <li>Sample H</li>
            <li>Sample I</li>
            <li>Sample J</li>
          </ul>
        </div>
      </form>
      </div>
    </div>
    <div class="box">
      <div class="title">
        <h1>案件一覧</h1>
        <div class="radbtn" id="reg"><a href="/regist_works/">新規登録</a></div>
      </div>
      <div id="names">
        <ul>
          <li class="client">クライアント</li>
          <li class="works">案件名</li>
          <li class="update">更新日時</li>
        </ul>
      </div>
      
      <div class="list">
        <div class="names">
          <h2>ダミーコーポレーション</h2>
          <p class="works">どっかのサイト制作</p>
          <p class="update">2014/02/14 15:07</p>
        </div>
        <div class="contents">
          <div class="inner">
            <div class="data">
              <table>
                <tr>
                  <td class="icon">
                    <ul>
                      <li class="web"><span>Web</span></li>
                      <li class="design"><span>Design</span></li>
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
      <div class="list">
        <div class="names">
          <h2>ダミーコーポレーション</h2>
          <p class="works">どっかのサイト制作</p>
          <p class="update">2014/02/14 15:07</p>
        </div>
        <div class="contents">
          <div class="inner">
            <div class="data">
              <table>
                <tr>
                  <td class="icon">
                    <ul>
                      <li class="web"><span>Web</span></li>
                      <li class="design"><span>Design</span></li>
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
      <div class="list">
        <div class="names">
          <h2>ダミーコーポレーション</h2>
          <p class="works">どっかのサイト制作</p>
          <p class="update">2014/02/14 15:07</p>
        </div>
        <div class="contents">
          <div class="inner">
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
      
    </div>
  </div>
  
  <div id="side">
    <div class="inner">
      <ul>
        <li><a href="/home.php" class="current">案件一覧</a></li>
        <li><a href="#">単価設定</a></li>
        <li><a href="#">クライアント設定</a></li>
      </ul>
    </div>
  </div>
  <footer>
    <p><?php echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']; ?></p>
  </footer>
</div>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/jsSet.js"></script>
</body>
</html>