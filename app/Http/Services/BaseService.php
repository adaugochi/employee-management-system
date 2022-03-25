<?php

namespace App\Http\Services;

use App\Helpers\MigrationConstants;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BaseService
{
    public function sendPasswordToken($email, $token): bool
    {
        return DB::table(MigrationConstants::TABLE_PASSWORD_RESET)->insert([
            'email' => $email,
            'token' => $token,
            'expires_at' => Carbon::now()->addMinutes(config('mail.expiry_time')),
            'created_at' => Carbon::now()
        ]);
    }
}
