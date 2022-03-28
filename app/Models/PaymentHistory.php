<?php

namespace App\Models;

use App\Helpers\MigrationConstants;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentHistory extends BaseModel
{
    protected $table = MigrationConstants::TABLE_PAYMENT_HISTORY;

    protected $fillable = [
        'amount_paid',
        'paid_by',
        'updated_by',
        'employee_id',
        'month',
        'transaction_reference'
    ];

    public $timestamps = false;

    const MONTHS_OF_YEAR = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'paid_by', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
