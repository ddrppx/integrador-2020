<?php
    $products = array("Pão", "Carne","Alface","Tomate","Ovo");

    $custom = $products;
    array_flip($custom);

    print_r($custom);

    // foreach ($products as $arrayOutput){
    //     $i = 0;
    //     $custom[$i];
    //     echo $arrayOutput[$i]. ": ". $custom[$i];
    //     $i++;
    // }

    print_r(array_keys($custom));

    echo "<hr />";
    for ($i = 0; $i < count($products); $i++) {
        $custom[$products[$i]] = 2;
        echo $products[$i].": ". $custom[$products[$i]]. "<br />";
    }

    echo "<br />";

    // foreach(array_keys($custom) as $a){
    //     echo $a. "<br />";
    // }

    $try = array_flip($products);
    echo "<br />";

    foreach (array_keys($try) as $go) {
        echo $go."<br />";
    }
