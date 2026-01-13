<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u31thai' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aF jw, iC90PNawgcZ1g0l2>&rl9zayPox`]{5u5q dI6tE},<FDNC(S%KDu2k>H' );
define( 'SECURE_AUTH_KEY',  'oB|zA<SwuJ|~h<<WYrvhujXU(ohs3Ov.@Gc%9R#ZB7TjUVtpv#}=&A-/ZNTAMqME' );
define( 'LOGGED_IN_KEY',    '9ZOddlCi64F#In.G_w1?6Cf_&@qk^-Ig9dra-BbiR]DO|Z879U=yQUTQXBsm5Qh&' );
define( 'NONCE_KEY',        '5@V<lEdw(4ZNP}:[/sa38>T?~y |u,]s#x9N`Oq.UWwUJx,GqaqSVNVA=fZFPiZ<' );
define( 'AUTH_SALT',        'm%r8DH8HV*$G56G7s7u{MFt~jMhc5iDiB:_(0O4y)Cn~EN&e6neHA3UAe>>*{l;i' );
define( 'SECURE_AUTH_SALT', '=fT-2FV9jo]F94hg|EgUQUlF,|@{p3+p}tt0.i+6i;dq(8:LuI:FO6pjk~o!Y+</' );
define( 'LOGGED_IN_SALT',   '=RllU 3h>)[,>)n&f|sdg|FF#^b<8p3xxfT@-zIpqCDm&1(;1`!k^##NW$;#F];x' );
define( 'NONCE_SALT',       '{q2cFA!RmATL@^k]9!`Cm(Yy(o;1kilws{DI?uig%nIEv#hDZ]6?D4v!5W_p@|KT' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'u31_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
// define('WP_DEBUG', false); 
// define('WP_DEBUG_DISPLAY', false); 
// define('WP_DEBUG_LOG', false);
define('WP_DEBUG', true); 
define('WP_DEBUG_DISPLAY', true); 
define('WP_DEBUG_LOG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
