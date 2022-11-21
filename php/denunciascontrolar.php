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
$sql = "SELECT * FROM denuncias ORDER BY Status  ";


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

<link rel="stylesheet" href="../css/tabela.css">
<link rel="stylesheet" href="../css/topnav3.css">
<link rel="stylesheet" href="../css/padrao.css">

<script src="../scripts/filtrar.js"></script>

</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">


<h1>Denuncias do Tijuca Verde</h1>
	
	        <input type="text" id="filtrarid" onkeyup="filtrar('filtrarid', 1)" placeholder="🔎 Busca de Usuário">
			<input type="text" id="filtrarnomes" onkeyup="filtrar('filtrarnomes', 2)" placeholder="🔎 Busca do TipoDenúncia">
			<input type="text" id="filtraremails" onkeyup="filtrar('filtraremails', 3)" placeholder="🔎 Busca do LocalDenúncia">
			
			<table id="myTable">
<tr><th>Iddenuncia</th><th>Usuario_Id</th><th>Tipodenuncia</th><th>Localdenuncia</th><th>Descricao</th><th>Status</th><th colspan="6">Ações</th></tr>

<?php
  while($row = $result->fetch_assoc()) {
	                if($row["Status"]=="inativo"){
	          echo "<tr style='background-color:pink'>";
	      }else{
	          echo "<tr>";
	      }
     
     
     
     
echo "<tr><td>" . $row["Iddenuncia"] . "</td><td>" . $row["Usuario_Id"] . "</td><td>" . $row["Tipodenuncia"] . "</td><td>" . $row["Localdenuncia"] . "</td><td>" . $row["Descricao"] . "</td><td>" . $row["Status"] . "</td>";
echo "<td><a href='denunciaaceita.php?iddenuncia=" . $row["Iddenuncia"] . "&status=" . $row["Status"] ."&usuarioid=" . $row["Usuario_Id"] ."'><img src='../imagens/aceito.png' alt='Denuncia aceita' height='50px'></a></td>
<td><a href='denunciarecusada.php?iddenuncia=" . $row["Iddenuncia"] . "&status=" . $row["Status"] ."'><img src='../imagens/recusado.png' alt='Denuncia recusada' height='50px'></a></td>
<td><a href='enviaremailprefeitura.php?localdenuncia=" . $row["Localdenuncia"] ."&descricao=". $row["Descricao"] ."&status=" . $row["Status"] ."'><img src='../imagens/prefeitura2.png' alt='Denuncia recusada' height='50px'></a></td>
<td><a href='enviaremailcomlurb.php?localdenuncia=" . $row["Localdenuncia"] ."&descricao=". $row["Descricao"] ."&status=" . $row["Status"] ."'><img src='../imagens/reciclagem.png' alt='Denuncia recusada' height='50px'></a></td>
<td><a href='enviaremailbombeiro.php?localdenuncia=" . $row["Localdenuncia"] ."&descricao=". $row["Descricao"] ."&status=" . $row["Status"] ."'><img src='../imagens/bombeiros.png' alt='Denuncia recusada' height='50px'></a></td>
<td><a href='enviaremailpolicia.php?localdenuncia=" . $row["Localdenuncia"] ."&descricao=". $row["Descricao"] ."&status=" . $row["Status"] ."'><img src='../imagens/policia.png' alt='Denuncia recusada' height='50px'></a></td></tr>";
}
?>

</table>
</div>


</body>
</html>
<?php
//Se a consulta não tiver resultados  	
} else {
     header( "refresh:4;url=../index.php" );	
echo "<h1>Sem denúncias no momento...</h1>";
}

//Fecha a conexão.	
$conn->close();

//Se o usuário não usou o formulário
} else {
    header('Location: ../login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?>