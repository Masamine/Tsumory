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
			$query = "SELECT user_id,user_user,user_name,user_thumb FROM tsury_user WHERE user_user = ?";
			
			// ステートメントを準備
			if ($stmt = $mysqli->prepare($query)) {
				
				$userID = "user_id";
				$author = $id;
				$name   = "user_name";
				$thumb  = "user_thumb";
				
				// 変数をバインド
				$stmt->bind_param('s', $author);
				
				// 実行
				$stmt->execute();
				
				// 結果をバッファに保存
				$stmt->store_result();
				
				// 変数をプリペアドステートメントにバインド
				// ここではバインドするだけであり、実際に取得するのはfetch()
				$stmt->bind_result($userID, $author, $name, $thumb);
				
				// 値を取得
				while ($stmt->fetch()) {
					
					$array = array(
						"userID" => $userID,
						"author" => $author,
						"name"   => $name,
						"thumb"  => $thumb
					);
					
					return $array;
				}
				
				// ステートメントを閉じる
				$stmt->close();
			} else {
				printf("NO DATA");
			}
			// 接続を閉じる
			$mysqli->close();
		}
		
	}
?>
