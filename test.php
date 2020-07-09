<html>
    <head>
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



        <script>
        // num = 1;
        
        //     function showNum(num) {
        //         document.getElementById('h2').value = num;
        //         setValue(num);
        //     }

        //     function aumentarN(num) {
        //         num++;
        //         num > 5 ? num = 5:"";

        //         setValue(num);
        //     }

        //     function diminuirN() {
        //         num--;
        //         num < 0 ? num = 0 : "";

        //         setValue(num);
        //     }

        // setValue(num);

            var numero = 0;
            var id = "";

            console.log("Global: " + id);

            function less(newiD) {
                id = newiD;
                 numero = parseInt(document.getElementById(id).innerHTML);
                numero--;
                numero <= -1 ? numero = 0 : "" ;
                console.log("Local: " + id);
                // if (numero <= -1){
                //     numero = 0
                // }

                setValue(id, numero);
            }

            function more(newiD) {
                id = newiD;
                numero = parseInt(document.getElementById(id).innerHTML);
                numero++;
                numero >= 5 ? numero = 5 : "" ;
                console.log("Local: " + id);
                setValue(id, numero);
            }

            function setValue(id, value) {
                document.getElementById(id).innerHTML = value;
            }

            setValue(id, numero);
        </script>
    </head>
    <body>
        <!-- <input type="button" id="diminuiAcrescimo" value="-" onclick="diminuirN()">
        <h2 id="h2"></h2>
        <input type="button" id="aumentaAcrescimo" value="+" onclick="aumentarN()"> -->
        <?php 
            $id = "carne";
            $id2 = "pao";

            echo $id. "<br />";
        ?>

        <button type="button" id="menos" onclick="less('<?php print $id ?>')">
            
        <i class="fa fa-minus-circle"aria-hidden="true">-</i></button> &nbsp; 
        
        <b name="carne" id="<?php print $id ?>">3</b> &nbsp; 
        
        <button type="button" id="mais" onclick="more('<?php print $id ?>')">+<i class="fa fa-plus-circle" aria-hidden="true"></i></button>

        <button type="button" id="menos" onclick="less('<?php print $id2 ?>')">
            
            <i class="fa fa-minus-circle"aria-hidden="true">-</i></button> &nbsp; <b name="numero" id="<?php print $id2 ?>">2</b> &nbsp;
            
            <button type="button" id="mais" onclick="more('<?php print $id2 ?>')">+<i class="fa fa-plus-circle" aria-hidden="true"></i></button>

           
    </body>
</html>
