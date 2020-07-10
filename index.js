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