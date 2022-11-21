<?php
session_start();
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:../login.html');
  exit;
}

$camponome = 'Equipe TijucaVerde';
$campoemail='tijucaverdeofc@gmail.com';
$campoassunto = filter_input(INPUT_GET, 'assunto');
$campomenssagem = filter_input(INPUT_GET, 'menssagem');

require 'conexao.php';

$sql = "INSERT INTO contatos (assunto, menssagem, usuario_id) VALUES('$campoassunto', '$campomenssagem', '" . $_SESSION['id'] . "')";

if($conn->query($sql) === TRUE){
   header( "refresh:3;url=../index.php" );
     echo"Enviado" ; 

//Código reutilizável para enviar emails.
require 'enviaremailcontato.php';

//Conteúdo do email de validação
$texto = "ATENÇÃO Equipe Tijuca Verde<br> Um dos nossos usuários está precisando da nossa ajuda, vamos lá ver do que ele(a) precisa. <br><br>Mensagem:  " . $campomenssagem . " <br> Id do(a) usuário(a):  " . $_SESSION['id'] . "";

//Chamada da função no do código
enviaremail($camponome, $campoemail, $campoassunto, $texto, $campomenssagem);

} else {
//  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>