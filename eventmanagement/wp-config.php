<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eventmanagement' );

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
define( 'AUTH_KEY',         'R*_y&W,,HVdJY`.*;04u@7k!AaU*/NnU&HOm/o6dJfSz*DJ*Z1Ny NHy^R@t}zIp' );
define( 'SECURE_AUTH_KEY',  'Yt>^,*TT4z2Q|@14<Fl?wzRS{]JZ,*7M>Hspi~%Grwhp4-^]oT}0dcaucY7C1Qdd' );
define( 'LOGGED_IN_KEY',    'wyh|T$QZIMqKR^w:m VvXx#j]fk.<@#bq8(b?+o6}F%J<5BZHAqc;O_0|}q$?z1*' );
define( 'NONCE_KEY',        'BIPw#@>5._miyZv{xW%~xl.mZE|Ppd|iqd_h!8UpX8v]<YZz1xnhJsytMmJ.P2bX' );
define( 'AUTH_SALT',        'vc%,2ySwn@1TKHS|#j*SSza&u&`f#_ZVjHQ(&xaE 0L7liQPT917DU*8.0>K5VDK' );
define( 'SECURE_AUTH_SALT', 'E@<<O.YT-7q@jfg:0kOD$-`2,EuRF42/m^d.$MV@0>`Aj>b|2Aff^t:ao3eWciP)' );
define( 'LOGGED_IN_SALT',   'B|[qKu+OqjUne)OiL?TA(GWV%fG>`e:ix[}x7+si=: 96p$TPW0DfFAcB!2K6|TF' );
define( 'NONCE_SALT',       'FMG_Y~0>D/O}]b0?Y |:wGRhtw7p*X ^M)RlMxW~UWGMA3*Ua+3I6[m<h`J?%cU,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
