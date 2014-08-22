<?php
/*
Template Name: Página única do usuáriop
*/
get_header();
$id=$_GET['id'];
if(!is_numeric($id)){
	header('location:'.site_url());
}
$usuario = get_user_by( "id", $id );
$bairro = get_user_meta($id,"hinode_bairro",true);
$cidade = get_user_meta($id,"hinode_cidade",true);
$estado = get_user_meta($id,"hinode_estado",true);
$skype = get_user_meta($id,"hinode_skype",true);
$facebook = get_user_meta($id,"hinode_facebook",true);
$whatsapp = get_user_meta($id,"hinode_whatsapp",true);
$telefone = get_user_meta($id,"hinode_telefone",true);
$celular = get_user_meta($id,"hinode_celular",true);
?>
<div class="container" style="border: 1px solid #cccccc;padding:20px">
	<a href="<?php echo site_url(); ?>">&#8617;Home</a>
	<div class="row">
		<div class="col-md-2">
			<img width="116" src="<?php echo get_template_directory_uri().'/avatar/'. $id ?>.jpg" alt="" class="img-thumbnail" style="margin-top:25px">
		</div>
		<div class="col-md-10">
			<h1><?php echo $usuario->first_name." ".$usuario->last_name; ?></h1>
			<p><?php echo $usuario->user_email ?></p>
			<p><?php echo $bairro ?> | <?php echo $cidade."/".$estado ?></p> 
			<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>whatsapp.png" alt="Whatsapp"> <?php echo $whatsapp ?>
			<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>skype.png" alt="Skype"> <?php echo $skype ?>
			<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>telefone.png" alt="Telefone"> <?php echo $telefone ?>
			<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>celular.png" alt="Celular"> <?php echo $celular ?>				
			<a target="_blank" href="<?php echo $facebook ?>"><img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>facebook.png" alt="Facebook"><?php echo str_replace("https://www.facebook.com/","",$facebook); ?></a>
			<br>
			<a target="_blank" href="<?php echo $usuario->user_url ?>"><?php echo $usuario->user_url ?></a>
		</div>
	</div>
</div>
<?php get_footer(); ?>