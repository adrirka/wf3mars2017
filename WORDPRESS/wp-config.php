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
define('AUTH_KEY',         'wVZ5B5yHv.90HJ_}O.nn(f.:3$[wq;[t=O$+x]!vg7u5)84^Mjs;wIXdKCG8&}`n');
define('SECURE_AUTH_KEY',  '#VN-fohQ1np#/#~|]o<4x<*9X8{C-w~1e]sOnD8rswduRC3|z<, =ySn~W<MNzZZ');
define('LOGGED_IN_KEY',    'Lw2[x>rzQQt7];Wwe!m@!!N}&t1+:Fg}t8-rR+x{I52DAJwB=8m;Q&pz e1ag;,O');
define('NONCE_KEY',        'K#jp+I]Qfj+vixtO!ZUNgx Y,IhS?Hp~Sd_[dcM6E6PG*!V1Qj)z>Y06j!wLa3=<');
define('AUTH_SALT',        'W[aiI!cyP7, AW9TA,1bCdPZAewJN1r50a$ms=Le.QM!~.Ep2I]qq-i9Wp^/HX-i');
define('SECURE_AUTH_SALT', 'BX{(~psF(I>qSl]RWClyv?ni.ysY]#pW7}m>QXn0nW%pKEgN4X{+,In8niJI|rLv');
define('LOGGED_IN_SALT',   '8|z59<q5RI~p[n;u1J.Z(i@GfC[fh&yzLv2f5HQqQvgprrpp TT*D:O%Yl &]z{Q');
define('NONCE_SALT',       'k8b# GY|*mWSlOwmp{]<I.%{![S|/n(&^i,DRMbmpJf9&yt9Dmgs6_Iek9xtYoi@');

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
