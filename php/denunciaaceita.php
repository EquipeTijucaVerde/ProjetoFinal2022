<?php
session_start(); 

require 'acessoadm.php';

$campoiddenuncia = filter_input(INPUT_GET, 'iddenuncia');
$campousuarioid = filter_input(INPUT_GET, 'usuarioid');
$campostatus = filter_input(INPUT_GET, 'status');

require 'conexao.php';


if($campostatus != "Aprovada"){

$sql1 = "UPDATE denuncias SET Status ='Aprovada' WHERE iddenuncia = $campoiddenuncia";
$sql3 = "UPDATE usuarios SET Recompensa_Id = Recompensa_Id + 1 WHERE id = $campousuarioid"; 

if ($conn->query($sql1) === TRUE){
  echo "Usuário bloqueado";
  include 'log.php';
  header('Location: denunciascontrolar.php');
} else {
  echo "Erro: " . $conn->error;
}

if ($conn->query($sql2) === TRUE){
  echo "Usuário bloqueado";
  include 'log.php';
  header('Location: denunciascontrolar.php');
} else {
  echo "Erro: " . $conn->error;
}

if ($conn->query($sql3) === TRUE){
  echo "Usuário bloqueado";
  include 'log.php';
  header('Location: denunciascontrolar.php');
} else {
  echo "Erro: " . $conn->error;
}



}else {
 header('refresh:3; url = denunciascontrolar.php');
 Echo"Essa denúncia já foi aprovada...";
}




$conn->close();

?> 