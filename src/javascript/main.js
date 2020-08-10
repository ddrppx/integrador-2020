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

    //Diminui a quantidade do item no carrinho
function aumentarQtd(type, id){
    window.location.assign(`carrinho.php?carrinho=1&type=${type}&id=${id}`);
}

    //Diminui a quantidade do item no carrinho
function diminuirQtd(type, id){
    window.location.assign(`carrinho.php?diminuir=1&type=${type}&id=${id}`);
}

function confirmar(x){
    window.location.assign(`checkout.php?finalizar=${x}`);
}

    //Remove o item do carrinho
function removerProd(type, id) {
    window.location.assign(`carrinho.php?remover=1&type=${type}&id=${id}`);
}
    //Volta da pagina preparo para o início
function voltarInicio() {
    window.location.assign("../../index.php");
}

    //Volta da pagina pagamento para preparo
function voltarPreparo() {
    window.location.assign("preparo.php");
}
    //Volta da pagina pedido para pagamento
function voltarPagamento() {
    window.location.assign("pagamento.php");
}