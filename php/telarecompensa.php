<?php
session_start();
require 'recid.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Tijuca Verde | Recompensas</title>
<link rel="shortcut icon" type="image/x-icon" href="../imagens/favicon.png" style="width:10px; height:5px;" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/principal1.css">
<link rel="stylesheet" href="../css/avatar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
   </head>
<body>   
      
<div id="id06" class="modal">
  
  <form class="modal-content animate" action="recompensaform.php" method="post">
    <div class="imgcontainer">
     <a href="perfil.php"><i class="fa fa-arrow-left" >Fechar</i></a>
    </div>
   
    <div class="container5">

      <label for="tiposrecompensa"><b>Escolha o tipo da recompensa</b></label>
      <img src="../imagens/rosa.png" alt="Avatar" class="avatar" id="recss">
    <input type="radio" name="tiposrecompensa" value="Semente de rosa" title ="Semente de rosa" id="recss">
    <img src="../imagens/girassol.png" alt="Avatar" class="avatar" id="recss"> 
    <input type="radio" name="tiposrecompensa" value="Semente de girassol" title ="Semente de girassol" id="recss">
    <img src="../imagens/margarida.png" alt="Avatar" class="avatar" id="recss">
    <input type="radio" name="tiposrecompensa" value="Semente de margarida" title ="Semente de margarida" id="recss">
    <img src="../imagens/tulipa.PNG" alt="Avatar" class="avatar" id="recss">
    <input type="radio" name="tiposrecompensa" value="Semente de tulipa" title ="Semente de tulipa" id="recss">
    <img src="../imagens/vaso.png" alt="Avatar" class="avatar" id="recss">
	  <input type="radio" name="tiposrecompensa" value="Vaso de Planta" title ="Vaso de Planta" id="recss">	
        
      <button class="button1" type="submit">Enviar</button>
    </div>
  </form>
</div>

</body>
</html>
