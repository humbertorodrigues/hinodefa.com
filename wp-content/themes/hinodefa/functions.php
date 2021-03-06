<?php
add_action( 'after_switch_theme', 'hinodefa_install' );
add_action( 'wp_ajax_verificar_login', 'verificarLogin' );
add_action('wp_ajax_nopriv_verificar_login', 'verificarLogin');

function hinodefa_install(){
	$apost = array('comment_status' => 'open',
              'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
              'post_author'    => 1,
              'post_content'    => '',
              'post_excerpt'   => 'Registre-se',
              'post_name'      => 'registro', // The name (slug) for your post
              'post_status'    => 'publish', //Set the status of the new post.
              'post_title'     => 'Registro', //The title of your post.
              'post_type'      => 'page', //You may want to insert a regular post, page, link, a menu item or some custom post type 
    ); 
    //Criamos a página de hospedagem
    if(!get_page_by_path('registro')){
        $id_pagina = wp_insert_post( $apost, $wp_error);
        update_post_meta($id_pagina,'_wp_page_template','page-templates/registro.php');
    }	

    $apost = array('comment_status' => 'open',
              'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
              'post_author'    => 1,
              'post_content'    => '',
              'post_excerpt'   => 'Encontre',
              'post_name'      => 'listar', // The name (slug) for your post
              'post_status'    => 'publish', //Set the status of the new post.
              'post_title'     => 'Encontre', //The title of your post.
              'post_type'      => 'page', //You may want to insert a regular post, page, link, a menu item or some custom post type 
    ); 
    //Criamos a página de hospedagem
    if(!get_page_by_path('listar')){
        $id_pagina = wp_insert_post( $apost, $wp_error);
        update_post_meta($id_pagina,'_wp_page_template','page-templates/listar.php');
    }

    $apost = array('comment_status' => 'open',
              'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
              'post_author'    => 1,
              'post_content'    => '',
              'post_excerpt'   => 'Encontre',
              'post_name'      => 'usuario', // The name (slug) for your post
              'post_status'    => 'publish', //Set the status of the new post.
              'post_title'     => 'Encontre', //The title of your post.
              'post_type'      => 'page', //You may want to insert a regular post, page, link, a menu item or some custom post type 
    ); 
    //Criamos a página de hospedagem
    if(!get_page_by_path('usuario')){
        $id_pagina = wp_insert_post( $apost, $wp_error);
        update_post_meta($id_pagina,'_wp_page_template','page-templates/usuario.php');
    }
}
function verificarLogin(){
  $usuario = $_POST['usuario'];
  if(is_null(username_exists($usuario))){
    die("false");  
  }else{
    die("true");
  }
  
}