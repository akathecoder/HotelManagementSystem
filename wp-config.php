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
define('DB_NAME', 'hms_db');

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
define('AUTH_KEY',         'Nmkb,^01F*Wmu6P1X i<@T$zR#DwBln#Qx[QJTKQu6}~+H9SNZ(|flfkN<6)|l08');
define('SECURE_AUTH_KEY',  'Q%,p,.t|Cw(vB/fjH-:tzJf$P^7{3ey*H?L4u[6il/o@orc0k:[}Tg2^zW|1+res');
define('LOGGED_IN_KEY',    '*#35r_8J$X@EdM2JWcG@~hic_u[DzmXi6l6qVpW|ffp~X}`l MU0dAv{I)Gi(XB;');
define('NONCE_KEY',        'l[2!,*1:xlDc ~CfM+<y8sYH|`ZDH!8=9$T>i*({#(Sp1xVKa4saYL/U1zHsHRA(');
define('AUTH_SALT',        'Q3H@zZ4V0`%~;p_),!G [Y`&_Nm21T$0.`3h}j;WOc7z&>Z@`l7~K-O|vqWb:^(U');
define('SECURE_AUTH_SALT', 'jI[#}BnQVgqsS$4*_ 8v#R7Tt>O>(V+~v+N)yA72pzHbbvNiE-+J(E{e:GDt9x=Q');
define('LOGGED_IN_SALT',   'M.Yc FLdzrxB9JI7Wh>dD-n`>#eE9!DB_XxU.|a&?4i?SPtOZG3+}_{,<w(~]HL|');
define('NONCE_SALT',       'jv%A1|{-KL[wnn!$cPr5a)1>(>G|sm,N[3fk|X%tlgxC)[vGBpw)-iuRiy18|%r/');

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
