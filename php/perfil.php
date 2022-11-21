<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location: ../login.html');
  exit;
}

   //Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM denuncias WHERE Usuario_Id = " . $_SESSION['id'] . " ORDER BY Status";


//Executa o SQL
$result = $conn->query($sql);


//Se a consulta tiver resultados

?>
<!DOCTYPE html>
<html>
<head>
<title>Tijuca Verde | Perfil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="../imagens/favicon.png" style="width:10px; height:5px;" />
<link rel="stylesheet" href="../css/principal1.css">
<link rel="stylesheet" href="../css/historico.css">
<link rel="stylesheet" href="../css/padrao.css">
<link rel="stylesheet" href="../css/denunciaform.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-white.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

li a, .dropbtn {
  display: inline-block;
  color: black;
  text-align: center;
  padding: 14px 19px;
  text-decoration: none;
}
.w3-large {
    background:#FAEBE0;
    font-size: 16px!important;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color:#FAEBE0;
}
html, body {
    background-color: cadetblue;
}
li.dropdown {
  display: inline-block;
}
.fa-user-circle{
      margin-right:5px!important;
	  
}

.button10 {
    background-color: #FAEBE0;
    color: black;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #FAEBE0;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {color:green;}

.dropdown:hover .dropdown-content {
  display: block;
  
}
</style>
</head>
<body class="w3-theme-l5">
<!--background-color: #fff;-->
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large w3-card">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="../index.php">
  <img src="../imagens/logo.png" alt="Tijuca Verde" style="width:97px;height:55px;margin-right: 17px !important;float:left;margin-left: 15px !important;">
</a>
  <a href="https://chat.whatsapp.com/CKMhwBQHWl2ExbtJ2QVRhl" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Grupo de Reciclagem"><i class="fa fa-recycle"></i></a>
  <a href="telarecompensa.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Recompensa"><i class="fa fa-envelope"></i></a>

 

  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn"  style="
    padding-bottom: 18px;"><i class="fa fa-user-circle" aria-hidden="true"></i>Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content">
      <a href="deslogar.php" ><i class="fa fa-power-off"></i> Deslogar</a>
    </div>
  </li>
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $logado;?></h4>
         
         <p class="w3-center"><img src="<?php echo $_SESSION['imagem'];?>" class="w3-circle" style="height:106px;width:106px" alt="FOTO DE PERFIL"></p><button onclick="document.getElementById('id01').style.display='block' " style="float:right" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
         <hr>
   <div id="id01" class="modal">
  
  <form class="modal-content animate" action="avatar.php" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">Fechar</span>

    </div>

    <div class="container5">

      <input type="text" class="input2" name="nome" value="<?php echo $logado;?>" placeholder="Seu nome..." required>
      <input type="file" class="input2" id="myFile" name="imagem">
      <button class="button1" onclick="myFunction()" type="submit">Concluir</button>
    </div>
  </form>
</div>
<script>
    var modal = document.getElementById('id01');
</script>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
     
    
    <!-- End Left Column -->
    </div>
    <!-- Middle Column -->
<?php   
    if ($result->num_rows > 0) {
?>     
<div class="w3-col m7">
<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <h1>Seu histórico de Denúncias</h1>
			<table id="myTable">
    <tr><th>Id</th><th>Tipo da denúncia</th><th>Local informado</th><th>Descrição</th><th>Estado atual</th></tr>

<?php
  while($row = $result->fetch_assoc()) {

    echo "<tr><td>" . $row["Iddenuncia"] . "</td><td>" . $row["Tipodenuncia"] . "</td><td>" . $row["Localdenuncia"] . "</td><td>" . $row["Descricao"] . "</td><td>" . $row["Status"] . "</td></tr>";
    }
?>

    </table>

<?php
} else {
    echo "<h1>Sem denúncias no momento...</h1>";
}
?>

      
    <!-- End Middle Column -->
    </div>
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Futuros eventos:</p>
          <p><strong>SEM PREVISÃO</strong></p>
          <p>Verifique todos os dias para ficar por dentro de tudo o que acontece no meio ambiente.</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>


    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body>
</html>
