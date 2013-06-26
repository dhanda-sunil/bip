<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'shop.bip.it');

/** Nome utente del database MySQL */
define('DB_USER', 'shop_bip_it');

/** Password del database MySQL */
define('DB_PASSWORD', '4Fvj34d5vkdl');

/** Hostname MySQL  */
define('DB_HOST', 'db.borna.it');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?unH9wK4T_AZ`{-|0r^Pc;v=B3ccPZe}|LD*4iwV<L]^+F77;&z<Mn-0;ci_+0AI');
define('SECURE_AUTH_KEY',  '=y.WYJ=c~-}X2(vHJ9G]|#%X+UL<0c>[dl[[44+5&3+m4ssxd/i @=-HdTb8!q2t');
define('LOGGED_IN_KEY',    'nt6BDP|<$r9AEG0|-lOpy!.kK)#6X}H?nR,oA,=3%Nskca{:.R%Jc4 DnZ ;*/ 8');
define('NONCE_KEY',        '>qWNd-!SNNLWQl4lzQVF7{!X3y#Lr2,lq-X%KJH`^JAxgBS6]%lf#692uULe.bOK');
define('AUTH_SALT',        '|TO AXk]l`/O%^<5%{L)M]etN#.4+T +|gzdM.04wj-y]3mF+B]!pW)X>c0RdOjx');
define('SECURE_AUTH_SALT', 'NFG?+<H2I+|PWDPunY?R:,1*Uu69<fhbtq.X+zgip;Dl@[-+uI5/YLp?gdNhl9/r');
define('LOGGED_IN_SALT',   '>O2lhv+tDq^ ]HLDjS@V-rm|fDl&+?}66~D&W6(T]oR+$+(i4^p&e5Q?G6FI59Vs');
define('NONCE_SALT',       'Fmw}es;n7U;R=sGq{MD=t DjR,v*ajlHq;[?j`Wz*+4d.fkF%~-~:bEXnG{( :GZ');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wpb_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 * Tale valore è già impostato per la lingua italiana
 */
define('WPLANG', 'it_IT');

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);
/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
