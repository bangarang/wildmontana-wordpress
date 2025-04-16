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
define( 'DB_NAME', 'a2834628_c4c060' );

/** MySQL database username */
define( 'DB_USER', 'a2834628_c4c060' );

/** MySQL database password */
define( 'DB_PASSWORD', 'MewingSlowAvowMuses' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'z],eMj7o;$e%R}EB|D.gJ:M|JiRC}Kz#U&fy41_akC}AyQY97HTt~(FgbAOOD9Ci' );
define( 'SECURE_AUTH_KEY',   '|9Y8-;v?NJ^WELw!wH)4wuCv^X8HAxy JMF6K1x-J*1=D?H)lcAAlh;ACS$v8pd~' );
define( 'LOGGED_IN_KEY',     'Vm9`Wl7I$*g! HdpVEWUE&e;4fp+N[vAl%5rL8|bZ`}GJM,kn^Z_zq~BiG#0cV><' );
define( 'NONCE_KEY',         'J(G</TgVgw7kn/QB;Yw,r7;MW8@R%EJ:%%22btbT #NpUfuNUEav`a!Ve6].v9IT' );
define( 'AUTH_SALT',         '=s%TwNuS)st:cP7X43%%#qAB^lkUpe6R-^g&(Ez:0,3p~!Z,92/sz$>h!PyVEVKN' );
define( 'SECURE_AUTH_SALT',  'KO;vpTe>Yg&_:3~|4@uMFS`kHlh%THFufUVm[pvIsLFHyxSqqgW`<k_ohCwhr9&S' );
define( 'LOGGED_IN_SALT',    'Wf~$t-_YL$J7W,#Q-f]65>w[drf&4qtVv6f;}6v_.hr_MOp1Z?@dAlx7?dQ$uTf?' );
define( 'NONCE_SALT',        'EX9StDL`!]rsArgyZ8d!pn}*o==7,0K1mF?603Q,~MO(Uh/&S~})~iih|n^S/ed{' );
define( 'WP_CACHE_KEY_SALT', 'staging-site-64da6c4b93a81' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'DISABLE_WP_CRON', true );
define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );
define( 'WP_REDIS_CLIENT', 'phpredis' );
define( 'WP_REDIS_DATABASE', '0' );
define( 'WP_REDIS_PREFIX', '8e4df766c4.nxcli.net' );
define( 'WP_REDIS_TIMEOUT', '1' );
define( 'WP_REDIS_READ_TIMEOUT', '1' );
define( 'WP_REDIS_MAXTTL', '604800' );
define( 'WP_ENVIRONMENT_TYPE', 'staging' );
define( 'JETPACK_STAGING_MODE', true );
define( 'NEXCESS_MAPPS_STAGING_SITE', '1.43.2' );
define( 'RCP_DISABLE_EMAILS', true );
/* That's all, stop editing! Happy publishing. */

define( 'WP_DEBUG', false );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Enables page caching for Cache Enabler. */
if ( ! defined( 'WP_CACHE' ) ) {
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
