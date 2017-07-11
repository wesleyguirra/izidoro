<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.validate.js"></script>
<script type="text/javascript" src="jquery/funcao.js"></script>
<div id="recuperar">
<form name="recupera" id="recupera" method="post" action="">
  
<?php
if(isset($_POST['recuperando']) && $_POST['recuperando'] == 'rec'){
	$email =    strip_tags(trim($_POST['email']));
	

$date = date("d/m/Y h:i");
echo "<div class=\"dados\">Dados recuperados com sucesso!</div>";

$nome_do_site="Adim. Tutorialvideos";
$email_para_onde_vai_a_mensagem = "suporte@tutorialvideos.com.br";
$nome_de_quem_recebe_a_mensagem = "Tutorialvideos";
$exibir_apos_enviar='recuperar.php';


$cabecalho_da_mensagem_original="From: $name <$email>\n";
$assunto_da_mensagem_original="Recuperar dados";

$configuracao_da_mensagem_original="

ENVIADO POR:\n
E-mail: $email\n

ENVIADO EM: $date";

$assunto_da_mensagem_de_resposta = "Recebemos seu email";
$cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="

Recebemos seu email!\n
Em breve enviaremos seus dados de acesso...\n
Atenciosamente,\n$nome_do_site\n\n

Enviado em: $date";

$assunto_digitado_pelo_usuario="s";

$headers = "$cabecalho_da_mensagem_original";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_original";
};
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

$headers = "$cabecalho_da_mensagem_de_resposta";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_de_resposta";
}
else
{
$assunto = "Re: $assunto";
};
$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);

echo "<script>window.location='$exibir_apos_enviar'</script>";
}else{
	echo @"$retorno";
}
?>
  
  
    <fieldset>
      <legend>Informe o e-mail cadastrado na conta</legend>
         <label>
          <span>E-mail</span>
          <input type="text" name="email" />
         </label>
         <input type="hidden" name="recuperando" value="rec">
         <input type="submit" name="enviar" value="Enviar" class="btn" />
    </fieldset>
  </form>
</div>