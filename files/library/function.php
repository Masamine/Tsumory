<?php
	/* -----------------------------
	各種小規模機能
	----------------------------- */
	class func {
		
		function passhash($str) {

			$salt   = "mwefCMEP28DjwdW3lwdS239vVS";
			$result = hash("SHA256", $str.$salt);

			return $result;
			
		}
	}
?>