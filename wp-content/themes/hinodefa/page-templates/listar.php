<?php
/*
Template Name: Página de listagem
*/
get_header();
$estado = $_GET['estado'];
switch ($estado) {
	case 'rj':
	$nomeEstado = "Rio de Janeiro";
	break;
	case 'ac':
	$nomeEstado = "Acre";
	break;
	case 'al':
	$nomeEstado = "Alagoas";
	break;
	case 'ap':
	$nomeEstado = "Amapá";
	break;
	case 'am':
	$nomeEstado = "Amazonas";
	break;
	case 'ba':
	$nomeEstado = "Bahia";
	break;
	case 'ce':
	$nomeEstado = "Ceará";
	break;
	case 'df':
	$nomeEstado = "Distrito Federal";
	break;
	case 'es':
	$nomeEstado = "Espírito Santo";
	break;
	case 'go':
	$nomeEstado = "Goiás";
	break;
	case 'ma':
	$nomeEstado = "Maranhão";
	break;
	case 'mt':
	$nomeEstado = "Mato Grosso";
	break;
	case 'ms':
	$nomeEstado = "Mato Grosso do Sul";
	break;
	case 'mg':
	$nomeEstado = "Minas Gerais";
	break;
	case 'pa':
	$nomeEstado = "Pará";
	break;
	case 'pb':
	$nomeEstado = "Paraíba";
	break;
	case 'pr':
	$nomeEstado = "Paraná";
	break;
	case 'pe':
	$nomeEstado = "Pernambuco";
	break;
	case 'pi':
	$nomeEstado = "Piauí";
	break;
	case 'rn':
	$nomeEstado = "Rio Grande do Norte";
	break;
	case 'rs':
	$nomeEstado = "Rio Grande do Sul";
	break;
	case 'ro':
	$nomeEstado = "Rondônia";
	break;
	case 'rr':
	$nomeEstado = "Roraima";
	break;
	case 'sc':
	$nomeEstado = "Santa Catarina";
	break;
	case 'sp':
	$nomeEstado = "São Paulo";
	break;
	case 'se':
	$nomeEstado = "Sergipe";
	break;
	case 'to':
	$nomeEstado = "Tocantins";
	break;
	default:
	$estado = "rj";
	$nomeEstado = "Rio de Janeiro";
	break;
}
$meta_query_args = array(
	array(
		'key'     => 'hinode_estado',
		'value'   => $estado,
		'compare' => '='
		),
	array(
		'key'     => 'hinode_status',
		'value'   => 'ativo',
		'compare' => '='
		));
$args = array('meta_query'=>$meta_query_args,
	'orderby'=>'registered',
	'order'=>'DESC');
$usuarios = get_users($args);


$total_users = count($usuarios);
$paged = $_GET['pagina'];

$number = 10;
$meta_query_args = array(
	array(
		'key'     => 'hinode_estado',
		'value'   => $estado,
		'compare' => '='
		),
	array(
		'key'     => 'hinode_status',
		'value'   => 'ativo',
		'compare' => '='
		));
$args = array('meta_query'=>$meta_query_args,
	'orderby'=>'registered',
	'offset' => $paged ? (($paged-1) * $number) : 0,
	'number' => $number,
	'order'=>'DESC');
$usuarios = get_users($args);


?>
<div class="container" style="border: 1px solid #cccccc;padding:20px">
	<?php 
	if($total_users===0){
		?>
		<h1>Nenhum representante encontrado neste estado</h1>
		<?php

	}else{
		?>
		<h3>Exibindo resultado para <?php echo $nomeEstado ."(".strtoupper($estado).")" ?></h3>
		<?php
		foreach ($usuarios as $key => $value) {
			$bairro = get_user_meta($value->id,"hinode_bairro",true);
			$cidade = get_user_meta($value->id,"hinode_cidade",true);
			$estado = get_user_meta($value->id,"hinode_estado",true);
			$skype = get_user_meta($value->id,"hinode_skype",true);
			$facebook = get_user_meta($value->id,"hinode_facebook",true);
			$whatsapp = get_user_meta($value->id,"hinode_whatsapp",true);
			$telefone = get_user_meta($value->id,"hinode_telefone",true);
			$celular = get_user_meta($value->id,"hinode_celular",true);

			?>
			<div class="row" style="min-height:100px">
				<div class="col-md-2">
					<img width="116" src="<?php echo get_template_directory_uri().'/avatar/'. $value->id ?>.jpg" alt="" class="img-thumbnail">
				</div>
				<div class="col-md-10">
					<strong><?php echo $value->first_name." ".$value->last_name ?></strong> | <?php echo $value->user_email ?>
					<br>
					<?php echo $bairro." - ".$cidade ?>/<?php echo $estado ?>
					<br>
					<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>whatsapp.png" alt="Whatsapp"> <?php echo $whatsapp ?>
					<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>skype.png" alt="Skype"> <?php echo $skype ?>
					<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>telefone.png" alt="Telefone"> <?php echo $telefone ?>
					<img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>celular.png" alt="Celular"> <?php echo $celular ?>				
					<a target="_blank" href="<?php echo $facebook ?>"><img width="24" src="<?php echo get_template_directory_uri().'/icones/'?>facebook.png" alt="Facebook"><?php echo $facebook ?></a>
					<br>
					<a target="_blank" href="<?php echo $value->user_url ?>"><?php echo $value->user_url ?></a>
				</div>
			</div>
			<hr>
			<?php
		}
		?>
		<div style="margin:auto;text-align:center">
		<?php
		
		if($total_users > $number){

		  $pl_args = array(
		     'base'     => add_query_arg('paged','%#%'),
		     'format'   => '',
		     'total'    => ceil($total_users / $number),
		     'current'  => max(1, $paged),
		  );

		  // for ".../page/n"

		  if($GLOBALS['wp_rewrite']->using_permalinks())
		  	$pl_args['base'] = get_pagenum_link(1).'&pagina=%#%';
		  echo paginate_links($pl_args);
		}
	}
	?>
	</div>
</div>
<?php


get_footer();