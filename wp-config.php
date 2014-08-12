<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'hinodefa');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'vertrigo');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'yKyab]T /3o?/&@p4)MW!/W~]u7%/?-!:vQ9nk9|,-.Q]DRD~<!9hyp4+>zsRWc&');
define('SECURE_AUTH_KEY',  '8z4ky>xvX|J#|(8%hl?tjRoQ,uC_[m6a[[(k>W)9,!KzvsZus*Yxa;:iYtG$%Maz');
define('LOGGED_IN_KEY',    '})#lkQ2OAzWfa{USc=#wmH{Lg7W,OBY)<&s~ai*qOat1(f:Z[=e4DRpIsS#*Bm5Y');
define('NONCE_KEY',        '+aSixVR16>A%<)S+y#xE!YK3+Ri(Wl~#M!D^2nc;G}@nqA.|l;(8- L+$SEbGUi.');
define('AUTH_SALT',        'dTH9-@S3lL9 <U{f>R 6_|jLk:+g;F/@-?_GA$9q^L18S56uNCNI-}@*SV*J#0.=');
define('SECURE_AUTH_SALT', '+O:5OyZ--U+X}W!eA9`F-9#e<%-vYCS5q$OM7p/km306n<CAChob0q.)1pU3RuN%');
define('LOGGED_IN_SALT',   '0f_Pr,3i8a4u}rC-5hs;ij5Tc^)1U5a>3JHc(Au~9}H|Xo<,9b-dXd-YO]-H%4}J');
define('NONCE_SALT',       '7z~x&~WI?y3EB>sbq9Y}Il!ES(CO_a]j;&ShG@(YdaHm^LSo9+/K8Lv3RpfOM`76');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
