<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Tijuca Verde | Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.png" style="width=10px; height:5px;" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/form2.css">
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
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(imagens/logo.png); background-size: 100% 100%;">
			      </div>
						<div class="login-wrap p-4 p-md-5 telalogin">
			 
		<form action="/php/usuariocadastrarcodigo.php" method="post">
			<h3 class ="text-center">CADASTRE-SE NO<br>TIJUCA VERDE</h3>
			
			<input type="text" name="nome" placeholder="Seu nome..." required>
			
			<input type="email" name="email" placeholder="Seu e-mail..."title ="Insira um email válido" required>
			
		<input type="password" name="senha" placeholder="Sua senha..." pattern=".{6,}" title="A senha deve conter no mínimo seis caracteres" required>	
			
		    <input type="submit" value ="Enviar">
						</form>
		           <p><a class ="text-center" href="login.html">Iniciar Sessão</a></p>
		        </div>
		      </div>
				</div>
			</div>
		 </div>
	</section>
	</body>
</html>

