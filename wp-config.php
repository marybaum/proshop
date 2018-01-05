<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'proshopDB8ltif');

/** MySQL database username */
define('DB_USER', 'proshopDB8ltif');

/** MySQL database password */
define('DB_PASSWORD', '8gVHN3v0hY');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EjrbX{y,vFB}{cMITE.qyuf{<yuEE<bXFC}cZgN!@okg4!@|sGCN73kgnUQ,r');
define('SECURE_AUTH_KEY',  's[4|VRNK0khkVR!@PA6mimiP;*+yeE{<;+bIEPL+lili2;~+xHD]D]#aHE{fbIbIE');
define('LOGGED_IN_KEY',    'S89#lWZWGws@ok4040!RNKG:sZVZRN@-iaW#*+*+iH;]]xXDAP62iepaW#_#_pO51');
define('NONCE_KEY',        'L2.XTEIEuqXxe2;+;*PL2D;eaLPL+miQM$njnY7,,^nN303gcJbI<u$yj3<$yIE');
define('AUTH_SALT',        'sd1!|!RC8J4zgckR0!@zk408|!RN51~eOSO5-hieL]x~+hH;]8|lSORC_ollS1~-~');
define('SECURE_AUTH_SALT', 'Ko+hH;51~SOLH;taWeL]xt_pO9C8|lSOKGxtahd:]-if{y*+LI;A{bXEXEyub+ie');
define('LOGGED_IN_SALT',   '47nkcnjQ$y$yIB73}>YQMQIFvrY51~ZWCVO5-hdlSO~-~-tD9#G8|kdNdJG!oksZ');
define('NONCE_SALT',       'FnYQjQJ>vn<^nME{A7fXTMIF7nfbfXU>uskR:[w[!oNG841[ZRORKG8ohdzgc8|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
