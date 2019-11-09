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
define('DB_NAME', 'vervezh1_verve_square');

/** MySQL database username */
define('DB_USER', 'vervezh1_root');

/** MySQL database password */
define('DB_PASSWORD', 'Rockstar1234$');

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
define('AUTH_KEY',         'tExp;>3]S,%r#V/]<[lNa_Q^kz8p&ZrbXF&,6#jBB~EU>E$|Tb%s,`{5j zbWO>:');
define('SECURE_AUTH_KEY',  '< i$FY,#Z2d&h}T? pF)770Oy^f+HS*$-GHd,J8%+#tlwI2Tn}vV|LvIF~n(d&`)');
define('LOGGED_IN_KEY',    '0JW`~N,>Md+*0M;giTl/pdp8P?M;EDi@SsBl*iHq?Exs?^t.:F!fORGCN`eTPiO>');
define('NONCE_KEY',        '5<I$eD%AdQsbFn,dwJy4ZU1p$0vS}Ze#0%/ievZ+#_Uxz:h)CL%R)U;h#X^nqn`>');
define('AUTH_SALT',        'V6~*yWV6|JR@>Lc2Y+sycOL&vOEob9@CZ?pW*xa.BjrwM}a(KqoHyC^3z7~UbH>T');
define('SECURE_AUTH_SALT', '<RFdp|zac^a ^wA.f_4g/q@`vI4G`LaqJtdXyS+8i,&%yx=K*7<:. M+lz&dSRI1');
define('LOGGED_IN_SALT',   'P+MA`h6?b:r8yIIT{ECK^pK+xA^vM:0e%=giJc[9L$k#v 0^wbb#w>TJyZ#Zb: #');
define('NONCE_SALT',       'r+VFmQW%[4NS2@5t-8oD;P|]/THH5)PyA+(E0W;HtH`MjbWsTXQpD$X=ln`bgX4^');

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
