<html>
    <head>
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


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

        var minutes = 25,
            seconds = 0,
            isPaused = true,
            timerId = 0,
            remainingTime,
            countdownHandle;


        $(function(x) { // on page load
        $('.plus').on('click', function(){
            minutes++;
            $('.value').html(minutes);
        });

        $('.minus').on('click', function(){
            minutes--;
            $('.value').html(minutes);
        });
        });
        </script>
    </head>
    <body>
        <!-- <input type="button" id="diminuiAcrescimo" value="-" onclick="diminuirN()">
        <h2 id="h2"></h2>
        <input type="button" id="aumentaAcrescimo" value="+" onclick="aumentarN()"> -->

<div class="control-wrapper" id="session">
    <div class="control-header">SESSION LENGTH</div>
        <div class="control">
          <button class="plus">  +  </button> &nbsp; 
          <h2 class="value">1</h2>
          <button class="minus">  -  </div>
    </div>
    
    <div class="control-header">SESSION LENGTH</div>
        <div class="control">
          <button class="plus">  +  </button> &nbsp; 
          <h2 class="value">1</h2>
          <button class="minus">  -  </div>
    </div>

    <div class="control-header">SESSION LENGTH</div>
        <div class="control">
          <button class="plus">  +  </button> &nbsp; 
          <h2 class="value">1</h2>
          <button class="minus">  -  </div>
    </div>

           
    </body>
</html>
