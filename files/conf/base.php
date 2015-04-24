<?php
	/* -----------------------------
	各種ファイル読み込み
	----------------------------- */
	$files = array(
		array('conf', 'config'),		//DB接続情報
		array('conf', 'setting'),		//？？？
		array('library', 'status'),		//ページ遷移ステータス
		array('library', 'variable'),	//変数定義
		array('library', 'encryption'),	//暗号化処理
		array('library', 'post'),		//DB登録処理
		array('library', 'load'),		//DB読み込み処理
		array('library', 'display'),		//各画面表示
		array('library', 'function')		//各種小規模機能
	);
	$filesLength = count($files);
	
	for($i = 0; $i < $filesLength; $i++) require_once(ABSPATH.'files/'.$files[$i][0].'/'.$files[$i][1].'.php');
	
?>