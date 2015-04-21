<?php
	/* -----------------------------
	DB読み込み
	----------------------------- */
	class loadDB {
		
		public function getUser() {
			
			/* -----------------------------
			値を取得
			----------------------------- */
			
			// クエリ分を発行。
			$query = "SELECT user_name, user_mail, user_thumb FROM tsury_user";
			
			// ステートメントを準備
			if ($stmt = $mysqli->prepare($query)) {
				
				$name = "hoge";
				$value = "huga";
				$thumb = "huga";
				
				// 変数をバインド
				$stmt->bind_param($name, $value, $thumb);
				
				// 実行
				$stmt->execute();
				
				// 結果をバッファに保存
				$stmt->store_result();
				
				// 変数をプリペアドステートメントにバインド
				// ここではバインドするだけであり、実際に取得するのはfetch()
				$stmt->bind_result($col1, $col2, $col3);
				
				// 値を取得
				while ($stmt->fetch()) {
					printf("%s %s %s", $col1, $col2, $col3);
				}
				
				// ステートメントを閉じる
				$stmt->close();
			}
			// 接続を閉じる
			$mysqli->close();
		}
		
	}
?>
