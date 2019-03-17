<?php
/**
 * Used to set up and fix common variables and include
 *
 * Allows for some configuration in wp-config.php (see default-constants.php)
 *
 */

/**
 * Stores the location of the directory of functions, classes, and core content.
 *
 */

  define( 'INC_DIR', '/includes' );

  // Include files required for initialization.
  require( INC_DIR . '/load.php' );
  require( INC_DIR . '/default-constants.php' );


  $global_title = 'BZ Online Shopping';
  define('TO_INC', 'includes/');
  define('TO_ASSET', TO_INC . 'assets/');
  define('TO_META', TO_ASSET . 'meta/');
  define('TO_HEADER', TO_ASSET . 'header/');

  //favicon
  define('SITE_LOGO_FAVICON', TO_META . 'favicon.ico');


  // Include the db class.
  global $db;
  require_db();

