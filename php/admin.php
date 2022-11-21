<html>
<head>
<title>Login</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
<?php
session_start();
//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){
?>
	<form action="/php/usuariocadastrarcodigo.php" method="post">
	<h3>Cadastrar Usuários</h3>
	<input type="text" name="nome" placeholder="Seu nome..." required>		
	<input type="text" name="email" placeholder="Seu e-mail..." required>
	<input type="password" name="senha" placeholder="Sua senha..." required>		
	<input type="radio" name="acesso" value="Comum" required><label>Comum</label>
	<input type="radio" name="acesso" value="Admin"><label>Admin</label>	
	<input type="submit" value="Enviar">
	</form>
<?php
}else{
	echo "Você não tem acesso a esta função.";
}
?>
</body>
</html>