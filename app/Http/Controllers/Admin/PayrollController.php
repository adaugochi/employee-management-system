<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\PayrollRepository;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    protected $payrollRepository;
    protected $employeeRepository;

    public function __construct()
    {
        $this->payrollRepository = new PayrollRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function index()
    {
        $payments = $this->payrollRepository->findAll([], ['employee', 'user']);
        return view('admin.payroll.index', compact('payments'));
    }

    public function makePayment()
    {
        $employees = $this->employeeRepository->findAll([], 'user');
        return view('admin.payroll.new', compact('employees'));
    }
}
