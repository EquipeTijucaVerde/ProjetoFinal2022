<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Dados do formulário
$campoid_usuario = $_POST["id_usuario"];
$campoiddenuncia = $_POST["iddenuncia"];
$campolocaldenuncia = $_POST["localdenuncia"];
$campodescricao = $_POST["descricao"];
$campostatus = $_POST["status"];

//Faz a conexão com o BD.
require 'conexao.php';
require 'recompensacont.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE denuncias SET iddenuncia='" . $camponome . "', localdenuncia='" . $campolocaldenuncia . "', descricao='" . $campodescricao  . "', status='" . $campostatus  . "' WHERE id_usuario=" . $campoid_usuario;

include 'logadmin.php';

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: denunciascontrolar.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: /index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 