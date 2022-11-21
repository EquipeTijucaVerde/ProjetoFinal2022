<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios WHERE Id = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="/css/form2.css">
        <link rel="stylesheet" href="/css/topnav2.css">
		<link rel="stylesheet" href="/css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="/imagens/favicon.png" style="width=10px; height:5px;" />
        <title>Editar Usuário</title>
        <style>
    body {
background: #9053c7;
  background: -webkit-linear-gradient(-135deg, #002424, #004848, #031420);
  background: -o-linear-gradient(-135deg, #002424, #004848, #031420);
  background: -moz-linear-gradient(-135deg, #002424, #004848, #031420);
  background: linear-gradient(-135deg, #002424, #004848, #031420);
  
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
 
  
        }
        </style>
    </head>
    <body>
<ul>
  <li><a href="/index.php">Tela Principal</a></li>

<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){

		echo "<li><a href='usuarioscontrolar.php?pag=1'>Controlar Usuário</a></li>";
		echo "<li><a href='denunciascontrolar.php'>Controlar Denuncias</a></li>";
		echo "<li><a href='admincadastrar1.php'>Cadastrar Usuário</a></li>";
		echo "<li><a href='grafico.php'>Grafico</a></li>";
}  
?>
</ul>
        <form action="usuarioeditar.php" method="post">
		
			<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../imagens/logo.png); background-size: 100% 100%;">
			      </div>
						<div class="login-wrap p-4 p-md-5">
						
		             <h3>Editar Usuário Id: <?php echo $row["Id"]; ?></h3>
	                    <input type="hidden" name="id" value="<?php echo $row["Id"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome..." required>		
            <input type="email" name="email" value="<?php echo $row["Email"]; ?>" placeholder="Seu e-mail..." required>	     
        <?php if ($row["Acesso"]=="Admin"){ ?>
            <input type="radio" name="acesso" value="Comum" title="Usuario Comum" required><label>..</label>
            <input type="radio" name="acesso" value="Admin" title="Administrador" checked="true">        
        <?php }else{ ?>
            <input type="radio" name="acesso" value="Comum" required checked="true"><label>..</label>
            <input type="radio" name="acesso" value="Admin">        
        <?php } ?>      
            <input type="submit" value="Editar">
	                  
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
	
//Se o usuário não tem acesso.
} else {
    header('Location: ../index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 