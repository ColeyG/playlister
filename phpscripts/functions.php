<?php
	function randPass($length){
		$alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ-+_@!.?|,~`';
		$passArr = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < $length; $i++) {
			$n = rand(0, $alphaLength);
			$passArr[] = $alphabet[$n];
		}
		return implode($passArr);
    }
    function checkIns($string){
        if (ctype_alnum($string)) {
            return true;
        } else {
            return false;
        }
    }
?>