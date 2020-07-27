    //Variáveis globais
    var numero = 0,
        id = "";    
        //Parametro = ID do elemento html
    function less(newiD) {
        id = newiD; 
        numero = parseInt(document.getElementById(id).innerHTML); //Irá armazenar o valor atual que está no campo
        numero--; //Decrementa o valor
        numero <= -1 ? numero = 0 : "" ; //Impede que o valor no campo seja menor que 0
        
        setValue(id, numero); //Troca o valor do campo para o novo valor
    }

    function more(newiD) {
        id = newiD; //Acrescenta o valor
        numero = parseInt(document.getElementById(id).innerHTML); //Irá armazenar o valor atual que está no campo
        numero++; //Acrescenta o valor
        numero >= 5 ? numero = 5 : "" ; //Impede que o valor seja maior que 5

        setValue(id, numero); //Troca o valor do campo para o novo valor
    }
        //Método para trocar o valor do campo (Parametros ID do campo e Novo valor)
    function setValue(id, value) { 
        document.getElementById(id).innerHTML = value;
    }