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
			
			try {
				$pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
			} catch (PDOException $e) {
				exit('データベースに接続できませんでした。' . $e->getMessage());
			}
			
			// クエリ分を発行。
			$query = "SELECT * FROM tsury_user WHERE user_user = ?";
			
			// ステートメントを準備
			if ($stmt = $pdo->prepare($query)) {
				
				$stmt->bindValue('?', 1, PDO::PARAM_INT);
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
