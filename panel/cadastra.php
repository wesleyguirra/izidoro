<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.validate.js"></script>
<script type="text/javascript" src="jquery/funcao.js"></script>
<?php
$hostname_conecta = "mysql.hostinger.com.br";
$database_conecta = "u972815518_pie";
$username_conecta = "u972815518_wes";
$password_conecta = "d3j4ytpj";
$conecta = mysql_pconnect($hostname_conecta, $username_conecta, $password_conecta) or trigger_error(mysql_error(),E_USER_ERROR);
$database = mysql_select_db($database_conecta);

if(isset($_POST['cad_users']) && $_POST['cad_users'] == 'cad'){

$nome    = $_POST["nome"];
$email   = $_POST["email"];
$cidade  = $_POST["cidade"];
$usuario = $_POST["usuario"];
$senha   = $_POST["senha"];
$data    = date('d/m/Y');

$usuario_cad = mysql_query("SELECT usuario FROM usuario WHERE usuario = '$usuario'")
              or die(mysql_error());
if(@mysql_num_rows($usuario_cad) >= '1'){
	$erro = "Usuário já cadastrado no sistema, escolha outro.";
}else{

$cadastra_users = mysql_query("INSERT INTO usuario(nome, email, cidade, usuario, senha, data)
                          VALUES('$nome', '$email', '$cidade', '$usuario', '$senha', '$data')")
			 or die(mysql_error());
$resposta = ("$cadastra_users");
if($resposta){
	$erro = "Usuário cadastrado com sucesso!";
}else{
	$erro = "Erro ao cadstrar usuário!";
}
}
@header ("location:cadastra.php?&sim=$erro");
}
?>
<div id="cadastro">

  <form name="cadastra" id="cadastra" method="post" action="">
    <fieldset>
     <legend>Cadastrar usuário</legend>
     
     <label>
      <span>Nome</span>
      <input type="text" name="nome">
     </label>
     
     <label>
      <span>E-mail</span>
      <input type="text" name="email">
     </label>
     
     <label>
      <span>Cidade</span>
      <input type="text" name="cidade">
     </label>
     
     <label>
      <span>Usuário</span>
      <input type="text" name="usuario">
     </label>
     
     <label>
      <span>Senha</span>
      <input type="password" name="senha">
     </label>
     <input type="hidden" name="cad_users" value="cad" />
     <input type="submit" name="cadastrar" value="Cadastrar" class="btn">
    </fieldset>
    <div class="voltar"><a href="index.php">Voltar</a></div>
    <p align="center"><?php echo @$_GET["sim"];?></p>
  </form>
</div>










