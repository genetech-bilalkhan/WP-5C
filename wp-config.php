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
define( 'DB_NAME', 'wp5c' );

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
define( 'AUTH_KEY',         '`Dg<Rx,3wN;(2:2Jz> dm,dG2uq/g%y(*=5*Y;z stA&u`.SqC&b}FqGe=4.++;_' );
define( 'SECURE_AUTH_KEY',  'Bpz76fB(fwH1YBu-gNvbnr})`*XqYkKj{#`l+nUbpZ0TdevHv^egA&+HeaWgc&RD' );
define( 'LOGGED_IN_KEY',    'j6Z]w^k.-Qx?PsXsO4.]cH7CUn?xT*A4V<:ZS6j<vLpuBbOVhhs:xGe>3,%k_@Br' );
define( 'NONCE_KEY',        '>7./Aj$: )dI#n8Y~elz[KN:3[f{S]4pu)ng0v5`d$^) (kcP=@t[kL,uoP%vY(d' );
define( 'AUTH_SALT',        '%NgJ_]HT$a62BT)[nNt`]?I1tKxZ6qfqC )({5eFmi-yHbr)7X(aiv>!YD!0M]:;' );
define( 'SECURE_AUTH_SALT', 'a 6AEtz#K#@I|=e8as6Hg7/RRi9a?+m5+sK}N:[d9a&$@sPl5k6;E@a}KPf|;Ni&' );
define( 'LOGGED_IN_SALT',   '0PJMOhj;ft!vsO4|KJwFu> hXnf:4T6K#RH(lt7;#X p9Chs|wkfgVIt,0;Foz:A' );
define( 'NONCE_SALT',       ']^Si}i4vtLgtL|u:-,-#F$5S25O;(v@& @o00j;7gz&G5m-@W5&Vl2A;O`s]$NRT' );

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
ini_set('display_errors','Off');
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
