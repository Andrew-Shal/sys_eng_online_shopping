<?php
namespace UserRole;

use MyCLabs\Enum\Enum;

class UserRole extends Enum
{
  const __default = self::GUEST;

  const GUEST = 0;
  const CUSTOMER = 1;
  const BUYER = 2;
  const ADMIN = 3;
}
