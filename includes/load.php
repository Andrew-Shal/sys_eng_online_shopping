<?php

/**
 * Load the database class file and instantiate the `$db` global.
 *
 * @global db $db The database class.
 */

function require_db(){
  global $db;

  require_once('db.php');
  
  $dbUser     = defined( 'DB_USER' ) ? DB_USER : '';
  $dbPassword = defined('DB_PASSWORD') ? DB_PASSWORD : '';
  $dbName     = defined('DB_NAME') ? : '';
  $dbHost     = defined('DB_HOST') ? : '';
  
  $db = new DB($dbUser, $dbPassword, $dbName, $dbHost);
}