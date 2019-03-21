<?php

namespace OnlineUser;

use UserRole\UserRole;

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
