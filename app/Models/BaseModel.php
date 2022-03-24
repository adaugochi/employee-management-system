<?php

namespace App\Models;

use App\Helpers\Utils;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class BaseModel extends Model
{
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Utils::getCurrentDatetime();
    }

    public function getCreatedAtAttribute(): string
    {
        $createdAt = Carbon::parse($this->attributes['created_at']);
        return $createdAt->format('M d, Y');
    }

    public function getUpdatedAtAttribute(): string
    {
        $createdAt = Carbon::parse($this->attributes['updated_at']);
        return $createdAt->format('M d, Y');
    }
}
