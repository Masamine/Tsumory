<?php
	class judgeStatus {
		
		private $flag;
		
		//初期化
		public function __construct($flag){
			$this -> flag = $flag;
		}
		
		public function getStatus($str) {
			if($str == "comp" && $_GET['status'] == "complete") {
				$flag = true;
				return $flag;
			}
			if($str == "tsumo" && $_GET['status'] == "tsumo") {
				$flag = true;
				return $flag;
			}
		}
		
	}
?>