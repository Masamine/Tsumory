<?php
	// タイムスタンプと推測できない文字列にてキーを発行
	$key = hash("SHA256",time()."qpfbTtZU67REE3ed4xEBxPaGkbckN92dkX4rLX4f");
	
	// 発行したキーをセッションに保存
	$_SESSION["key"] = $key;
?>

<div class="box loginbtn active">
  <div class="form" id="login">
    <h2>ログイン</h2>
    <?php if($status == "failed"): ?>
    <p>ユーザー名、もしくはパスワードが間違っています。頑張って思い出しましょう。</p>
    <?php endif; ?>
    
    <form action="" method="post">
      <ul>
        <li><input type="text" value="<?php echo htmlspecialchars($_POST["user"], ENT_QUOTES); ?>" name="user" id="user" placeholder="User"></li>
        <li><input type="password" value="" name="pass" id="pass" placeholder="Password"></li>
      </ul>
      <p class="submit"><input type="submit" id="loginbtn" name="loginbtn" value="ログイン"></p>
    </form>
    <p><a href="#" class="btn" id="registbtn">→新規登録の方はこちら</a></p>
  </div>
</div>
<div class="box registbtn">
  <div class="form" id="regist">
    <h2>新規ユーザー登録</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
      <ul>
        <li><input type="file" id="input-file-now" name="thumb" class="dropify" data-default-file="" /></li>
        <li><input type="text" value="" name="reguser" id="reguser" class="chkrequired chknochar chkhankaku" placeholder="User"></li>
        <li><input type="password" value="" name="regpass" id="regpass" class="chkrequired" placeholder="Password"></li>
        <li><input type="text" value="" name="regname" class="chkrequired" id="regname" placeholder="Name"></li>
        <li><input type="text" value="" name="regmail" class="chkrequired chkemail" id="regmail" placeholder="Mail"></li>
      </ul>
      <p class="submit"><input type="submit" value="登録"></p>
      <input type="hidden" name="key" value="<?php echo $key ?>">
    </form>
    <p id="close"><a href="#" class="btn" id="loginbtn">×</a></p>
  </div>
</div>