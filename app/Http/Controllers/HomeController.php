<?php

namespace App\Http\Controllers;

use App\Helpers\Messages;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\PaymentHistoryRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    protected $employeeRepository;
    protected $userRepository;
    protected $paymentHistoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->userRepository = new UserRepository();
        $this->employeeRepository = new EmployeeRepository();
        $this->paymentHistoryRepository = new PaymentHistoryRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('employees.dashboard');
    }

    public function account()
    {
        return view('employees.change-password');
    }

    public function profile()
    {
        $user = auth()->user();
        $employee = $user->employee;
        return view('employees.profile', compact('user', 'employee'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $result = $this->userRepository->update(
            ['password' => Hash::make($request->get('password'))], auth()->user()->id
        );
        if ($result) {
            return redirect(route('employee.account'))->with([
                'success' => Messages::getSuccessMessage('Password', 'changed')
            ]);
        }
        return redirect(route('employee.account'))->with([
            'error' => Messages::getNotSuccessMessage('Password', 'changed')
        ]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $userId = auth()->user()->id;
        $postData = $request->all();
        $user = $this->userRepository->update($postData, $userId);
        $postData['is_profile_complete'] = 1;
        $employee = $this->employeeRepository->findFirst(['user_id' => $userId])->update($postData);

        if ($user && $employee) {
            return redirect(route('employee.profile'))->with([
                'success' => Messages::getSuccessMessage('profile', 'updated')
            ]);
        }
        return redirect(route('employee.profile'))->with([
            'error' => Messages::getNotSuccessMessage('profile', 'updated')
        ]);
    }

    public function walletHistory()
    {
        $employeeID = auth()->user()->employee->id;
        $payments = $this->paymentHistoryRepository->findAll(['employee_id' => $employeeID]);
        return view('employees.wallet', compact('payments'));
    }
}
