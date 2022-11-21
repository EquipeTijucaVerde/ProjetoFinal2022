<?php
session_start();

require 'acessoadm.php';
//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM denuncias ORDER BY iddenuncia";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Controlar Denuncias</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/imagens/favicon.png" style="width:10px; height:5px;" />
<link rel="stylesheet" href="../css/grafico.css">
<link rel="stylesheet" href="../css/topnav3.css">

</head>
<body>
<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>
<div class="grafico">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="../scripts/usuariosgrafico.js"></script>

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
    header('Location: ../login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?> 