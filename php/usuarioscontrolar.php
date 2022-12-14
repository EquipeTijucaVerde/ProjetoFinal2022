<?php
session_start();

require 'acessoadm.php';
//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';



//Lê a página que será exibida
$id = $_GET["pag"];

//Quantidade de registros a serem exibidos
$total = 6;

//Indica o registro limite para paginação
if($id!=1){
    $id = $id -1;
    $id = $id * $total + 1;
}

$id--;

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM usuarios ORDER BY id LIMIT $id, $total";

//Conta a quantidade total de registros
$sql1 = "SELECT count(*) as contagem FROM usuarios";

//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//Recupera o resultado da contagem
$row1 = $result1->fetch_assoc();
$contagem = $row1["contagem"];

if($contagem%$total==0){
    $contagem=$contagem/$total;
}else{
    $contagem=$contagem/$total + 1;    
}

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Controlar Usuarios</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="/imagens/favicon.png" style="width:10px; height:5px;" />

<link rel="stylesheet" href="../css/tabela.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/topnav3.css">
<link rel="stylesheet" href="../css/padrao.css">
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid black; 
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color:  #70EF49;}
</style>
</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">
 

			<h1>Usuários do Tijuca Verde</h1>
			<table>
<tr><th>Id</th><th>Denúncias aceitas</th><th>Nome</th><th>Email</th><th>Acesso</th><th>Status</th><th colspan="3">Ações</td></tr>
				
	<?php
	//Recompensa...

	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Recompensa_Id"] . "</td><td>" . $row["Nome"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Acesso"] . "</td><td>" . $row["Status"] . "</td>";
		echo "<td><a href='usuariodesbloquear.php?id=" . $row["Id"] . "&status=" . $row["Status"] ."'><img src='../imagens/aceito.png' alt='Denuncia aceita' height='50px'></a></td>
<td><a href='usuariobloquear.php?id=" . $row["Id"] . "&status=" . $row["Status"] ."'><img src='../imagens/recusado.png' alt='Denuncia recusada' height='50px'></a></td><td><a href='usuarioeditarform.php?id=" . $row["Id"] . "'><img src='../imagens/editar.png' alt='Editar Usuário'></a></td></tr>";
	  }
	?>
				
			</table>
</div>

<div class="pagination">
    <?php for($i=1; $i <= $contagem; $i++) {
            echo "<a href='usuarioscontrolar.php?pag=$i'>$i</a>";
    } 
	?>   
</div>  
            <a href="admincadastrar1.php"><img src="../imagens/incluir.png" alt="Incluir Usuário"></a>
    </div>

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