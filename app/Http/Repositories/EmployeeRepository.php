<?php

namespace App\Http\Repositories;

use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Employee();
        parent::__construct($this->model);
    }
}
