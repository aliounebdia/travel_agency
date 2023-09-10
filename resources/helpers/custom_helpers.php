<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

if (!function_exists("hasPermission")) {
    function hasPermission($permission)
    {
        if (Auth::user()->hasPermissionTo($permission) || Auth::user()->hasRole('Super Admin')) {
            return true;
        }
        return false;
    }
}

if (!function_exists("str_slug")) {
    function str_slug($string)
    {
        return Str::of($string)->slug('_');
    }
}
