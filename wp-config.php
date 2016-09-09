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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cnectco_main');

/** MySQL database username */
define('DB_USER', 'cnectco_bpenchas');

/** MySQL database password */
define('DB_PASSWORD', 'm48dsi4[Go/P@');

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
define('AUTH_KEY',         '/e$Dem+RHABc4F3_#R?X#q]/qa-zzk_B$l?)-(Q@Y<[T~u&I Ua}sGPPJ]KP>^Xf');
define('SECURE_AUTH_KEY',  'F]57t8RUI:mht-if.6&;UmX c)u5aq|jeLwYIz +y@C3X:evVP|ukJSN!qi4.`|r');
define('LOGGED_IN_KEY',    'GFP~i+X:{.?4d;H|o?.DnsE(Q@f1 ~,$j|AFiFh|DH${dN-7FPNB-SL*Y}9gn!-i');
define('NONCE_KEY',        'b8t&.lZ=|2m%FY<!Y0,u;~:}@]j]db 2 e69|N1L;cV.!&=W/hGH.[halq=j*P?d');
define('AUTH_SALT',        'AA7>IF^CI^:J/#-JlN4L wc8g^& _5<Kw.E4<%LL(#D7b0o)fNaN$|@+x|I--f}/');
define('SECURE_AUTH_SALT', '$C!AKUv8}l3??6f[f:KO,+hj+GboJR;bELppwF$bTS]@&g0N]Sko}!R|YNIK,|$e');
define('LOGGED_IN_SALT',   'Hs[~zsUoVQso^IzXzJMFoh6O#p$:en$RVQJ%wg9Lxhs#|:,,-,WjEs)ZgDDTH((f');
define('NONCE_SALT',       'f+FGVP)I;iGe>Qmz;j`<p:kk6,oiC-XRR|W6J6(T_VGyy|0?MmfX=]-}Vo;]fds~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
