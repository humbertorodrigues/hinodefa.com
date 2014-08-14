<?php
/*
Template Name: Página de registro
*/
get_header();

$passo=1;
if(isset($_POST['nome'])){
	$passo=2;
	$nome=$_POST['nome'];
	$sobrenome=$_POST['sobrenome'];
	$email=$_POST['email'];
	$endereco=$_POST['endereco'];
	$bairro=$_POST['bairro'];
	$cidade=$_POST['cidade'];
	$estado=$_POST['estado'];
	$cep=$_POST['cep'];
	$pais=$_POST['pais'];
	$skype=$_POST['skype'];
	$facebook=$_POST['facebook'];
	$whatsapp=$_POST['whatsapp'];
	$site=$_POST['site'];
	$telefone=$_POST['telefone'];
	$celular=$_POST['celular'];
	

	$userdata = array(
    'user_login'  =>  $email,
    'user_url'    =>  $site,
    'user_pass'   =>  NULL,
    'user_nicename'   =>  $nome,
    'user_email'   =>  $email,
    'display_name'   =>  $nome,
    'first_name'   =>  $nome,
    'last_name'   =>  $sobrenome
	);
	
	$id_usuario = wp_insert_user($userdata);

	if ( !is_wp_error($id_usuario) ) {
		add_user_meta($id_usuario,"hinode_endereco",$endereco);
		add_user_meta($id_usuario,"hinode_bairro",$bairro);
		add_user_meta($id_usuario,"hinode_cidade",$cidade);
		add_user_meta($id_usuario,"hinode_estado",$estado);
		add_user_meta($id_usuario,"hinode_cep",$cep);
		add_user_meta($id_usuario,"hinode_pais",$pais);
		add_user_meta($id_usuario,"hinode_skype",$skype);
		add_user_meta($id_usuario,"hinode_facebook",$facebook);
		add_user_meta($id_usuario,"hinode_whatsapp",$whatsapp);
		add_user_meta($id_usuario,"hinode_telefone",$telefone);
		add_user_meta($id_usuario,"hinode_celular",$celular);
		add_user_meta($id_usuario,"hinode_foto",$foto);
		add_user_meta($id_usuario,"hinode_status","pendente");
		//move_uploaded_file($_FILES['foto']['tmp_name'], get_template_directory(). '/avatar/' . $_FILES['foto']['name']);
		$image = wp_get_image_editor( $_FILES['foto']['tmp_name'] );
		$image->resize( 116, null, true );
		
	    $image->save( get_template_directory(). '/avatar/' . $id_usuario. ".jpg");
	}else{ //se ocorreu algum erro
		$passo=3;

	}
}
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js"></script>
<script>
	$(document).ready(function(){
		$("#cep").mask("99999-999");
		$("#whatsapp").mask("(99)9999-9999?9");
		$("#telefone").mask("(99)9999-9999?9");
		$("#celular").mask("(99)9999-9999?9");
		$("#formCadastro").validate({
			rules:{
				nome:{
					required:true
				},
				sobrenome:{
					required:true
				},
				email:{
					required:true,
					email:true
				},
				endereco:{
					required:true
				},
				bairro:{
					required:true
				},
				cidade:{
					required:true
				},
				estado:{
					required:true
				},
				cep:{
					required:true
				},
				pais:{
					required:true
				},
				skype:{
					required:true
				},
				facebook:{
					required:true
				},
				whatsapp:{
					required:true
				},
				site:{
					required:true
				},
				telefone:{
					required:true
				},
				celular:{
					required:true
				},
				foto:{
					required:true
				}
			},
			messages:{
				nome:{
					required:"Informe seu nome"
				},
				sobrenome:{
					required:"Informe seu sobrenome"
				},
				email:{
					required:"Informe seu email",
					email:"Informe um email válido"
				},
				endereco:{
					required:"Informe seu endereço"
				},
				bairro:{
					required:"Informe seu bairro"
				},
				cidade:{
					required:"Informe sua cidade"
				},
				estado:{
					required:"Escolha um estado"
				},
				cep:{
					required:"Informe seu CEP"
				},
				pais:{
					required:"Informe seu país"
				},
				skype:{
					required:"Informe seu skype"
				},
				facebook:{
					required:"Informe seu facebook"
				},
				whatsapp:{
					required:"Informe o número de seu whatsapp"
				},
				site:{
					required:"Informe seu site"
				},
				telefone:{
					required:"Informe seu telefone fixo"
				},
				celular:{
					required:"Informe seu celular"
				},
				foto:{
					required:"Escolha uma foto"
				}
			}
		})
	})
</script>
<div class="container">
	<h1>Efetuar registro</h1>
	<?php 
	if($passo==3){
		?>
		<div class="alert alert-danger">
			<b>Ocorreu um erro</b><br>
			<?php echo $id_usuario->get_error_message() ?>
		</div>
		<?php
	}
	if($passo==2){
		?>
		<div class="alert alert-success">
			<b>Cadastro efetuado com sucesso!</b><br>
			<p>Seu cadastro foi efetuado com sucesso. Assim que o mesmo for aprovado por nossa equipe, você será notificado por email</p>
		</div>
		<?php	
	}
	if($passo==1 || $passo==3){		
	?>
	<form action="" method="post" id="formCadastro" enctype="multipart/form-data">
		<div class="form-group">
			<label>
				Nome
				<input class="form-control" type="text" name="nome">
			</label>
		</div>
		<div class="form-group">
			<label>
				Sobrenome
				<input class="form-control" type="text" name="sobrenome">
			</label>
		</div>
		<div class="form-group">
			<label>
				Email
				<input class="form-control" type="text" name="email">
			</label>
		</div>
		<div class="form-group">
			<label>
				Endereço
				<input class="form-control" type="text" name="endereco">
			</label>
		</div>
		<div class="form-group">
			<label>
				Bairro
				<input class="form-control" type="text" name="bairro">
			</label>
		</div>
		<div class="form-group">
			<label>
				Cidade
				<input class="form-control" type="text" name="cidade">
			</label>
		</div>
		<div class="form-group">
			<label>
				Estado
				<select name="estado" class="form-control">
				    <option value="AC">Acre</option>
				    <option value="AL">Alagoas</option>
				    <option value="AM">Amazonas</option>
				    <option value="AP">Amapá</option>
				    <option value="BA">Bahia</option>
				    <option value="CE">Ceará</option>
				    <option value="DF">Distrito Federal</option>
				    <option value="ES">Espirito Santo</option>
				    <option value="GO">Goiás</option>
				    <option value="MA">Maranhão</option>
				    <option value="MG">Minas Gerais</option>
				    <option value="MS">Mato Grosso do Sul</option>
				    <option value="MT">Mato Grosso</option>
				    <option value="PA">Pará</option>
				    <option value="PB">Paraíba</option>
				    <option value="PE">Pernambuco</option>
				    <option value="PI">Piauí</option>
				    <option value="PR">Paraná</option>
				    <option value="RJ">Rio de Janeiro</option>
				    <option value="RN">Rio Grande do Norte</option>
				    <option value="RO">Rondônia</option>
				    <option value="RR">Roraima</option>
				    <option value="RS">Rio Grande do Sul</option>
				    <option value="SC">Santa Catarina</option>
				    <option value="SE">Sergipe</option>
				    <option value="SP">São Paulo</option>
				    <option value="TO">Tocantins</option>
				</select>
			</label>
		</div>
		<div class="form-group">
			<label>
				CEP
				<input class="form-control clear-if-not-match" type="text" name="cep" id="cep">
			</label>
		</div>
		<div class="form-group">
			<label>
				País
				<input class="form-control" type="text" name="pais">
			</label>
		</div>
		<div class="form-group">
			<label>
				Skype
				<input class="form-control" type="text" name="skype">
			</label>
		</div>
		<div class="form-group">
			<label>
				Facebook
				<input class="form-control" type="text" name="facebook">
			</label>
		</div>
		<div class="form-group">
			<label>
				Whatsapp
				<input class="form-control" type="text" name="whatsapp" id="whatsapp">
			</label>
		</div>
		<div class="form-group">
			<label>
				Site
				<input class="form-control" type="text" name="site">
			</label>
		</div>
		<div class="form-group">
			<label>
				Telefone
				<input class="form-control" type="text" name="telefone" id="telefone">
			</label>
		</div>
		<div class="form-group">
			<label>
				Celular
				<input class="form-control" type="text" name="celular" id="celular">
			</label>
		</div>
		<div class="form-group">
			<label>Foto</label>
		    <input name="foto" type="file">
		</div>
		<button type="submit">Efetuar registro</button>
	</form>
	<?php } ?> 
</div>
<?php
get_footer();