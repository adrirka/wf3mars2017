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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'S]o?&DP9BKpWH2,7J|^CoDibf(4HHR~;R0d)/wwN+HG)U5/mr4-)xl4N{oT6@nUO');
define('SECURE_AUTH_KEY',  'TNJ#.lDBU-AU_hu|)INCh*?:z{tLQw@ ;[vvegpUJ.C=2QjBm.fF(7jus_BfQTw/');
define('LOGGED_IN_KEY',    'KWQSop3*yA#Z&|7<rq]%*1]%if*8*z&UjXLuj@r-)(&?Fhw[YCjgd3/7x~5WMZwV');
define('NONCE_KEY',        '-iKR/R~l}%~>jhXp@zlz<<0h`NdKQRJ~EwjvVyrXKCp4Mf&yEK0Fjr=9<S8pF`Dy');
define('AUTH_SALT',        'c5 0-B@p,M0E7-Ak#Q`[/(+b1mr1B=X|K-BJ=}k!^S=L2{<g`Ms(e_NLh[J4GI|8');
define('SECURE_AUTH_SALT', 'V{~Tox]7`hirryQc!.H>u@LFbM!`exB?)?3QXp?E6WXk;W+F3h}ASFYUa!DJwfwl');
define('LOGGED_IN_SALT',   'BiU`3:GO%68|jJ2,uZ7BkaM.JkhcyH9pFogbPOx,M:3tOABSSRX&R}G-=V]&sI)3');
define('NONCE_SALT',       'c7i0;v.MN!$ZfIy3llfS&u##G;awfl~-5w[i}=^$PQ~zngjA9#G|fF/1E|uh=q{7');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
