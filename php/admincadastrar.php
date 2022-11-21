<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location: /php/principal.php');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
?>
<html>
<head>
<title>Tijuca Verde | Cadastro</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/form2.css">
<link rel="stylesheet" href="/css/topnav.css">
<link rel="shortcut icon" type="image/x-icon" href="/imagens/logo.png" style="width=10px; height:5px;" />
</head>
<style>
    body {
  background-image: url("/imagens/papelDeParede1.jpg");
  background-size: 1366px 768px;
  
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

</style>
<body>
<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
<?php
if($_SESSION['acesso']=="Admin"){
?>
    
	<form action="usuariocadastrarcodigo.php" method="post">
	<h3>Cadastrar Usuários</h3>
	<input type="text" name="nome" placeholder="Seu nome..." required>		
	<input type="email" name="email" placeholder="Seu e-mail..." required>
	<input type="password" name="senha" placeholder="Sua senha..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A senha deve conter pelo menos um caracter maiúsculo, um minúsculo, um número e no mínimo oito caracteres" required>		
	<input type="radio" name="acesso" value="Comum" required><label>Comum</label>
	<input type="radio" name="acesso" value="Admin"><label>Admin</label>	
	<input type="submit" value="Enviar">
	</form>
<?php
}else{
    header('Location: /index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?>
</body>
</html>