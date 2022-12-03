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
define( 'DB_NAME', 'wordpress_602' );

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
define( 'AUTH_KEY',         '8V(zUv}1F>1dInCENE|>}rJ+:}()q/n/<6B9X@s#_niD|}}W,_Qb^F*gu4[:g=&]' );
define( 'SECURE_AUTH_KEY',  '_P9p$c`8K8yo?80O[7fDd;z~i5E%4h!8z>NSjfRUN;r}0Jse<<X-?Qo^vh2R:opk' );
define( 'LOGGED_IN_KEY',    'F02|0Iis5!?{Wj~`DAG@{{X21W3m x0(4Jh-.?{V/CTrjIkMUZpwQmARk5mp<(~$' );
define( 'NONCE_KEY',        '-eS]Y4$<Mn*;D7*-Jd*=W[bsZFt/w|}yZ7jUmOUx}Av~HY~:mN>B4t%L01HSM8y_' );
define( 'AUTH_SALT',        '^o)Md<]j9p3c:vsx_;@pi{wkv%y20X%S&E/@gTS;g.@fbek>um{a`cL!~HqW9Dun' );
define( 'SECURE_AUTH_SALT', 'Ik~dK2$pjGgb5DHp[l2aZq|6|T%F8Z@O1Ju6H?sS^DY:o66nzIi(jFi@enc1Vw2Z' );
define( 'LOGGED_IN_SALT',   'z]xn@C{1VnEOKr2D(&pVf@vGf~Mn1#_IPH:!+ZGyxTO/P)9[>,G+!]L?N dF#^k;' );
define( 'NONCE_SALT',       'T7su42~d1c:s;{8)ruuA957Pw2#$OwQX{oY}83i;nzXX:*A{]M<>L;cqU9?h8:AS' );

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
