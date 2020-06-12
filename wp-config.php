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
define( 'DB_NAME', 'prueba_basicofm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '7& %&?4(7A f5^bk0LD7HQFh6K-fodCMZhK3>1^0-IccL]cScQ$38A`Pp4M7STng' );
define( 'SECURE_AUTH_KEY',  'PFuY)~>[#0DmT,`@}h9+&p_ v;;(uX1~m-DYx~P8aIx_(d7dYI?Om}L85>|ICV/h' );
define( 'LOGGED_IN_KEY',    'dI5U5O7.g&<5/aF S&<gT><~Sh(S.{HBm.1#fP]T,|r;~YusvCEp8vxk6t&?2m-t' );
define( 'NONCE_KEY',        '<H,SF[W &gGz#?Yijeb-6vAwjRd]-7.FDFJ28g4RMF^SM_5=6z1~s,R }x9-GC[|' );
define( 'AUTH_SALT',        '3hbV.U-`]vGiXyQ7%.FOs1@#JF>`T4cc=H`j^z5p(A#G`{LBz:M}F~[M;51aLRP9' );
define( 'SECURE_AUTH_SALT', '>U A%C{a;uV)!{c+lHak|3)bha%_TD:]e3}@]B=5} Cq!NQ[?l10m)#!=}_FPZS$' );
define( 'LOGGED_IN_SALT',   ',(df`sh&Spe0OiPPz_po$X1hC}6u}B5vS5cxOeE^:::~p${7u*n^F=Bbe3/9^?&T' );
define( 'NONCE_SALT',       'jU:OLV(i:-.+SN(7 lZU<oR0=PID4!qKFJ4Y*hKvHblu,{0j$DX)o&7TZ.%%Y`j=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
