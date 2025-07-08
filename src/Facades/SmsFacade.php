<?php

namespace IslamAbdurahman\SmsService\Facades;

use Illuminate\Support\Facades\Facade;

class SmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IslamAbdurahman\SmsService\SmsService::class;
    }
}
