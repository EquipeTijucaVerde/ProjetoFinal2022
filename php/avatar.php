<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:../login.html');
  exit;
}

 $arquivo = $_FILES["imagem"]['name'];
  $diretorio = "../imagens/";

 if (move_uploaded_file($_FILES["imagem"]['tmp_name'], $diretorio.$arquivo)){
      echo "Arquivo enviado com sucesso :)";
      
} else {
    echo "Fudeu meu nobre :(";
  }
 
// Dados do Formulário
 $dir = "../imagens";
  //Recebe o arquivo do formulário
  $imagem = $_FILES["imagem"];

  $imagem_name = "$dir/".$imagem["name"];
 
 if (move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem_name)){
      echo "Arquivo enviado com sucesso :)";
      
} else {
    echo "";
  }
 
//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "UPDATE usuarios SET nome='" . $_SESSION['nome'] . "', imagem='" . $imagem_name  . "' WHERE id=" . $_SESSION['id'];


 if($conn->query($sql) === TRUE){
     
      header( "url=perfil.php" );
     echo"Perfil Atualizado"; 
 } else {
    header(";url=../perfil.php"); //Redireciona para o form
    echo "Errooooooor" . $sql . "<br>" . $conn->error;
}
//Fecha a conexão.
$conn->close();
?> 