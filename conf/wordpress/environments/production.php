<?php

// ** PHP error settings ** //
error_reporting( E_ERROR | E_PARSE );
ini_set( 'display_errors', 0 );

// ** Wordpress debug settings ** //
define( 'WP_DEBUG', getenv( 'WP_DEBUG' ) ?: true );
define( 'WP_DEBUG_DISPLAY', getenv( 'WP_DEBUG_DISPLAY' ) ?: false );
define( 'WP_DEBUG_LOG', getenv( 'WP_DEBUG_LOG' ) ?: true );
define( 'SAVEQUERIES', getenv( 'SAVEQUERIES' ) ?: false );
define( 'SCRIPT_DEBUG', getenv( 'SCRIPT_DEBUG' ) ?: false );

define( 'FS_CHMOD_DIR', ( 0775 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0664 & ~ umask() ) );
define( 'FS_METHOD', 'direct' );
