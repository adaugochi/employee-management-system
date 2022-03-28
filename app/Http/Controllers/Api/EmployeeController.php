<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    public function __construct()
    {
        $this->employeeRepository= new EmployeeRepository();
    }

    public function show(Request $request)
    {
        $employee = $this->employeeRepository->findById($request->get('id'));
        return response()->json(['data' => $employee]);
    }
}
