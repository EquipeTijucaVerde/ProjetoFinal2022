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
$campoassunto = 'Checagem do histórico';

require 'conexao.php';

//Código reutilizável para enviar emails.
require 'emailchecarhistorico.php';

//Conteúdo do email de validação
$texto = "ATENÇÃO Equipe Tijuca Verde<br><br>O usuário de ID " . $_SESSION['id'] . " está soliciando a checagem do seu histórico. <br> Verifiquem e se for o caso, resolvam o problema.";

//Chamada da função no do código
enviaremail($camponome, $campoemail, $campoassunto, $texto);

$conn->close();
?>