<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Utils
{
    public static function generateToken(): string
    {
        return Str::random(100); //md5(rand(1, 10) . microtime()); //OR str_random(32);
    }

    public static function formatDate($timestamp)
    {
        return date("F jS, Y", strtotime($timestamp));
    }

    public static function formatTime($timestamp)
    {
        return date("h:iA", strtotime($timestamp));
    }

    public static function getCurrentDatetime(): string
    {
        $now = Carbon::now('Africa/Lagos');
        return $now->toDateTimeString();
    }
}
