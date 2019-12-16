<?php

define('DB_NAME', 'administracao');

define('DB_USER', 'root');

define('DB_PASSWORD', '');

define('DB_HOST', 'localhost');

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( !defined('BASEURL') )
	define('BASEURL', '/projeto_prefeitura/');
	
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

define('HEADER_TEMPLATE', ABSPATH . 'views/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'views/footer.php');
