<?php

namespace IbrahimBougaoua\LaravelVfdplus\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IbrahimBougaoua\LaravelVfdplus\LaravelVfdplus
 */
class LaravelVfdplus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IbrahimBougaoua\LaravelVfdplus\LaravelVfdplus::class;
    }
}
