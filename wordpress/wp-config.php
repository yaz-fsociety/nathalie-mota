<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress_db' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|VEo_34*9j:g#_(`R1G=5dor1cj25S0vbVULXADB}<VE.Rvwi7_rz,>#t8a^9u(-' );
define( 'SECURE_AUTH_KEY',  'P8$ PTPX Wn!lp].#sW^[j0E8ZVQB)z9O9KmsXoVtpMN|aaJYp)b>5}0`$|PbD%Z' );
define( 'LOGGED_IN_KEY',    'm2@FjIcMYA3,pN}s*v|x}#puY,p;k?1B!aNm85]$Ub[C6G.,eK!+aa]6p }]:3;@' );
define( 'NONCE_KEY',        ';A~LBni)s5{0Z^% yZkJfok!5w+>]VR%g3|Kh;Oo<%^bkoa;K8;<4jP_&g@ <P:n' );
define( 'AUTH_SALT',        '?{aQX]Qps6#O$$ahjS(o<X&U/v>$G!!<e%Mo&DuiM!b&w:tx:G;EgF&`siskB ,x' );
define( 'SECURE_AUTH_SALT', 'xhy,G}ESG`I3l75a-$b@gbT_SXrx.ipLfta0s(mg@T7k!e#Gr2DTUhiR1g,h|B3J' );
define( 'LOGGED_IN_SALT',   '{v@16B%lc[.m;*V_#GH2e+$F+?<5 Wg7{[#8Kt,AL|AP_T=Tlv`lKqVOI!vV+@il' );
define( 'NONCE_SALT',       'RFjMuN7OS8?B_02_jZ4j}h]Vedx`0a^xdw:Fh[u$2mOjj2*a~:J$^p:A./yVD_Pv' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
