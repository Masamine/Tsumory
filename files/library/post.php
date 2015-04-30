<?php
	/* -----------------------------
	DB登録
	----------------------------- */
	
	class postData {
		
		/* ★ユーザー登録
		----------------------------------------- */
		function regUser() {
			
			require_once('connectDB.php');
			$func = new func();

			$sql   = "INSERT INTO tsury_user(user_user,user_pass,user_name,user_mail,user_thumb) VALUES (?,?,?,?,?)";
			$stmt  = $mysqli->prepare($sql);
			$salt  = "mwefCMEP28DjwdW3lwdS239vVS";
			$thumb = $_FILES["thumb"];
			
			if (is_uploaded_file($thumb["tmp_name"])) {
				if (move_uploaded_file($thumb["tmp_name"], "files/uploads/" . $thumb["name"])) {
					chmod("files/uploads/" . $thumb["name"], 0644);
				}
			}
			
			// ここで変数に値を代入
			$user_user  = $_POST["reguser"];
			$user_pass  = $func->passhash($_POST["regpass"]);
			$user_name  = $_POST["regname"];
			$user_mail  = $_POST["regmail"];
			$user_thumb = ($thumb["name"]) ? $thumb["name"] : "img_noimg.jpg";
			
			// ここでパラメータに実際の値となる変数を入れる。
			// 第1引数は、それぞれパラメータの型
			$stmt->bind_param('sssss', $user_user, $user_pass, $user_name, $user_mail, $user_thumb);
			
			// プリペアドステートメントを実行
			$stmt->execute();
			
			// ステートメントと接続を閉じる
			$stmt->close();
			
			// 接続を閉じる
			$mysqli->close();
		}
		
		/* ★案件登録
		----------------------------------------- */
		function regWorks() {
			
			require_once('connectDB.php');
			$func = new func();

			$sql   = "INSERT INTO tsury_works(user_user,user_pass,user_name,user_mail,user_thumb) VALUES (?,?,?,?,?)";
			$stmt  = $mysqli->prepare($sql);
			$salt  = "mwefCMEP28DjwdW3lwdS239vVS";
			$thumb = $_FILES["thumb"];
			
			if (is_uploaded_file($thumb["tmp_name"])) {
				if (move_uploaded_file($thumb["tmp_name"], "files/uploads/" . $thumb["name"])) {
					chmod("files/uploads/" . $thumb["name"], 0644);
				}
			}
			
			// ここで変数に値を代入
			$user_user  = $_POST["reguser"];
			$user_pass  = $func->passhash($_POST["regpass"]);
			$user_name  = $_POST["regname"];
			$user_mail  = $_POST["regmail"];
			$user_thumb = ($thumb["name"]) ? $thumb["name"] : "img_noimg.jpg";
			
			// ここでパラメータに実際の値となる変数を入れる。
			// 第1引数は、それぞれパラメータの型
			$stmt->bind_param('sssss', $user_user, $user_pass, $user_name, $user_mail, $user_thumb);
			
			// プリペアドステートメントを実行
			$stmt->execute();
			
			// ステートメントと接続を閉じる
			$stmt->close();
			
			// 接続を閉じる
			$mysqli->close();
		}
	}
?>