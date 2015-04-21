<?php
	/* -----------------------------
	ログイン処理
	----------------------------- */
	// ログインボタンが押された場合
	if (isset($_POST["loginbtn"])) {

		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		require_once('connectDB.php');

		$status = "none";
		$func = new func();

		//セッションにセットされていたらログイン済み
		if(isset($_SESSION["username"])) $status = "logged_in";
		
		else if(!empty($user) && !empty($user)){

		  //ユーザ名、パスワードが一致する行を探す
		  $password = $func->passhash($pass);
		  $stmt = $mysqli->prepare("SELECT * FROM tsury_user WHERE user_user = ? AND user_pass = ?");
		  $stmt->bind_param('ss',$user, $password);
		  $stmt->execute();
			
		  //結果を保存
		  $stmt->store_result();
		  //結果の行数が1だったら成功
		  if($stmt->num_rows == 1){
		    $status = "ok";
		    $_SESSION["username"] = $user;
		    header('location: home.php?user='.$user);
				exit();
		  } else $status = "failed";
		}
	}
?>