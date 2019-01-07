<?php

namespace fitluismacedo\basher\Facades;

use Illuminate\Support\Facades\Facade;

class basher extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'basher';
    }
}
