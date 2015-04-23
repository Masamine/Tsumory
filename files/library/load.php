<?php
	/* -----------------------------
	DB読み込み
	----------------------------- */
	class loadDB {
		
		public function getUser($id) {
			
			/* -----------------------------
			値を取得
			----------------------------- */
			require_once('connectDB.php');
			
			// クエリ分を発行。
			$query = "SELECT * FROM tsury_user WHERE user_user = ?";
			
			// ステートメントを準備
			if ($stmt = $mysqli->prepare($query)) {
				
				$userID    = "user_user";
				
				// 変数をバインド
				$stmt->bind_param('s', $userID);
				
				// 実行
				$stmt->execute();
				
				// 結果をバッファに保存
				$stmt->store_result();
				
				// 変数をプリペアドステートメントにバインド
				// ここではバインドするだけであり、実際に取得するのはfetch()
				$stmt->bind_result($col1);
				
				// 値を取得
				while ($stmt->fetch()) {
					printf("%s", $col1);
				}
				
				// ステートメントを閉じる
				$stmt->close();
			}
			// 接続を閉じる
			$mysqli->close();
		}
		
	}
?>
