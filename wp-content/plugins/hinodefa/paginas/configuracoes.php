<?php
if(isset($_POST['id_usuario'])){
	update_user_meta($_POST['id_usuario'],"hinode_status",'ativo');
	
}
$meta_query_args = array(
	array(
		'key'     => 'hinode_status',
		'value'   => 'pendente',
		'compare' => '='
		));
$args = array('meta_query'=>$meta_query_args,
	'orderby'=>'registered',
	'order'=>'DESC');
$usuarios = get_users($args);
if(!empty($usuarios)){
?>
<table>
	<thead>
		<tr>
			<th>
				Nome
			</th>
			<th>
				Email
			</th>
			<th>
				Cidade/Estado
			</th>
			<th>
				
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($usuarios as $value) { ?>
		<tr>
			<td>
				<?php echo $value->first_name." ".$value->last_name ?>
			</td>
			<td>
				<?php echo $value->user_email ?>
			</td>
			<td>
				<?php 
				$cidade = get_user_meta($value->id,"hinode_cidade",true);
				$estado = get_user_meta($value->id,"hinode_estado",true);
				echo $cidade.'/'.$estado; 
				?>
			</td>
			<td>
				<form action="#" method="post">
					<input type="hidden" name="id_usuario" value="<?php echo $value->id ?>">
					<input type="submit" value="Liberar">
				</form>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php }else{ ?>
<h2>Nenhuma liberação pendente</h2>
<?php } ?>