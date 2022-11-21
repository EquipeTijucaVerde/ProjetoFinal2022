<?php
session_start();
if($_SESSION['acesso']=="Admin"){

// Dados do Formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
$campoacesso = $_POST["acesso"];

//Faz a conexão com o BD.
require 'conexao.php';
//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(nome, email, senha, acesso, status, validador) VALUES('$camponome', '$campoemail', '$camposenha', '$campoacesso','On', $validador)";

include 'logadmin.php';

//Executa o SQL
if ($conn->query($sql) === TRUE) {
  header( "refresh:2;url=usuarioscontrolar.php?pag=1" );
   echo "Gravado com sucesso.";
} else {
  header( "refresh:5;url=usuarioscontrolar.php?pag=1" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
 
}else{
    header('Location: ../login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?>