<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:../login.html');
  exit;
}else{
//Verifica se o acesso é Admin
	if($_SESSION['acesso']!="Admin"){
		    header('location:../index.php'); //Redireciona para o form
			exit; // Interrompe o Script
	}
}
?>