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

    public function getPaidAtAttribute(): string
    {
        return $this->formatDate('paid_at');
    }

    public function getCreatedAtAttribute(): string
    {
        return $this->formatDate('created_at');
    }

    public function getUpdatedAtAttribute(): string
    {
        return $this->formatDate('updated_at');
    }

    public function formatDate($attribute): string
    {
        $date = Carbon::parse($this->attributes[$attribute]);
        return $date->format('M d, Y');
    }
}
