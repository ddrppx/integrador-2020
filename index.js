    //Variáveis globais
    var numero = 0,
        id = "";

    console.log("Global: " + id); //Checando valores
    
        //Parametro = ID do elemento html
    function less(newiD) {
        id = newiD; 
        numero = parseInt(document.getElementById(id).value); //Irá armazenar o valor atual que está no campo
        numero--; //Decrementa o valor
        numero <= -1 ? numero = 0 : "" ; //Impede que o valor no campo seja menor que 0
        console.log("Local: " + id);
        console.log(numero);
        
        setValue(id, numero); //Troca o valor do campo para o novo valor
    }

    function more(newiD) {
        id = newiD; //Acrescenta o valor
        numero = parseInt(document.getElementById(id).value); //Irá armazenar o valor atual que está no campo
        numero++; //Acrescenta o valor
        numero >= 5 ? numero = 5 : "" ; //Impede que o valor seja maior que 5
        console.log("Local: " + id);
        setValue(id, numero); //Troca o valor do campo para o novo valor
    }
        //Método para trocar o valor do campo (Parametros ID do campo e Novo valor)
    function setValue(id, value) { 
        document.getElementById(id).value = value;
    }
        //Envia o parametro do form pelo javascript(Sem precisar de acionar um botão)
    function send(newiD, newValue) {
        document.getElementById(newiD).value = newValue; //Muda o value do input
        submit(); //Realiza a ação de pressionar o botão Enviar
    }

    function executar(name) {
        let div = document.getElementById('lanches');
    
        div.innerHTML = `<?php $pedido -> addProduto(${name}); ?>`;

        console.log("Executar, done.");
    }

