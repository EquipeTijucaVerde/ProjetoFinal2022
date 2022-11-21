<?php
session_start();

//Dados do formulário
$campoemail = filter_input(INPUT_GET, 'id');
$validador = filter_input(INPUT_GET, 'validador');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuarios SET Status='On' WHERE status='Aguardando' and email='" . $campoemail . "' and validador=" . $validador;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
 header( "refresh:2;url=../login.html");
 echo "Registro atualizado.";
  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?> 