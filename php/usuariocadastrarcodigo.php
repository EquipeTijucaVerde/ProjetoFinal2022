<?php
session_start();
// Dados do Formulário
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'Comum');
$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

//Faz a conexão com o BD.
require 'conexao.php';

//Verifica email duplicado e retorna erro.
$sql = "select * from usuarios where Email='$campoemail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	header("Location: ../usuariocadastrartela.php?erro=1");
	exit;	
}
//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(nome, email, senha, acesso, status, validador, imagem, Recompensa_id) VALUES('$camponome', '$campoemail', '$camposenha', 'Comum', 'Aguardando', '$validador', 'Aguardando','0')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:4;url=../login.html" );	
  echo "Gravado com sucesso. Por favor, olhe o seu email,<br>se não encontrar o email de verificação, olhe sua caixa de spam</br>";

//Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de validação
$texto = "tijucaverdeofc.000webhostapp.com/php/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador;

enviaremail($camponome, $campoemail, 'Validar conta', $texto);

} else {
  header( "url=..login.html" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>