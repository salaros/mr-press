<?php

// ** Allow switching on onscreen error reporting ** //
// ** by using 'DEBUG' GET/POST variable ** //
$debug_mode = isset( $_REQUEST[ 'DEBUG' ] )
	? ( intval( $_REQUEST[ 'DEBUG' ] ) ?: 1 )
	: 0;

// ** PHP error settings ** //
error_reporting( E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
ini_set( 'display_errors', $debug_mode > 0 );

// ** Wordpress debug settings ** //
define( 'WP_DEBUG', getenv( 'WP_DEBUG_DISPLAY' ) ?: true );
define( 'WP_DEBUG_DISPLAY', $debug_mode > 0 || getenv( 'WP_DEBUG_DISPLAY' ) );
define( 'WP_DEBUG_LOG', $debug_mode < 1 || getenv( 'WP_DEBUG_LOG' ) );
define( 'SAVEQUERIES', 3 === $debug_mode || getenv( 'SAVEQUERIES' ) );
define( 'SCRIPT_DEBUG', 2 === $debug_mode || getenv( 'SCRIPT_DEBUG' ) );

define( 'FS_CHMOD_DIR', ( 0775 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0664 & ~ umask() ) );
define( 'FS_METHOD', 'direct' );
