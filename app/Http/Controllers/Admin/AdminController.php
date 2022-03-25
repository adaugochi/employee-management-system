<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends BaseAdminController
{
    protected $userRepository;
    protected $employeeRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function index()
    {
        $countEmployees = count($this->employeeRepository->findAll());
        $countActiveEmployees = count($this->userRepository->findAll(['is_active' => 1, 'is_admin' => 0]));
        $countInactiveEmployees = count($this->userRepository->findAll(['is_active' => 0, 'is_admin' => 0]));

        return view(
            'admin.dashboard',
            compact('countActiveEmployees', 'countEmployees', 'countInactiveEmployees')
        );
    }

}
