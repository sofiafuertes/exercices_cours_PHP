<?php

//* Fonction sanitize
// @param mixed $data
// @return string

function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

?>