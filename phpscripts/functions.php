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
        $badChar = array("\\","/");
        $checkArray = str_split($string);
        //print_r($checkArray);
        for($i=0;$i<sizeof($checkArray);$i++){
            for($x=0;$x<sizeof($badChar);$x++){
                if($checkArray[$i]==$badChar[$x]){
                    return false;
                }
            }
        }
        return true;
    }

    function dbEscape($link,$string){
        return mysqli_real_escape_string($link,$string);
    }

    function leng($string,$length){
        if (strlen($string)<=$length){
            return false;
        }else{
            return true;
        }
    }
?>