<?php
require 'conexao.php';

$campoid = filter_input(INPUT_POST, 'iddenuncia');
$camponome = 'Comlurb';
$campoemail='autoridadecomlurb2022@gmail.com';
$campolocaldenuncia = filter_input(INPUT_GET, 'localdenuncia');
$campodescricao = filter_input(INPUT_GET, 'descricao');
$campotipodenuncia = filter_input(INPUT_GET, 'tipodenuncia');
$campostatus = filter_input(INPUT_GET, 'status');

 if ($campostatus == 'Aprovada') {
       header( "refresh:3;url=denunciascontrolar.php" );	
  echo "Gravado com sucesso.";

//Código reutilizável para enviar emails.
require 'enviaremaildenuncia.php';

//Conteúdo do email de validação
$texto = "ATENÇÃO COMLURB<br> Um de nossos usuários pode ter detectado um problema que necessite da ajuda de uma força maior do que as oferecidas, pedimos que entrem em contato para discutirmos uma futura solução<br><br><br> Local da Denuncia: '"  . $campolocaldenuncia . "' <br><br>Descrição da Denúncia: '" . $campodescricao . "'<br><br><br>Atensiosamente, Equipe Tijuca Verde.<br>";


//Chamada da função no do código
enviaremail($camponome, $campoemail, 'Lixo na rua não pode!', $texto);

} else {
  header( "refresh:3;url=denunciascontrolar.php" );	
  echo "Essa denúncia não foi aprovada";
}

$conn->close();
?>