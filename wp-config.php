<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress351');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');//$P$Bt1mlGb8s8dUpVoDf3HwkzYipH/2YV.

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'R/CqL@Ppz%SYZM=,`%6j8+hh{9Sbf$]|mr=I{NKl(kJVo.:XJgur}1O^ra7Q)|[!');
define('SECURE_AUTH_KEY',  ':cMYq@T!O~DTN,%go5%[c{BM^ULZMsI sWJ<2wLl|{zzKbf1&@;S3uJLJ:*nQ:A7');
define('LOGGED_IN_KEY',    'l KaI]Z0u( V7%,R$SyzFda&e_@/LkgW3(4bntIY/t!g.l+aiy@ku YX=0a$3!k2');
define('NONCE_KEY',        'I1>1~*iT^<vvw/8D+nCe13VPDnzD:g.Qj_O]g=5w+w&LSUY!2+iJkHL)!7a Y!lX');
define('AUTH_SALT',        'wmS<~*!Nw+N%9-bQ/k}ugj/wQ+ $)f?Yw[BBR-}-qIRiX-aiA2w9kr4jloDyVC}K');
define('SECURE_AUTH_SALT', '~VejsoL|RCv)HROqr:d6%Z~V<4MrV/vd3xtR-jQT9^VF9>)^W~1lzjq~me1yLV=q');
define('LOGGED_IN_SALT',   'gdaZKFK3!uc..0YMr+3EGIr4&*&<]?!>e>FJ7iJ_=q(~{YSS}v~2 J/vlQlyy{1Y');
define('NONCE_SALT',       '2:xz*d~!d2D!WJ2kMB1Tu[vdzdD:-Y@=a+%|!jfm)7Qh-N Nk^ZpHriRr?R?%@fT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
