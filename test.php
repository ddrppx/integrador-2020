<?php
if ($_POST) {
    $teste = $_POST['teste2'];
    echo "PEGUEI O VALOR: $teste";
}
?>
<form action="" method="POST" id="formteste">
    <input type="hidden" value="" id="teste" name="teste">
    <input type="text" value="" id="teste2" name="teste2">
    <input type="submit" value="Enviar">
</form>
<script>
    var x = "testando";
    document.getElementById("teste").value = x;
</script>