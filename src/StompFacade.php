<?php

namespace Wuwx\LaravelStomp;

use Illuminate\Support\Facades\Facade;

class StompFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stomp';
    }
}
