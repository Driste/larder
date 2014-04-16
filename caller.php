<?php
    $key = "356970b560a7a1f993e48a203a2221d7";
    $id = "521b1d6a";
    
    $keyword = "onion+soup";

    //header("Location: http://api.yummly.com/v1/api/recipes?_app_id=$id&_app_key=$key&q=$keyword");

    $url = "http://api.yummly.com/v1/api/recipes?_app_id=$id&_app_key=$key&allowedIngredient[]=garlic&allowedIngredient[]=butter&allowedIngredient[]=potatoes&allowedIngredient[]=cheese&allowedIngredient[]=salt&allowedIngredient[]=chicken";
    
    $presult = file_get_contents($url, 0, null, null);
    $result = json_decode($presult);

    foreach($result->matches as $trend){
        echo "{$trend->recipeName}\n<br>";
        foreach($trend->ingredients as $ing){
            echo "$ing, ";
        }
        echo "<br><br>";
    }

?>