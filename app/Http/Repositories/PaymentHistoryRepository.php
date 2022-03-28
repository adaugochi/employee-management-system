<?php

namespace App\Http\Repositories;

use App\Models\PaymentHistory;

class PaymentHistoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new PaymentHistory();
        parent::__construct($this->model);
    }
}
