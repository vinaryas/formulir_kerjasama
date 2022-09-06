<?php

namespace App\Services\support;

use App\Services\FormService as SupportService;
use Illuminate\Support\Facades\Facade;

class FormService extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SupportService::class;
    }
}
