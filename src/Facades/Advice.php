<?php
namespace Chenl\Advice\Facades;

use Illuminate\Support\Facades\Facade;

class Advice extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'advice';
    }
}
