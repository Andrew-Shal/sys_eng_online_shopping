<?php

namespace AccountStatus;

use MyCLabs\Enum\Enum;

class AccountStatus extends Enum
{
  const __default = self::PREACTIVE;

  const PREACTIVE = 'NEW';
  const ACTIVE = 'ACTIVE';
  const INACTIVE = 'INACTIVE';
}
