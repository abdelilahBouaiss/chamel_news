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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpress' );

/** Database username */
define( 'DB_USER', 'wpressuser' );

/** Database password */
define( 'DB_PASSWORD', 'tintin' );

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
define( 'AUTH_KEY',         'r>]hQDezz,;63D^|0OhCxm~V(^3 CQCm@lh&O4kZD;bcHZVHIm?QUKbYMd&#GM@S' );
define( 'SECURE_AUTH_KEY',  'c*/ho)E1rAwk^Oa xnK6Hka} PPYLYd#Z<gcBo7STROYe.bpNcs PAp&3`4 MbZr' );
define( 'LOGGED_IN_KEY',    'O6#n.9d^OmN10&`OAD5@KNI8%g~S5U$v>6eO=[5{C3-9Pmf_q{*0!>oOY.*$:1^z' );
define( 'NONCE_KEY',        '/fw0_)//t*`iF6o1TqU$|k}KZmy^9H@ZpH.8lnj9r}n5W n1J|IzDIyy$J~>criv' );
define( 'AUTH_SALT',        '=V:;#kZk/F3u)S>fcc<&::_B&<RTdG=fjs<B2RGk#XugIHDAMeqzoB;6$~A`EUSk' );
define( 'SECURE_AUTH_SALT', '[w&@).}4,ir!UKG A[L^j/n?0XB_u!=Ewbe7`HGAq0F*-=O]G)1`D;2 m}@, cB=' );
define( 'LOGGED_IN_SALT',   '#TCU[G>-gf}ow:+bzn7=nHJxc ;lb*pXG_Yg=6geeQDYy^V1T07Mvu01pA<^3xeu' );
define( 'NONCE_SALT',       'TMo&Tj>nLyB1>7?C3--;M+::j6UgobJwLGH3bzTWy<Lp3DJ[#k-DRBvk^R>*YGa%' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
