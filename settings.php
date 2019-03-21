<?php

use OnlineBuyer\OnlineBuyer;
use OnlineBuyerDAO\OnlineBuyerDAO;

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

define('INC_DIR', 'includes');

// Include files required for initialization.
require(INC_DIR . '/load.php');

$global_title = 'BZ Online Shopping';
define('TO_INC', 'includes/');
define('TO_ASSET', TO_INC . 'assets/');
define('TO_META', TO_ASSET . 'meta/');
define('TO_HEADER', TO_ASSET . 'header/');
define('TO_DEP', TO_INC . 'dep/');

//favicon
define('SITE_LOGO_FAVICON', TO_META . 'favicon.ico');


// Include the db class.
global $db;
require_pdo();


require('includes/dep/Enum.php');
require(INC_DIR . '/class_SysError.php');
require(INC_DIR . '/class_OnlineUser.php');
require(INC_DIR . '/interface_dao.php');
require(INC_DIR . '/class_OnlineBuyer.php');
require(INC_DIR . '/class_OnlineBuyerDAO.php');
require(INC_DIR . '/class_OnlineSeller.php');
require(INC_DIR . '/enum_AccountStatus.php');
require(INC_DIR . '/enum_UserRole.php');
require(INC_DIR . '/recommendation.php');


echo 'Current PHP version: ' . phpversion();

$userDao = new OnlineBuyerDAO($db);

//get a customer (Buyer) by id
$customer = $userDao->getById(8);

//get all customers
$customers = $userDao->getAll();

echo "<pre>";
print_r($customer);
echo "</pre>";

echo "<pre>";
print_r($customers);
echo "</pre>";

//remove a customer
$result = $userDao->delete($customer);

if ($result) {
  echo ("User Succesfully removed!");
  echo "<pre>";
  print_r($customers);
  echo "</pre>";
} else {
  echo ("there was a problem removing the user");
}
