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
define( 'DB_NAME', 'Demo-Site' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '1poogle23' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'QCtQyrmfP9pLNGgB4A3ZOKfkLEprxKM48liCDhFk761OrEJOJplSgGxV9yCcnybL' );
define( 'SECURE_AUTH_KEY',  'fS0cTqmbJ2xjVkUTZzTpH1kWNuEz27VZmnQTiU3XBZglrFtf1GENgE1dcL1op31W' );
define( 'LOGGED_IN_KEY',    's0M8QxiQjZjgsF0rc7rCI2TqQwedMf6z9vb6AUfR6JosX7WYER4QNrmmMnFRkbwl' );
define( 'NONCE_KEY',        'J66cBXUWZfRqvrSfks7z1MCCdPl2rNzBJBViFLR2zbzIi5bWbKLR0X5eRRzTCMNZ' );
define( 'AUTH_SALT',        'm993JtOlgJK93C0UphPAV0PeqD5c7zoBR2Ub7YAv6Atfes4e2YB7wtnZE6iCrkky' );
define( 'SECURE_AUTH_SALT', 'SIbFF4a8ngr4g0JG9TUuoUgh93rDpJdrL1hwlmJCBTO5Uxj03EuUbTBGH2aZeHHf' );
define( 'LOGGED_IN_SALT',   'BggIZwB0OIuy7ZIezWjCJUfsQfuxq83C9TSXXn3s8mhj6dONHqgziuXvdyJ68poH' );
define( 'NONCE_SALT',       'r9I4UAo2tN8q2HDfOBVeGoz5d1FLfjxH0Ihta08MEgPQVWOV6AE94x5KIONlL2DF' );

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
