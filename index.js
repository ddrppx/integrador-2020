
    // //Faz a 
    // var number = 0;
    // var id = "ab";

    // function less(x) {
    //     number--;
    //     number <= -1 ? number = 0 : "" ;

    //     id = x;       
    //     console.log(x); 
    //     setValue(number);
    // }

    // function more(x) {
    //     number++;
    //     number >= 5 ? number = 5 : "" ;

    //     id= x;
    //     setValue(number);
    // }

    // function setValue(value) {
    //     document.getElementById(showId()).value = value;
    // }

    // function showId(){
    //     return id;
    // }

    // function setId(x){
    //     id = x;
    // }
    // setValue(number);

    
    //Variaveis globais
    var numero = 0,
        id = "";

    console.log("Global: " + id);

    function less(newiD) {
        id = newiD;
        numero = parseInt(document.getElementById(id).innerHTML);
        numero--;
        numero <= -1 ? numero = 0 : "" ;
        console.log("Local: " + id);
        console.log(numero);
        
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

    //setValue(id, numero);