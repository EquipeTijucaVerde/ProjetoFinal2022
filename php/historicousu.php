<?php
session_start();

require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM denuncias ORDER BY Status WHERE Usuario_Id = '" . $_SESSION['id'] . "'  ";


//Executa o SQL
$result = $conn->query($sql);


//Se a consulta tiver resultados
if ($result->num_rows > 0) {
?>
<html lang="pt-br">
<head>
<title>Controlar Denuncias</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="content">

<h1>Seu histórico de Denúncias</h1>
			<table id="myTable">
<tr><th>Iddenuncia</th><th>Usuario_Id</th><th>Tipodenuncia</th><th>Localdenuncia</th><th>Descricao</th><th>Status</th></tr>

<?php
  while($row = $result->fetch_assoc()) {

echo "<tr><td>" . $row["Iddenuncia"] . "</td><td>" . $row["Usuario_Id"] . "</td><td>" . $row["Tipodenuncia"] . "</td><td>" . $row["Localdenuncia"] . "</td><td>" . $row["Descricao"] . "</td><td>" . $row["Status"] . "</td></tr>";
}
?>

</table>
</div>
<?php
//Se a consulta não tiver resultados  	
} else {
     header( "refresh:4;url=../index.php" );	
echo "<h1>Sem denúncias no momento...</h1>";
}

//Fecha a conexão.	
$conn->close();

//Se o usuário não usou o formu
?>