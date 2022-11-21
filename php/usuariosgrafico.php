<?php

//Faz a conexão com o BD.
require 'conexao.php';

//Conta a quantidade total de registros por acesso
$sql = "SELECT count(*) as Outra FROM denuncias WHERE Tipodenuncia='Outros'";
$sql2 = "SELECT count(*) as Bueiros FROM denuncias WHERE Tipodenuncia='Bueiro entupido'";
$sql3 = "SELECT count(*) as Animais FROM denuncias WHERE Tipodenuncia='Maus Tratos aos Animais'";
$sql4 = "SELECT count(*) as Incêndio FROM denuncias WHERE Tipodenuncia='Focos de Incêndio'";
$sql5 = "SELECT count(*) as Lixo FROM denuncias WHERE Tipodenuncia='Lixo Despejado de Forma Irregular'";



//Executa o SQL
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);


//Prepara as contagens
$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();	
$row4 = $result4->fetch_assoc();
$row5 = $result5->fetch_assoc();


//Monta os dados
$dados = [$row["Outra"], $row2["Bueiros"], $row3["Animais"], $row4["Incêndio"], $row5["Lixo"]];

//Cria retorno de dados com status.
$retorna = ['dados' => $dados];

//Transforma em json. O arquivo só pode ter um echo.
//O JS lerá esse echo	
echo json_encode($retorna);

//Fecha a conexão.	
$conn->close();
	
?>