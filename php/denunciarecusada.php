 <?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'iddenuncia');
$camporecompensa = filter_input(INPUT_GET, 'recompensa');
$campostatus = filter_input(INPUT_GET, 'status');
 
//Faz a conexão com o BD.
require 'conexao.php';

if($campostatus!="Recusada"){

// Bloquear usuário o registro com o id
$sql1 = "UPDATE denuncias SET Status='Recusada' WHERE iddenuncia=$campoid";
$sql2 = "UPDATE denuncias SET Recompensa = 0 WHERE iddenuncia=$campoid";

if ($conn->query($sql1) === TRUE) {
  echo "Usuário bloqueado";
  
  include 'log.php';
  
   header('Location: denunciascontrolar.php');
} else {
  echo "Erro: " . $conn->error;
}

if ($conn->query($sql2) === TRUE) {
  echo "Usuário bloqueado";
  
  include 'log.php';
  
   header('Location: denunciascontrolar.php');
} else {
  echo "Erro: " . $conn->error;
}

}else {
  header('refresh:3; url = denunciascontrolar.php');
  Echo"Essa denúncia já foi recusada...";
}




$conn->close();

?> 