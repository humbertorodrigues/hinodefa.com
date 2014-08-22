<?php
/*
Plugin Name: Configurações do administrador
Plugin URI: http://vencedoragora.com
Description: Adiciona itens para configuração do sistema
Author: Vencedor Agora
Version: 1.6
Author URI: http://vencedoragora.com
*/
add_action( 'admin_menu', 'geralPlugin' );
function geralPlugin() {
	
	add_menu_page( "Configurações do sistema", "Configurações HinodeFA", "manage_options", "hinodefa-configurar-geral", "configurarSistema");
	add_submenu_page( "hinodefa-configurar-geral", "Configurar", "Configurar", 'manage_options', "hinodefa-configurar-geral", "configurarSistema");
}
function configurarSistema(){
	require ("paginas/configuracoes.php");
}