<?php

function check_special($arr){
    if (preg_match('/[\'^£$%&*()}!{@#~?><,.|=_+¬-]/u', $arr[0])) {
        $arr[] = array_shift($arr);
    }else{
        return $arr;}
    return check_special($arr);
}

function mb_strrev($str): string
{
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}

function revertCharacters($str): string
{
    $arr = explode(' ', $str);

    foreach ($arr as $Value) {
        if(!ctype_upper($Value)){
            $arr_rev = mb_str_split(mb_strrev($Value));
            $arr_rev=check_special($arr_rev);
        }else{
            $arr_rev = mb_str_split(mb_strrev($Value));
            $arr_rev=check_special($arr_rev);
        }
        $make_str .= ' ' . implode('', $arr_rev);
    }
    // Delete 1st space
    $make_str = mb_substr($make_str,1);
    $make_str = mb_strtolower($make_str);

    for ($i = 0, $len = mb_strlen($make_str); $i <= $len; $i++)
    {
        if (ctype_upper($str[$i])){
            $make_str[$i]=mb_strtoupper($make_str[$i]);}
        else{
            $make_str[$i]=mb_strtolower($make_str[$i]);}
    }
    return $make_str;
}

$result = revertCharacters("sы");
echo $result; // Тевирп! Онвад ен ьсиледив.
