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
define( 'DB_NAME', 'youmekhotang' );

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
define( 'AUTH_KEY',         '}ze}x;B;J%kcWy/NkBhuGfah%6exr.?!/ix<bI42F)!qfl[V0R&5?]$;dHh%X/#W' );
define( 'SECURE_AUTH_KEY',  '|~9b<QL7<B:6SMz4H7A{6F@C[DHc1.fTbN6pe,51pxb?4$u?u6[MO~iV(D2do1:3' );
define( 'LOGGED_IN_KEY',    'T-}*;o{y%LiQ%`BD6 {,Z&yXHDP+nDx$#}$G@TyQF=1df.Occ-C8i<{OcU([Kf:J' );
define( 'NONCE_KEY',        '&[g;Tw{wi_{k@b^;R,?iQwO](?K/sx|YK=lLk^aH^HD;]^vhrfd3ZT6L~$@cb!B*' );
define( 'AUTH_SALT',        'X3?9@v>z)A=01 -m;Ut9?FJ9oW_&`GW[6;>}Lr=#0<j>WD14xt&R>>0PCh2ItQ9F' );
define( 'SECURE_AUTH_SALT', 'al~MsioaE~ddA;~_XJj@qN9:zhhP>X#hkC(eqOlI[xtP zCQN/c$M<._CnUQiHTk' );
define( 'LOGGED_IN_SALT',   'jd$j-0uQZ>K[Jy:;x!26a/|b[1]t|~;L4D[O~fC<M]rf1W=}Gq~Q,R|BH62K10B9' );
define( 'NONCE_SALT',       '31S+^^cMS9!@;!AO.(Uh|SlQxx]_dcxU@Q`SvA=DLiK[,Zof(l#:JE;P*wQ=T ^o' );

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
