<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'theme_perso_1' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'S5O0 Tx~JW.gp*, */,5)m!7c&B|wdEe~/|vT=@^;o>%paDOAY*9-XsEK7d*I,Ln' );
define( 'SECURE_AUTH_KEY',  'z~LCbR~GeZBP9?6|9{g{w`T cRXo`xU$oeix$&v%8%?Hbw(fVo+>V3/d{[iNc5H7' );
define( 'LOGGED_IN_KEY',    '>Z8qHn.L_r~a._Aa?3%wMsXjXvo[mGTXn^RXJ>BlAf}U$^lhdT~%$J]%byF37Hs:' );
define( 'NONCE_KEY',        '#AX}(/J-1fFBpY({~PRCkc${~?fT5Ix5/V=j@I6?$A}~jTNUKmpn9s_$MVV4*UD4' );
define( 'AUTH_SALT',        '2jYp>L#!5JsMd$;o]nJ5@ns7XY=~m+9peF,!F_q vRzmi.gc%D^M+{_AC@bLZZe}' );
define( 'SECURE_AUTH_SALT', 'q p_Gb_:e5+}h!ulJ;w,o,7sA|w3~zgu/CeV-O#Pi[^OK6#7]DQGv(zPDqfRVxk4' );
define( 'LOGGED_IN_SALT',   '7|tBPkz@~odrFY#d9v;X,f<<*bT{t5{b%wei/Y<h-H|Q_?yBx.NQ>+ F;J$UQhkO' );
define( 'NONCE_SALT',       'G]Kcc(/G+GF<:s3-xNQrPQ#bNo/E!h`(G?3fX18@$hM5Ce6oua[wgq{t7yBxz/MU' );
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
