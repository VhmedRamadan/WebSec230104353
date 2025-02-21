<?php

if (!function_exists('isPrime')) {
    function isPrime($number)
    {
        if($number<=1) return false;
        $i = $number - 1;
        while($i>1) {
        if($number%$i==0) return false;
        $i--;
        }
        return true;
    }
}
 if (!function_exists('isEven')) {
    function isEven($number)
    {
        if($number%2==0) return true;
        return false;
    }
} 
?>