<?php

namespace App\Models;

use App\Helpers\MigrationConstants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payroll extends Model
{
    protected $table = MigrationConstants::TABLE_PAYROLL;

    protected $fillable = [
        'amount_paid',
        'paid_by',
        'updated_by',
        'employee_id'
    ];

    public function admin(): HasOne
    {
        return $this->hasOne(User::class, 'paid_by', 'id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'employee_id', 'id');
    }
}
