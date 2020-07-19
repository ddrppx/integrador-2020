    //Faz o acesso à API com o método
$.get("https://api.ipdata.co/?api-key=test", 
function (response) {
        //Retorna a resposta completa no HTML
    // $("#response").html(JSON.stringify(response, null, 4));

        //Verifica a geolocalização do navegador
    if ("geolocation" in navigator) {
        //Se 'true', retorna a cidade e região("SP, RJ") no html
        $("#geolocation").html(response.city + ", " + response.region_code + ".")
    } else {
        //Se 'false', retorna a cidade e região estática
        $("#geolocation").html("Espírito Santo, BR.");
    }

    console.log(response.city + ", " + response.region_code + ".");
}, "jsonp");

