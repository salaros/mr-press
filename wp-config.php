<?php

/** Composer autoload script */
require_once 'vendor/autoload.php';

/** Load the settings */
require_once 'conf/wordpress/bootstrap.php';

/** Sets up WordPress vars and included files. */
require_once sprintf( '%swp-settings.php', ABSPATH );
