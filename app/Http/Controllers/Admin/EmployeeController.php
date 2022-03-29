<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
use App\Helpers\Messages;
use App\Helpers\Utils;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Mail\SetPasswordMail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends BaseAdminController
{
    const EMP_REDIRECT_URI = 'admin.employees';

    protected $userRepository;
    protected $userService;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = Cache::rememberForever('users', function () {
            return $this->userRepository->findAll(['is_admin' => 0]);
        });
        return view('admin.employees.index', compact('users'));
    }

    public function addEmployee($id = null)
    {
        $user = [];
        if ($id) {
            $user = $this->userRepository->findById($id);
        }
        return view('admin.employees.employee', compact('user'));
    }

    public function saveEmployee(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $email = $request->get('email');
            $id = $request->get('id');
            $token = Utils::generateToken();
            $actionURL = config('app.url') . "set-password/" . $token;

            $user = $this->userService->saveUser($request->all());
            $userId = $id ?? $user->id;
            $this->userService->saveEmployee($request->all(), $userId);

            if (!$id) {
                $this->userService->sendPasswordToken($email, $token);
                Mail::to($email)->send(new SetPasswordMail($request->get('first_name'), $actionURL));
            }

            $message = $id ?
                Messages::getSuccessMessage('Employee', 'updated') :
                Messages::getSuccessMessage('Employee');

            DB::commit();
            return redirect(route(self::EMP_REDIRECT_URI))->with(['success' => $message]);
        } catch (ModelNotCreatedException | ModelNotUpdatedException $ex) {
            DB::rollBack();
            return redirect(route(self::EMP_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }

    public function resendToken($id = null)
    {
        $token = Utils::generateToken();
        $actionURL = config('app.url') . "set-password/" . $token;
        $user = $this->userRepository->findById($id);
        if ($user) {
            $email = $user->email;
            $this->userService->sendPasswordToken($email, $token);
            Mail::to($email)->send(new SetPasswordMail($user->first_name, $actionURL));
            return redirect(route(self::EMP_REDIRECT_URI))->with(['success' => 'Token sent']);
        } else {
            return redirect(route(self::EMP_REDIRECT_URI))->with(['error' => 'Token not sent']);
        }
    }
}
