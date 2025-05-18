<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ' (HQx6W>mZu/.8EfJ7#Ta}yjUiKrhihN4?UY;kx4.c&_y-mJ7Ts?|wd|TAc/AYvp' );
define( 'SECURE_AUTH_KEY',   'ezDW_GvI,z5}^ZPAl>h?7H~rNxuoK=!HC-c|H[}=7<c8GcDO.$W5zMtv8MOYk/g}' );
define( 'LOGGED_IN_KEY',     'GfFcYA!Q5u=&rVQ9@t+uCg9sSe@%g63rHjN_ac9%Vj&DAC;pp8++{kI}M9oMzk]A' );
define( 'NONCE_KEY',         '0(,@^L/*X]|O~]eg99QT?iQ7<=,+BL0(dXZU.8`@XFk(|mrDxi7OBLFv<6FH=9dC' );
define( 'AUTH_SALT',         'BBZu[N<svG+a<pOv^xRg4(vJwug=nG8(1 !i+JA)EP:umq;Zm.9BQj/x!&k?v5p/' );
define( 'SECURE_AUTH_SALT',  'BP)/bUe0{p}19QbUzi^0>7_f!iR:v3*x^ie$4/DrTZ,(olSt2>#92i+t7jTKGGbz' );
define( 'LOGGED_IN_SALT',    'Eatp?W |J:@Z*_{7+O[2pp_^|LK?{2C_Lu!YP0r#dN$&HMk/d@6(=93_@G-i|!iv' );
define( 'NONCE_SALT',        '+uR#Z#xBnxL:zn%A76_Dx=`pe`R:MQx/{%<1yb,pA.9 ;XA>hf1X-Xs6;fTdjLF/' );
define( 'WP_CACHE_KEY_SALT', 'n[%hNgTr~(k:L|/m2pJ{LvZo_:9]R/roR5<#Ek>};YRq4NgAbJIFA%l%6t#rk!TB' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
