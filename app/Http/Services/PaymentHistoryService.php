<?php

namespace App\Http\Services;

use App\Helpers\Utils;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\PaymentHistoryRepository;
use App\Mail\PaymentMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentHistoryService extends BaseService
{
    protected $paymentHistoryRepository;
    protected $employeeRepository;

    public function __construct()
    {
        $this->paymentHistoryRepository = new PaymentHistoryRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function createPayroll($request): bool
    {
        DB::beginTransaction();
        try {
            $employeeIDs = $request['employee_id'];
            $amounts = $request['amount_paid'];
            $months = $request['month'];

            for ($i = 0; $i < count($employeeIDs); $i++) {
                $amount = $amounts[$i];
                $month = $months[$i];
                $arr = [
                    'employee_id' => $employeeIDs[$i],
                    'amount_paid' => $amount,
                    'month' => $month,
                    'transaction_reference' => 'txn_' . Utils::generateToken(15),
                    'paid_by' => auth()->user()->id,
                ];

                $this->paymentHistoryRepository->insert($arr);
                $employee = $this->employeeRepository->findById($employeeIDs[$i]);
                $user = $employee->user;
                $employee->wallet += (float)$amount;
                $employee->save();

                Mail::to($user->email)->send(new PaymentMail($user->name, $amount, $month));
            }

            DB::commit();
            return true;
        } catch (\Exception $ex) {
            DB::rollBack();
            return false;
        }
    }
}
