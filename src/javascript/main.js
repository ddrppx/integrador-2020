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

function selecionarCat(x) {
    const selectDiv = document.querySelector('#cards_container');
    let items = '';
    switch (x) {
        case '1':
            for(i = 0; i < 3; i++){
                items += `
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title">Lanche ${i + 1}</h5>
                    </div>
                    <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                </div>
                
                `;
            }
            break;
        case '2':
            for(i = 0; i < 3; i++){
                items += `
                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamento ${i + 1}</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="110px" width="110px" alt="Card image cap">
                    </div>
                `;
            }
            break;
        case "3":
            for(i = 0; i < 3; i++){
                items += `
                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Bebida ${i + 1}</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/bebidas.svg" height="110px" width="110px" alt="Card image cap">
                    </div>
                `;
            }
            break;
        case '4':
            for(i = 0; i < 3; i++){
                items += `
                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Sobremesa ${i + 1}</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
                    </div>
                `;
            }
            break;
        case '5':
            for(i = 0; i < 3; i++){
                items += `
                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Prato ${i + 1}</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/pratos.svg" height="110px" width="110px" alt="Card image cap">
                    </div>
                    `;
                }
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