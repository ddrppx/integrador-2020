<?php
    $products = array("Pão", "Carne","Alface","Tomate","Ovo");

    $custom = $products;
    array_flip($custom);

    // foreach ($product    s as $arrayOutput){
    //     $i = 0;
    //     $custom[$i];
    //     echo $arrayOutput[$i]. ": ". $custom[$i];
    //     $i++;
    // }

    // print_r(array_keys($custom));

    // echo "<hr />";
    // for ($i = 0; $i < count($products); $i++) {
    //     echo $products[$i].": ". $custom[$products[$i]]. "<br />";
    // }

    // echo "<br />";

    // foreach(array_keys($custom) as $a){
    //     echo $a. "<br />";
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var num;

        function aumentar() {
            document.write("Hello");
        }
        
        aumentar();

    </script>
</head>
<body>
    <?php
    echo "<form method=\"get\" action=\"index.php\">";
    
   

            for($i = 0; $i < count($products); $i++){

                $ingredientLabel = $products[$i];
                $ingredientName = strtolower(
                    preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $products[$i] ) )
                );



                $value = $_GET[$ingredientName];

                echo "<label for=". $ingredientName. ">$ingredientLabel</label><br />";

                echo "<input type=\"number\" name=\"$ingredientName\" id=\"$ingredientName\">";
                echo "<br />";

                $custom[$products[$i]] = $value;
            }
            echo "<br /><input type=\"submit\">";
        
    echo "</form>";
    ?>
</body>
</html>