#!/bin/bash

# Remove existing config files
mv public/wp-config.php public/wp-config.php.bak
mv wp-config.php wp-config.php.bak

# Generate a random table prefix
table_prefix=$(date +%s | sha256sum | base64 | head -c 10)

# Supply default configuration
vendor/bin/wp core config --dbprefix=${table_prefix}_ --extra-php <<PHP
// Defines a default theme for new sites, also used as fallback for a broken theme
define( 'WP_DEFAULT_THEME', 'wordpress-template-theme' );

// Changing the Site URL
define( 'WP_HTTP_SCHEME', (empty(\$_SERVER['HTTPS']) ? 'http://' : 'https://') );
define( 'WP_SITEURL',  WP_HTTP_SCHEME . 'example.org');
define( 'WP_HOME', WP_SITEURL );

// For developers: WordPress debugging mode.
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', !WP_DEBUG );
define( 'WP_DEBUG_DISPLAY', WP_DEBUG );
define( 'SCRIPT_DEBUG', WP_DEBUG );

// Redefine default Wordpress content (themes, plugins etc) folder location
define ( 'WP_CONTENT_FOLDERNAME', 'wp-content' );
define ( 'WP_CONTENT_DIR', dirname(__FILE__) . '/'. WP_CONTENT_FOLDERNAME );

// Composer autoloader
require_once("vendor/autoload.php");
PHP

#
mv -v public/wp-config.php ./
