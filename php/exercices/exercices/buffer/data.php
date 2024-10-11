<?php 

$titre = "Le parfait Kebab!";

$ingredients = ["Tomate","Salade","Oignon","Sauce blanche","Fritte"];

function listIngredient($tab){
    ob_start();
    foreach($tab as $ingredient){
?>
        <li> <?php echo $ingredient ?> </li>
<?php        
    }
    return ob_get_clean();
}

$listIngredients = listIngredient($ingredients);