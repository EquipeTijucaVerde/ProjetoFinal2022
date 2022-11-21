<?php
// Parâmetros para criar a conexão
$servername="localhost";
$username="id19236510_tijucaverde2022";
$password="_4hZ11FvvX@@^zo5";
$dbname="id19236510_tijucaverde";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Você se deu mal: " . $conn->connect_error);
}
?>