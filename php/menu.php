<ul>
  <li><a href="../index.php">Tela Principal</a></li>
  <li><a href="usuarioscontrolar.php?pag=1">Controlar Usuários</a></li>
  <li><a href="denunciascontrolar.php?pag=1">Controlar Denúncias</a></li> 
  <li><a href="admincadastrar1.php">Cadastrar Usuários</a></li>
  <li><a href="grafico.php">Gráfico</a></li>

<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
}  
?>
<?php
if (!isset($_SESSION["acesso"])){ ?>
<li><a href ="login.html">Login</a></li>
   
<?php }else{?>
  <li class="dropdown" style="float:right">
     
    
    <a href="javascript:void(0)" class="dropbtn">Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content">
      <a class ="deslogar1" href="deslogar.php">Deslogar</a>
    </div>
  </li>
 
 <?php } ?>
</ul>