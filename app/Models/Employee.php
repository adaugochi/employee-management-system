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
        'profile_picture',
        'is_profile_complete'
    ];

    public function setProfilePictureAttribute($value)
    {
        if ($value) {
            if (!is_string($value)) {
                if(file_exists(public_path('/uploads/profile/' . $value))) {
                    unlink(public_path('uploads/profile/' . $value));
                };
                $imageName = time() . $value->getClientOriginalName();
                $value->move('uploads/profile', $imageName);
                $this->attributes['profile_picture'] = $imageName;
            }
        }
    }

    public function uploadImage($request): string
    {
        $file = $request->file('image');
        $imageName = time() . $file->getClientOriginalName();
        $file->move('uploads/products', $imageName);
        return $imageName;
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
