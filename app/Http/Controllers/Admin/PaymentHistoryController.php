<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Messages;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\PaymentHistoryRepository;
use App\Http\Services\PaymentHistoryService;
use Illuminate\Http\Request;

class PaymentHistoryController extends BaseAdminController
{
    protected $paymentHistoryRepository;
    protected $employeeRepository;
    protected $payrollService;

    public function __construct()
    {
        $this->paymentHistoryRepository = new PaymentHistoryRepository();
        $this->employeeRepository = new EmployeeRepository();
        $this->payrollService = new PaymentHistoryService();
    }

    public function index()
    {
        $payments = $this->paymentHistoryRepository->findAll([], ['employee']);
        return view('admin.payment-history.index', compact('payments'));
    }

    public function makePayment()
    {
        $employees = $this->employeeRepository->findAll([], 'user');
        return view('admin.payment-history.new', compact('employees'));
    }

    public function createPayroll(Request $request)
    {
        if ($this->payrollService->createPayroll($request->all())) {
            return redirect(route('admin.payment-history'))->with([
                'success' => Messages::getSuccessMessage('Salary', 'paid')
            ]);
        }
        return redirect(route('admin.payment-history'))->with([
            'error' => Messages::getNotSuccessMessage('Salary', 'paid')
        ]);
    }
}
