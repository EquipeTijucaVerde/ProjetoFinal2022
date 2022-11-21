<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<title>Tijuca Verde | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="../imagens/favicon.png" style="width=10px; height:5px;" />
	<link rel="stylesheet" href="../css/form2.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/menu.css">	
	<link rel="stylesheet" href="../css/topnav3.css">
	
	
<style>
body {
background: #9053c7;
  background: -webkit-linear-gradient(-135deg, #54f35dba, #2db135, #248d2a);
  background: -o-linear-gradient(-135deg, #54f35dba, #2db135, #248d2a);
  background: -moz-linear-gradient(-135deg, #54f35dba, #2db135, #248d2a0);
  background: linear-gradient(-135deg, #54f35dba, #2db135, #248d2a);
  
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

</style>
	</head>
	<body>
<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>


	<section class="ftco-section">
		<div class="container">			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(/imagens/logo.png); background-size: 100% 100%;">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			   
						<form action="admincadastrarcodigo.php" method="post">
						<h3 class ="text-center" >CADASTRE-SE NO<br>TIJUCA VERDE</h3>
					
							<input type="text" name="nome" placeholder="Seu nome..." required>		
							<input type="email" name="email" placeholder="Seu e-mail..."title ="Insira um email válido"required>
							<input type="password" name="senha" placeholder="Sua senha..." pattern=".{6,}" title ="A senha deve conter no mínimo seis caracteres" required>	
							<input type="radio" name="acesso" value="Comum" title ="Usuario comum" required><label>..</label>	
							<input type="radio" name="acesso" value="Admin" title ="Administrador">	
							<input type="submit" value="Concluir">
						</form>
				   
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	</body>
</html>

<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não usou o formulário
} else {
    header('Location: ../index.php'); //Redireciona para o form
    exit; // Interrompe o Script
}
?>