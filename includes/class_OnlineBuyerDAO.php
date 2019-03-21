<?php

namespace OnlineBuyerDAO;

use IDao;
use PDO;
use AccountStatus\AccountStatus;
use OnlineBuyer\OnlineBuyer;

class OnlineBuyerDAO implements IDao
{
  protected $_db;

  /**
 * @arg $db - dependency injection, database access object
 * 
 */
  public function __construct($db)
  {
    $this->_db = $db;
  }

  /**
 * @Overrides
 */
  public function getById($id)
  {
    $customer = new OnlineBuyer();
    $customer->setId((int)$id);
    $statement = $this->_db->prepare("SELECT * FROM tbl_user WHERE id=?");
    $statement->execute(array($customer->getId()));
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result && sizeof($result) > 0) {
      $customer->setFirstname($result['first_name']);
      $customer->setLastname($result['last_name']);
      $customer->setEmailAddress($result['email_address']);
      $customer->setCountry($result['cust_country']);
      $customer->setState($result['cust_state']);
      $customer->setCity($result['cust_city']);
      $customer->setStreet($result['cust_street']);
      $customer->setPhoneNumber($result['phone_number']);
      $customer->setPassword($result['first_name']);
      $customer->setAccountStatus($result['account_status']);
      $customer->setRegisteredTimestamp($result['registered_timestamp']);
      $customer->setActivationKey($result['activation_key']);
      $customer->setUserRole($result['user_role']);
    } else {
      $customer->setId(0);
    }

    return $customer;
  }

  /**
 * @Overrides
 */
  final public function getAll()
  {
    $customers = array();
    $statement = $this->_db->prepare("SELECT * FROM tbl_user");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($result && sizeof($result) > 0) {
      foreach ($result as $customer => $value) {
        array_push($customers, $value);
      }
    } else {
      unset($customers);
      $customers = array();
    }

    return $customers;
  }

  /**
 * @Overrides
 */
  final public function save($user)
  { }

  /**
 * @Overrides
 */
  final public function update($user, $params = array())
  { }

  /**
 * 
 * @param OnlineBuyer
 * 
 * @Overrides
 * 
 * @return bool
 */
  final public function delete($user)
  {
    $u_id = $user->getId();
    $acc_stat = AccountStatus::INACTIVE();

    if (!$u_id) {
      return false;
    } else {
      $statement = $this->_db->prepare("UPDATE tbl_user SET account_status = ? WHERE id = ?");
      $statement->execute(array($acc_stat, $u_id));
      return true;
    }
  }
}
