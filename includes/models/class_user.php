<?php
use MyCLabs\Enum\Enum;

abstract class OnlineUser
{
  /**
	 * WebUser ID.
	 *
	 * @var int
	 */
  protected $_id;

  /**
	 * user's first name.
	 *
	 * @var string
	 */
  protected $_firstName;

  /**
	 * user's last name.
	 *
	 * @var string
	 */
  protected $_lastName;

  /**
	 * user's email address.
	 *
	 * @var string
	 */
  protected $_emailAddress;

  /**
	 * user's phone number.
	 *
	 * @var string
	 */
  protected $_phoneNumber;

  /**
	 * user's password.
   * not stored in plain text
   * uses encryption class to ecrypt/decrypt 
	 *
	 * @var string
	 */
  protected $_password;

  /**
	 * user's account_state_id.
	 *
	 * @var int
	 */
  protected $_accountStatus;

  /**
	 * user's date of registration.
	 *
	 * @var string
	 */
  protected $_registeredTimestamp;

  /**
	 * user's activation key for pwd resetting and account verification.
	 *
	 * @var string
	 */
  protected $_activationKey;

  /**
	 * user's role.
   * the type of user the account if for
	 *
	 * @var int
	 */
  protected $_user_role;

  /**
	 * user's role id.
   * the type of user the account if for
	 *
	 * @var int
	 */
  public function getUserRole()
  {
    return $this->_user_role;
  }
  public function setUserRole($id)
  {
    $this->_user_role = $id;
  }

  public function getActivationKey()
  {
    return $this->_activationKey;
  }
  public function setActivationKey($key)
  {
    $this->_activationKey = $key;
  }

  public function getAccountStatus()
  {
    return $this->_accountStatus;
  }
  public function setAccountStatus($id)
  {
    $this->_accountStatus = $id;
  }

  public function getRegisteredTimestamp()
  {
    return $this->_registeredTimestamp;
  }
  public function setRegisteredTimestamp($timestamp)
  {
    $this->_registeredTimestamp = $timestamp;
  }

  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($pwd)
  {
    $this->_password = $pwd;
  }

  public function getPhoneNumber()
  {
    return $this->_phoneNumber;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->_phoneNumber = $phoneNumber;
  }

  public function getEmailAddress()
  {
    return $this->_emailAddress;
  }
  public function setEmailAddress($emailAdd)
  {
    $this->_emailAddress = $emailAdd;
  }

  public function getLastName()
  {
    return $this->_lastName;
  }
  public function setLastname($lName)
  {
    $this->_lastName = $lName;
  }

  public function getFirstName()
  {
    return $this->_firstName;
  }
  public function setFirstname($fName)
  {
    $this->_firstName = $fName;
  }

  public function getId()
  {
    return $this->_id;
  }
  public function setId($id)
  {
    if (is_integer($id)) {
      $this->_id = $id;
    } else {
      throw Error("invalid ID passed");
    }
  }

  public function __construct()
  {
    $this->_accountStatus       = '';
    $this->_activationKey       = '';
    $this->_emailAddress        = '';
    $this->_firstName           = '';
    $this->_id                  = 0;
    $this->_lastName            = '';
    $this->_password            = '';
    $this->_phoneNumber         = 0;
    $this->_registeredTimestamp = '';
    $this->_user_role           = UserRole::GUEST();
  }
}

class OnlineBuyer extends OnlineUser
{
  protected $_country;
  protected $_state;
  protected $_city;
  protected $_street;

  public function __construct()
  {
    parent::__construct();

    $this->_country = '';
    $this->_state   = '';
    $this->_city    = '';
    $this->_street  = '';
    $this->_user_role = UserRole::CUSTOMER();
  }

  public function getCountry()
  {
    return $this->_country;
  }
  public function setCountry($country)
  {
    $this->_country = $country;
  }

  public function getState()
  {
    return $this->_state;
  }
  public function setState($state)
  {
    $this->_state = $state;
  }

  public function getCity()
  {
    return $this->_city;
  }
  public function setCity($city)
  {
    $this->_city = $city;
  }

  public function getStreet()
  {
    return $this->_street;
  }
  public function setStreet($street)
  {
    $this->_street = $street;
  }
}

interface IUserDao
{
  public function get($id);
  public function getAll();
  public function save($user);
  public function update($user, $params);
  public function delete($user);
}
class OnlineBuyerDAO implements IUserDao
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
  public function get($id)
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

class AccountStatus extends Enum
{
  const __default = self::PREACTIVE;

  const PREACTIVE = 'NEW';
  const ACTIVE = 'ACTIVE';
  const INACTIVE = 'INACTIVE';
}

class UserRole extends Enum
{
  const __default = self::GUEST;

  const GUEST = 0;
  const CUSTOMER = 1;
  const BUYER = 2;
  const ADMIN = 3;
}

final class OnlineSeller extends OnlineBuyer
{
  public function __construct($onlineSeller)
  {
    parent::__construct($onlineSeller);
  }
}



echo 'Current PHP version: ' . phpversion();

$userDao = new OnlineBuyerDAO($db);

//get a customer (Buyer) by id
$customer = $userDao->get(8);

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
