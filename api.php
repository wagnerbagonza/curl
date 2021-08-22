<?php 

//echo "Olá mundo!";

echo "Método: ".$_SERVER['REQUEST_METHOD'] ."<br><br>";

//GET
$headers = getallheaders();
print_r($headers);


//TRATANDO JSON
$input = file_get_contents('php://input');
$array = json_decode($input,true);
$_POST = !empty($array) ? $array : $_POST;
//POST
print_r($_POST);

//DADO DE REQUISIÇÃO TESTE
$array = [
    'codigo'  => 200,
    'sucesso' => true
];
//CONVERTE ARRAY PARA JSON
echo json_encode($array);