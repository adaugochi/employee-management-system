<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Utils
{
    public static function slug($str)
    {
        return str_replace(' ', '-', strtolower($str));
    }

    public static function convertPhoneNumberToE164Format($phoneNumber)
    {
        return preg_replace('/^0/','+234', $phoneNumber);
    }

    public static function generateToken(): string
    {
        return Str::random(60); //md5(rand(1, 10) . microtime()); //OR str_random(32);
    }

    public static function formatDate($timestamp)
    {
        return date("F jS, Y", strtotime($timestamp));
    }

    public static function formatTime($timestamp)
    {
        return date("h:iA", strtotime($timestamp));
    }

    /**
     * @throws \Exception
     */
    public static function generateConfirmationCode(): int
    {
        return random_int(1000000, 9999999);
    }

    public static function getCurrentDatetime(): string
    {
        $now = Carbon::now('Africa/Lagos');
        return $now->toDateTimeString();
    }

    public static function maskPhoneNumber($number): string
    {
        return str_repeat("*", strlen($number) - 4) . substr($number, -4);
    }
}
