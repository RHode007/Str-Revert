<?php

//Move special characters from start to end
function check_special($arr){
    if (preg_match('/[\'^£$%&*()}!{@#~?><,.|=_+¬-]/u', $arr[0])) {
        $arr[] = array_shift($arr);
    }else{
        return $arr;}
    return check_special($arr);
}

//Replace characters with offset
function mb_substr_replace($string, $replacement, $start, $length){
    return mb_substr($string, 0, $start).$replacement.mb_substr($string, $start+$length);
}

//String reverse
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
    try {


    $arr = explode(' ', $str);                     // Divide sting to array

    //Divide a word in the array into a subarray letter by letter
    foreach ($arr as $Value) {
        if(!ctype_upper($Value)){
            $arr_rev = mb_str_split(mb_strrev($Value));     // word reverse
            $arr_rev = check_special($arr_rev);             // Return special characters to end of word
        }else{
            $arr_rev = mb_str_split(mb_strrev($Value));
            $arr_rev = check_special($arr_rev);
        }
        $make_str .= ' ' . implode('', $arr_rev);
    }
    // Delete 1st space
    $make_str = mb_substr($make_str,1);

    //Registry Back
    for ($i = 0, $len = mb_strlen($make_str); $i <= $len; $i++)
    {
        $letter=mb_substr ($str, $i, 1, "UTF-8");           //get 1 symbol.
        if (mb_strtoupper($letter, "UTF-8") === $letter){
            $make_str = mb_substr_replace($make_str, mb_strtoupper(mb_substr($make_str,$i,1)), $i,1);
        } else{
            $make_str = mb_substr_replace($make_str, mb_strtolower(mb_substr($make_str,$i,1)), $i,1);
        }
    }
    return $make_str;
    }
    catch (Exception $e) {
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }

}
//$result = revertCharacters("Тевирп! Онвад ен ьсиледив.");
//echo $result; // Тевирп! Онвад ен ьсиледив.
