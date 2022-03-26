<?php

namespace App\Http\Repositories;

use App\Models\Payroll;

class PayrollRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Payroll();
        parent::__construct($this->model);
    }
}
