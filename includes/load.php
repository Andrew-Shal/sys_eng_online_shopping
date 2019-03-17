<?php

/**
 * Load the PDO and instantiate the `$db` global.
 *
 * @global PDO $db The database class.
 */

function require_pdo(){
  global $db;

  $dbUser     = defined( 'DB_USER' ) ? DB_USER : '';
  $dbPassword = defined('DB_PASSWORD') ? DB_PASSWORD : '';
  $dbName     = defined('DB_NAME') ? DB_NAME : '';
  $dbHost     = defined('DB_HOST') ? DB_HOST : '';
  
  if (isset($db)){
    return;
  }

  try{

    $db = new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUser,$dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch(PDOException $exception){
    echo "Connection error:" . $exception->getMessage();
  }

}