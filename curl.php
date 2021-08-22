<?php
//INICIA O CURL
$curl = curl_init();

//CONFIGURAÇÔES CURL
//QUAL METODO HTTP GET POST ...
//URL ENDPOINT
curl_setopt($curl, CURLOPT_URL,"http://localhost/curl/api.php");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'GET');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);


$headers = [
    'Autorization: Beer 121212121',
    'Content-Type: application/json'
];
//GET
//MANEIRA MAIS SIMPLIFICADA
//CURLOPT_HTTPHEADER PASSA HEADERS NA REQUISIÇÃO, PODE PASSAR ARRAY
curl_setopt_array($curl, [
    CURLOPT_URL            => "http://localhost/curl/api.php",
    CURLOPT_CUSTOMREQUEST  => 'GET',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => $headers
]);

//ARRAY POST
$post = [
    'nome'  => 'Bagonza',
    'idade' => 12
];

//POST JSON CASO A API RECEBA JSON
//INFORMAR NO HEADERS CONTENT TYPE JSON
//'Content-Type: application/json'
//ALTERAR NO  curl_setopt_array PARA CURLOPT_POSTFIELDS     => $json
$json = json_encode($post);

//POST
curl_setopt_array($curl, [
    CURLOPT_URL            => "http://localhost/curl/api.php",
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_POSTFIELDS     => $post
]);

//EXECUTA A REQUISIÇÂO
$response = curl_exec($curl);

//FECHA CONEXÃO
curl_close($curl);

//PRINT RESPONSE SE JSON
$array = json_decode($response);
 
//PRINT RESPONDE SE ARRAY
print_r($array);
