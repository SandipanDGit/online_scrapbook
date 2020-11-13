<?php 
    function create_unique_id($len){
    //returns a random string of length equal to param

        $id = "";
        $str = "";
        $str .= "0123456789";
        $str .= "abcdefghijklmnopqrstuvwxyz";
        $str .= "0123456789";
        $str .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str .= "0123456789";
        $min = 0;
        $max = strlen($str)-1;
        for($i = 1; $i <= $len; $i++){
            $rand = random_int($min, $max);
            $id .= $str[$rand];
        }
        return $id;
    }
?>