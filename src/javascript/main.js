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

function voltarInicio() {
    window.location.assign("../../index.php");
}
function voltarPreparo() {
    window.location.assign("preparo.php");
}
function voltarPagamento() {
    window.location.assign("pagamento.php");
}