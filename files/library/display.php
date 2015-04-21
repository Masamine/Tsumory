<?php
	function showDisplay($path, $file) {
		require_once(ABSPATH.'files/display/'.$path.'/'.$file.'.php');
	}
?>