<?php

  namespace OnlineBuyer;

  use OnlineUser\OnlineUser;
  use UserRole\UserRole;

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
  