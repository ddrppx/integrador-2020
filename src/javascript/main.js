    //Pagina incicial
function iniciarPedido() {
    window.location.href = 'src/Pages/preparo.php';
}
        //Envia o parametro do form pelo javascript(Sem precisar de acionar um botão)
function sendSubmit(newiD, newValue) {
    let form = document.getElementById(newiD);
    form.value = newValue; //Muda o value do input
    document.form.submit();
    //Realiza a ação de pressionar o botão Enviar
    console.log(newValue);
}

function escolherProduto(newiD, newValue) {
    let input = document.getElementById(newiD);
    input.value = newValue; //Muda o value do input
    let form = document.getElementById('form-produtos');
    form.submit();
    //Realiza a ação de pressionar o botão Enviar
    console.log(newValue);
}

function selecionarCat(x) {
    const selectDiv = document.querySelector('#cards_container');
    let items = '';
    switch (x) {
        case '1':
            
            break;
        case '2':
            
            break;
        case "3":
            
            break;
       
        default:
            break;
    }

    selectDiv.innerHTML = items;
}

    //Método de requisição no banco de dados ( https://www.youtube.com/watch?v=NN0hGn2Vbu4 )
/*function buscar(palavra) {
    //O método $.ajax(); é o responsável pela requisição
    $.ajax({
        //Configurações
            type: 'POST',//Método que está sendo utilizado.
            dataType: 'html',//É o tipo de dado que a página vai retornar.
            url: 'busca.php',//Indica a página que está sendo solicitada.
            //função que vai ser executada assim que a requisição for enviada
            beforeSend: function () {
            $("#dados").html("Carregando...");
        },
        data: {palavra: palavra},//Dados para consulta
        //função que será executada quando a solicitação for finalizada.
        success: function (msg) {
            $("#dados").html(msg);
        }
    });
}
            
            
    $('#').click(function () {
        buscar($("#palavra").val())
    }); */