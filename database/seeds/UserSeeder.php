<?php

use App\Helpers\MigrationConstants;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(MigrationConstants::TABLE_USERS)->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'EMS',
                'name' => 'Admin EMS',
                'email' => env('DEFAULT_ADMIN_EMAIL'),
                'phone_number' => env('DEFAULT_ADMIN_PHONE_NUMBER'),
                'international_number' => env('DEFAULT_ADMIN_INTL_NUMBER'),
                'is_admin' => User::IS_ADMIN,
                'is_active' => 1,
                'user_type' => User::ADMIN,
                'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD'))
            ]
        ]);
    }
}
