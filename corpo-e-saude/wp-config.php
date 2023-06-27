<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'corpo-e-saudebd' );

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
define( 'AUTH_KEY',         'pUM6]EF[i{yC<7z_K|-Fw5wd#HqX5zG+qC,]#la@&<,&[x2in?a;qJ~|a[+L+;LQ' );
define( 'SECURE_AUTH_KEY',  'UQ5;,apa4w%e=b%BRI85oD$*y601/SeG^-Q5wG>DM!@ji:WSP9T`*MR9#+EN5Y-U' );
define( 'LOGGED_IN_KEY',    'O-E|98thk_a*+Q@s0*qrWQqM1dM]X)rGKLb:YF*f7ud.NHd4:ZdAN|=Z)D]6B5dV' );
define( 'NONCE_KEY',        '3!31a#~*pj:j9u%6ki|yl7utBzt+-DL(gvWRAH+PAR=b4WJb)24^,3ziE2HvZQ_K' );
define( 'AUTH_SALT',        '4Kn10Itw0PH- J~a/%*3rJ_0fMEI$yY(MXC*{RhFC*N@Z/pnvCGm~vkU(:Z/iVRU' );
define( 'SECURE_AUTH_SALT', '*7lK1igbL/hob39QTr_U-Uct=Z}ij[ETjL;{om>`:{x4wn7Cp0:vk%xbJ>lNva}e' );
define( 'LOGGED_IN_SALT',   'rvIY=%x=+Gl5*!uELnu0on:JYD-9o0#|wQrg|DA(mLZdjOD~a}ka{ G&KVi~TK~<' );
define( 'NONCE_SALT',       'k+@JR ]d(jcm*_JkJlJKq0yBI;Rl=+?h#9kI[1tSlf<ym|mhX{oA?KV#~x{y%Bm6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
