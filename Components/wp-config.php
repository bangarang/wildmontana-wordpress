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
define( 'DB_NAME', 'ad88e6d8_c4c060' );

/** MySQL database username */
define( 'DB_USER', 'ad88e6d8_c4c060' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Huts45Stilt53Lubes81Pummel61' );

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
define( 'WP_CACHE_KEY_SALT', 'cm&66Bj:qNCia:7}dTrH7WsPhet.*)i9*KG[%{hK3jGF-E`(CJ}W@,VjIen8Gt1I' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

# wp memory wp back end memory
define('WP_MAX_MEMORY_LIMIT', '720M');

# increase public memory in wp
define('WP_MEMORY_LIMIT', '512M');


define( 'DISABLE_WP_CRON', true );
define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );
define( 'WP_REDIS_CLIENT', 'phpredis' );
define( 'WP_REDIS_DATABASE', '0' );
define( 'WP_REDIS_PREFIX', 'wildmontana.org' );
define( 'WP_REDIS_TIMEOUT', '1' );
define( 'WP_REDIS_READ_TIMEOUT', '1' );
define( 'WP_REDIS_MAXTTL', '604800' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );