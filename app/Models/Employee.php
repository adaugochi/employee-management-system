<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends BaseModel
{
    const MISS = 'miss';
    const MR = 'mr';
    const MRS = 'mrs';
    const DR = 'dr';
    const ENGR = 'engr';
    const PROF = 'prof';


    const TITLES = [
        self::MISS => 'Miss',
        self::MR => 'Mr',
        self::MRS => 'Mrs',
        self::DR => 'Dr.',
        self::ENGR => 'Engr.',
        self::PROF => 'Prof.'
    ];

    protected $fillable = [
        'job_title',
        'age',
        'salary',
        'level_of_qualification',
        'street_address',
        'city',
        'state',
        'country',
        'zip_code',
        'start_date',
        'end_date',
        'user_id',
        'is_profile_complete'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
