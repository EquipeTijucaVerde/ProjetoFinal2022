<?php

//Faz a conexão com o BD.
require 'conexao.php';

//Conta a quantidade total de registros por acesso
$sql = "SELECT * FROM mapa";

//Executa o SQL
$result = $conn->query($sql);

$dados2=array();

//Monta os dados
while($row = $result->fetch_assoc()) {
	array_push($dados2, $row["Nome"], $row["Endereco"]);
	
}

//Cria retorno de dados com status.
$retorna2 = ['status' => true, 'dados2' => $dados2];

//Transforma em json. O arquivo só pode ter um echo.
//O JS lerá esse echo	
echo json_encode($retorna2);

//Fecha a conexão.	
$conn->close();
	
?>