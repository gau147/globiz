<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'globizte_globiznew');

/** MySQL database username */
define('DB_USER', 'globizte_gcvuser');

/** MySQL database password */
define('DB_PASSWORD', 'plwHXw]-[IJ8');

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
define('AUTH_KEY',         '~Fo]24<*[f<pHS5PWvBe7ZoY>HzR<Bp stJHQQ^3wZ#Zmnl]c8`]V2[t}2i*F#7A');
define('SECURE_AUTH_KEY',  'l_^Ehhl---i/s}j6/{aO&@T];twJ$86_eWa^Areu[W=}bU(2VVRZUS<@#BT2I~tU');
define('LOGGED_IN_KEY',    ';#Tu>LtPyxpnr^u6/l!v:gI=/b?;];~_= d-eF.qXh/;i2tbU<i/Ki+d,iuafk<1');
define('NONCE_KEY',        '#%^z_t^MF9;~0=%_cAc{@_{BcyK}sy$7KQzY|uq87v]r~w5e1x@RH#>0IwMdrAmV');
define('AUTH_SALT',        'h5](j6lLa9^iyFW++ojUCz&@64fCG`^AY%[lH,.Ju>xBod1#%zKds]|ok%vF]cug');
define('SECURE_AUTH_SALT', 'V:x*Ddvi{W4v8?>):Rk:6|U,aRNGdIe<e?z?|U)/48Z!f))K7+y}zMr2Y#)K[TC!');
define('LOGGED_IN_SALT',   'Mc#(|u~Ca1CnbvQId3f8-r1BpZ5tvl;i[2%G:(>TV%4p@%>HvnnR5N-X2*kvZ1J:');
define('NONCE_SALT',       '=,^kbb`m~Ohc%}2x03U}<F9j}abfjyUyvm}^5-QV-EwkhnH/s7QY|.V^c>t&1!MO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
