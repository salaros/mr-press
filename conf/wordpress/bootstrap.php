<?php

global $locale;

$root_dir = dirname( dirname( __DIR__ ) );

// ** Use root_dir to define ABSPATH if it has not been defined yet ** //
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', sprintf( '%s/public', $root_dir ) );
}

// ** Load .env file and require DB and URL-related settings to be set ** //
$dotenv = sprintf( '%s/.env', $root_dir );
if ( ! file_exists( $dotenv ) ) {
	die( sprintf( 'Please make sure you have created "%s" file containing WordPress settings', $dotenv ) );
}
$dotenv = new Dotenv\Dotenv( $root_dir );
$dotenv->load();
$dotenv->required( ['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL'] )->notEmpty();

// ** Authentication Unique Keys and Salts ** //
define( 'AUTH_KEY',             getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY',      getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY',        getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY',            getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT',            getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT',     getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT',       getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT',           getenv( 'NONCE_SALT' ) );

// ** Load additional settings & tweaks conditionnaly, using current WordPress environment ** //
define( 'WP_ENV',               getenv( 'WP_ENV' ) ?: 'development' );
$dotenv_file = sprintf( '%s/environments/%s.php', __DIR__, WP_ENV );
if ( file_exists( $dotenv_file ) ) {
    require_once $dotenv_file;
}

// ** URLs ** //
define( 'WP_HOME',              getenv( 'WP_HOME' ) );
define( 'WP_SITEURL',           getenv( 'WP_SITEURL' ) );

// ** Primary language ** //

if ( empty( getenv( 'WPLANG' ) ) ) {
	define( 'WPLANG',                $locale );
} else {
	define( 'WPLANG',                getenv( 'WPLANG' ) );
	$locale = WPLANG;
}

// ** If true, includes the wp-content/advanced-cache.php script ** //
define( 'WP_CACHE',             getenv( 'WP_CACHE' ) );

// ** MariaDB / MySQL server settings ** //
define( 'DB_HOST',              getenv( 'DB_HOST' ) ?: 'localhost' );
define( 'DB_NAME',              getenv( 'DB_NAME' ) );
define( 'DB_USER',              getenv( 'DB_USER' ) );
define( 'DB_PASSWORD',          getenv( 'DB_PASSWORD' ) );
define( 'DB_CHARSET',           getenv( 'DB_CHARSET' ) ?: 'utf8mb4' );
define( 'DB_COLLATE',           '' );

$table_prefix = getenv( 'DB_PREFIX' ) ?: 'wp_';

// ** Defines a default theme for new sites, also used as fallback for a broken theme. ** //
define( 'WP_DEFAULT_THEME',     getenv( 'WP_DEFAULT_THEME' ) ?: 'mr-press-child-theme' );

// ** Performance tweaks ** //
define('WP_MEMORY_LIMIT',       getenv( 'WP_MEMORY_LIMIT' ) );
define('WP_MAX_MEMORY_LIMIT',   getenv( 'WP_MAX_MEMORY_LIMIT' ) );

/**
 * Disable WP_CRON unless running thtough WordPress cron job
 * For further details read this article: https://www.lucasrolff.com/wordpress/why-wp-cron-sucks
 */
define( 'DISABLE_WP_CRON',      getenv( 'DISABLE_WP_CRON' ) ?: ( ! isset( $argv[1] ) || 'DOING_CRON' !== $argv[1] ) );

// ** Additional settings ** //
define( 'DISALLOW_FILE_EDIT',   getenv( 'DISALLOW_FILE_EDIT' ) ?: true );
define( 'WP_ALLOW_REPAIR',      getenv( 'WP_ALLOW_REPAIR' ) ?: false );
define( 'AUTOMATIC_UPDATER_DISABLED', getenv( 'AUTOMATIC_UPDATER_DISABLED' ) ?: true );

// ** Redefine default WordPress content (themes, plugins etc) folder location ** //
define( 'WP_CONTENT_DIR',       sprintf('%s/%s', $root_dir, 'wp-content' ) );
