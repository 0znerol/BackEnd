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
define('DB_NAME', 'S2L4');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'imola');

/** Database hostname */
define('DB_HOST', '127.0.0.1:3306');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', 'cYDaOY}{V]uL*hEIlv!Z@$=r$t;Jn1*aB=eitqo<m~<wlb;$O<mji2G(k;b1P/MM');
define('SECURE_AUTH_KEY', '1#ICO9Kwc`zv&`UlF+gAodK*& eME+}ODv:!,0&9?$H3nsnQJH%s~Kyfe8Rf[$.?');
define('LOGGED_IN_KEY', 'BMwC|Q[TMU^Y~x=ipPFFS-xS-f__Eq0}aXk).V+;hl5gKxHt@A|-0]oxkPK*~qMC');
define('NONCE_KEY', 'lpW0,!~G@f0!:|Wa}U?`Su/]j@peHs[j5}zY}coTU&Tz5yY[ge~F*U?2Kr<b9:Z4');
define('AUTH_SALT', '=<73oYsT3tR>HV,.%=gj2sj?e1JiX?7GxKb5x+>7D9Q75Va]<E)$}Znt6*bkY^C+');
define('SECURE_AUTH_SALT', 'v_lbP>8z^RLCqaB-3!IN/H@~,twlLbglQ&@al$^w4qK[V|!EF-LkDfdrUIQJ>_%c');
define('LOGGED_IN_SALT', 'I1v8?UO#FZ*Pp(nuP2CBQ03cp8l(}NT}G9Mu2I/HVROA~Ecg|u?UmDW.6)/}O|&L');
define('NONCE_SALT', '5DY2;b&]1I.;9VFcX}Walj3kk%=ty.:f>c<F0S3EqK!XzE6nAnb9p]Y(E,mbS-:,');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
