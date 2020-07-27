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
