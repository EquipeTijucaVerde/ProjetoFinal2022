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
$campoassunto = 'Recompensa';
$campotiposrecompensa = filter_input(INPUT_POST, 'tiposrecompensa');


require 'conexao.php';

$sql1 = "INSERT INTO recompensas (tiposrecompensa, usuario_id) VALUES('$campotiposrecompensa', '" . $_SESSION['id'] . "')";


if($conn->query($sql1) === TRUE){
   header( "refresh:3;url=../index.php" );
     echo"";
     
$sql2 = "UPDATE usuarios SET Recompensa_Id = 0 WHERE id = ". $_SESSION['id'] .""; 


//Código reutilizável para enviar emails.
require 'emailsolicitarrecompensa.php';

//Conteúdo do email de validação
$texto = "ATENÇÃO Equipe Tijuca Verde<br><br>O usuário de ID " . $_SESSION['id'] . " está soliciando a recompensa " . $campotiposrecompensa . ". Verifiquem e se for o caso, enviem.";

//Chamada da função no do código
enviaremail($camponome, $campoemail, $campoassunto, $texto, $campotiposrecompensa);

if ($conn->query($sql2) === TRUE){
  echo "Usuário bloqueado";
  include 'log.php';
  header('Location: perfil.php');
} else {
  echo "Erro: " . $conn->error;
}

} else {
//  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>