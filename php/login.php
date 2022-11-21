<?php
session_start();
if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = filter_input(INPUT_POST, 'email');
$camposenha = filter_input(INPUT_POST, 'senha');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuarios where email='$campoemail' and status='On'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();

        	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {
		
		$verificado = password_verify($camposenha, $row["Senha"]);
			if($verificado){
			//if($camposenha = $row["Senha"]){
			$_SESSION['recompensa_id']= $row["Recompensa_Id"];
				$_SESSION['nome']= $row["Nome"];
				$_SESSION['acesso'] = $row["Acesso"];
				$_SESSION['id'] = $row["Id"];
				$_SESSION['email'] = $row["Email"];	
				$_SESSION['imagem'] = $row["imagem"];	
				header('Location: ../index.php');
				exit;
			}else{
			  header( "refresh:2;url=../login.html" );
				exit;  
			}
	//Se a consulta não tiver resultados  			
	} else {
	    $campopopup = 1;
		header('Location:../login.html'); //Redireciona para o form
		exit; // Interrompe o Script
	}
//Se o usuário não usou o formulário
} else {
    header('Location:../login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

//Fecha a conexão.
$conn->close();
?> 