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
define( 'DB_NAME', 'vege_start' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '@4wljuOY56Y[IaHY#CHAL{d#-XC%&PZfI2: +i$rjU]N4Ba?mayg#sO$I9EnQbu6' );
define( 'SECURE_AUTH_KEY',  '-_#FRo&K;7=k%# 55Wu5<UB>K=,kUKGnqK|d8e;z=fekrPe d5M)W9S1|gFe)WGd' );
define( 'LOGGED_IN_KEY',    'z2!2xm&YVKDBt7!ZC4|~-3xH k@LQ@tf&bg_*pUggvp,-vU+unxei]$@?e.A8Vra' );
define( 'NONCE_KEY',        'w|{}k{+uT[z](bubL2pe;[ptXb21/!f&{4D/EqWQ }lX)u,xeud!j^U+<oPZZ1ID' );
define( 'AUTH_SALT',        'B2?Zo&ovzb74{Tr5%vGym?*6W]luNp_}ik>Pb69+^pk2x8Juba!wFrN)Y8rnOD[&' );
define( 'SECURE_AUTH_SALT', '7i&<Y1/ `g0vQe^=~o/H7P3IPoEqzSCIqOO?AsI/B8UU.~K)x:+7kU&5t_AQgv`K' );
define( 'LOGGED_IN_SALT',   'JM!],%EaI^,mWrxvGt/aff!dgAop3(DHRNeG>;w5Rfmffzi#;J^X8@wG;x=%B wX' );
define( 'NONCE_SALT',       'Wb[X%)6{bCiM@u#q%Xt,=OK*Q0EL}Y]2LO^,^OAR?5^0 rKJab?mCeK0jO:*zCtG' );

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
