<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 13:12
 */
function fixUrl($str){
    return urlencode($str);
}

function fixDb($value){
return '"'.addslashes($value).'"';
}