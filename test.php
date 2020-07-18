
<html>
    <head>
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



        <script>
            //
        function enviar(newiD, newValue) {
            document.getElementById(newiD).value = newValue;
            submit();
        }

        function teste() {
            console.log("Clickity click");
        }

        function executar(name) {
            let div = document.getElementById('lanches');
        
            // div.innerHTML = " $pedido -> addProduto(`{name}`); ";
        }
        
        </script>
    </head>
    <body>
        <?php 

        $clausules = [
            'where' => [
                'instruction' => 'WHERE',
                'separator' => ' ',
            ],
            'group' => [
                'instruction' => 'GROUP BY',
                'separator' => ', ',
            ],
            'order' => [
                'instruction' => 'ORDER BY',
                'separator' => ', ',
            ],
            'having' => [
                'instruction' => 'HAVING',
                'separator' => ' AND ',
            ],
            'limit' => [
                'instruction' => 'LIMIT',
                'separator' => ',',
            ],
        ];

        print_r($clausules);

        echo "<br/>";

        foreach($clausules as $key => $clausule) {
            if (isset($clausules[$key])) {
                $value = $clausules[$key];
                print_r($value);
                if (is_array($value)) {
                    $value = implode($clausule['separator'], $clausules[$key]);
                }
                $command[] = $clausule['instruction'] . ' ' . $value;
            }
        }

        echo $value;

        ?>
    </body>
</html>
