<?php 
/**
 * Creation de la fonction sanitize pour nettoyer les donnes envoyes a la bdd
 * @param mixed $data
 * @return string
 */
function sanitize($data)
{
    return htmlentities(strip_tags(stripslashes(trim($data))));
}