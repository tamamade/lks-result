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
define('DB_NAME', 'db-dump');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '/VR7wPjFnG1}09&Q96zU]qAZP|!Yxij:ZE(b}=f:yTA>Mb?!P^7+[LFC}C *T5yn');
define('SECURE_AUTH_KEY',  'QY%]TCZo~dqb/f.{G}Z{bBuREi{hRwY?M<0%.6Y??AOPp#N`l}cOczFSu,)mD+<T');
define('LOGGED_IN_KEY',    'O$rm(ekQ]KHpLbL4gF>9UuVFRf}cxkdfTdx`=fZ9.>@)9V1`SOnLe}7bn+b7Q_Z#');
define('NONCE_KEY',        'R8Ms?hczglO`bFhB[ZHB}s!-ldP3fB.NE_@R{,+?N]ro2:o@sKTwNIhIy|t<vB8q');
define('AUTH_SALT',        '/xzC1<8$ #wj`l{[T(;j[ii)Xue0UEUR{X836v`6J>s/4E5xzh*ysENfU]O<Hm&$');
define('SECURE_AUTH_SALT', 'w=+Gl&*B3;Ov6PJ+R7<}8_fxx),j{}sCaCp1lK2Y}<Ngai7Tg<,;F&Y)P !F[E=k');
define('LOGGED_IN_SALT',   '8JCku/h<}Hksr  _Y^}VsXCVF#ykH$5]&*:V1OC 7*(ZX1O o_EC*7jiA2)l4ZLd');
define('NONCE_SALT',       'ODgP{Jm8fWqdn&$xrs%,Uvz2na.4k1CKUp<1{OhQ,c/ N^4FJDP_aN3i)dX%tVmb');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
