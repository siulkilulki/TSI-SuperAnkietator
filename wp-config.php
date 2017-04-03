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
define('DB_NAME', 'heroku_d2762c25489f313');

/** MySQL database username */
define('DB_USER', 'b13243e3a40ec2');

/** MySQL database password */
define('DB_PASSWORD', '63bb2ed2');

/** MySQL hostname */
define('DB_HOST', 'eu-cdbr-west-01.cleardb.com');

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
define('AUTH_KEY',         'gR?#_EjtWo5@AVI+Y|q-M$ij~/Mzcf}0`]9U=z=r5[fnS!4K4IVQU(_ny=1V<czc');
define('SECURE_AUTH_KEY',  'm8?1,Q@zzBg4>1Bm.)sfOy,$ .;}mdO;q>YE&`n)VOk_95hc^U;mhFy,`nQn(S)j');
define('LOGGED_IN_KEY',    ',8*eo_ AhwPh[HlmhU+8/gL2359/j^u.U_]eys1vfB2cGhB<ud/w-T,9ofSVqG2F');
define('NONCE_KEY',        '4_#ZWKMo;.e;k6D0N^<wOn^?(aVN-.#&S4# Xw:fXIM$vU~YF]7Yyq`wol8gq[25');
define('AUTH_SALT',        '+VL{>pjLBRp~-?-oxpqOK/];sP~Ml_OCm Ub>ia9GN kotnbiTQH,?F!KNWyPvTV');
define('SECURE_AUTH_SALT', '~spE/[~NSN!fGi!@_%kp+ztV}>|f~5D=A`[ChPn/Y[O1UD5e2.vpa4qh^TFr[^r6');
define('LOGGED_IN_SALT',   '=m6]=PiXoA#=@/|!P0_BGXqfz5ld4V(xnFhV6{dkXoZOLoD!_eQ9$-)cSnVTH}DE');
define('NONCE_SALT',       '2i:;q-zXp-$~I%<G1V[PA?n&Tm%AzU(Z0)2>o+w;>U/.5)w]VLy7x?PgAB@c>S+C');

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
