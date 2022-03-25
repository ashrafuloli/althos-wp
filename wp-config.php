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
define( 'DB_NAME', 'althos' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'b8c:#}e7yfgje5:4>s[=2-aG8+v1zM~rC(67VA{T}mbJ+e]{bzf|9oqhmv(q#~b}' );
define( 'SECURE_AUTH_KEY',  '+P1Q~:^ff)_C_D)[n_&y+@KkjlS.y|#co3I_LJrj_>jQ>L]<=lTPFQ5IS]#Pv@qu' );
define( 'LOGGED_IN_KEY',    '0b?x?8,8`RDXb/63fGQj.gyH|_@~@m9U5d,alEKQ^wWFW>[D4(;pXhcO21b0!38p' );
define( 'NONCE_KEY',        'CKjN.+N;`P)m. uuDn&7{[%]+;^%t[-YE]=2x!5{QjmFir+jx{Qh,5#V*_?(DyIT' );
define( 'AUTH_SALT',        '20WZEOnHaxeeR^il@_!(E4BuPrb3LfKP|i)[TA$/2u&E.j~87Q4H{?L]U]Oxii96' );
define( 'SECURE_AUTH_SALT', '84scj/vy;I~E`N#6F%4,BG2PmXm{Uw6H#pd}4R7q,[;mvA3 j4Gn@<E9#K3qvMO^' );
define( 'LOGGED_IN_SALT',   'ip$e<o0oUM{HW^^#aGa}p Z7VOoS!@~L]{.&h.p,)c&M5)r[{NqlGTCeF)x.U{IS' );
define( 'NONCE_SALT',       'A?jo_j:58d4IEw%||EW}ZptC}VS~9h99{RJl@A;48W_dcknd-y@J+0bKJv-*j|1I' );

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
