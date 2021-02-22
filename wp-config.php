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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'maltafir_WPVVU');

/** MySQL database username */
define('DB_USER', 'maltafir_WPVVU');

/** MySQL database password */
define('DB_PASSWORD', 'ME.7R5%:c=w.SuUH7');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '48da12402aa7d6d3c50e1caf0f47e499d652b88fda0db07d1323ae6e5d6736d9');
define('SECURE_AUTH_KEY', '94ead541e5ee76f6fa9f6a7b3e320772e0f8f7580b9ab0cf874cc1de30571fec');
define('LOGGED_IN_KEY', '416b4d4007fc331ea48a40bba480c1eb2dc7af8342c0fa2835253439e9eeed82');
define('NONCE_KEY', 'cc2c1fb39da8d41adc18b3dc1d148268142eb16ea8a66ed365200ed4e02d4603');
define('AUTH_SALT', '8f2fb3c5873dbcfc57b1714883e0ca87a187ee12a93ab73b6e8ff1e3d6559d4e');
define('SECURE_AUTH_SALT', 'd28cf09e7650364989a155737607fc19a76d7d1de54538bb19e0f340e76ae4ec');
define('LOGGED_IN_SALT', '6f3b9c486448a5f5cc6ff817b62a0d77581c0fcef1f53f9b6ed010e9a61e4a27');
define('NONCE_SALT', '83109d81bc647646d4789d593fc501803f1003889396d441d5a8b92ef527a884');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '9Z0_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
