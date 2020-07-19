
$.get("https://api.ipdata.co/?api-key=test", 
function (response) {
    $("#response").html(JSON.stringify(response, null, 4));
}, "jsonp");

var $xml = $(response);
var city = $xml.find('city').text();
var region = $xml.find('region_code').text();

console.log($xml.find('region_code'));
console.log(city, region);