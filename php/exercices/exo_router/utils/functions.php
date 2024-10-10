<?php
/**
 *Sanitize() : Clean the datas, removing HTML, SCRIPT JS, PHP, and space at begining and ending from datas 
 *Param : $data -> String
 *Return : String
*/
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}