    //Pagina incicial
function iniciarPedido() {
    window.location.href = 'src/Pages/modo.php';
}

        //Envia o parametro do form pelo javascript(Sem precisar de acionar um botão)
    function send(newiD, newValue) {
        document.getElementById(newiD).value = newValue; //Muda o value do input
        submit(); //Realiza a ação de pressionar o botão Enviar
    }
