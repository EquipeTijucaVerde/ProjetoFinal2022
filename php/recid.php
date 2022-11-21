<?php
require 'conexao.php';
//1-Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:../login.html');
  exit;
}else{
//2-Verifica se tem acesso a recompensa
	if($_SESSION['recompensa_id'] != 4){
		    header('refresh:4;url=perfil.php'); 
        echo "Sem acesso...";
			exit;
	}
}
?>