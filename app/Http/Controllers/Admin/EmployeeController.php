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
            $userId = $request->get('id');
            $token = Utils::generateToken();
            $actionURL = config('app.url') . "set-password/" . $token;

            $user = $this->userService->saveUser($request->all());
            $userId = $userId ?? $user->id;
            $this->userService->saveEmployee($request->all(), $userId);

            if (!$userId) {
                $this->userService->sendPasswordToken($email, $token);
                Mail::to($email)->send(new SetPasswordMail($request->get('first_name'), $actionURL));
            }

            $message = $userId ?
                Messages::getSuccessMessage('Employee', 'updated') :
                Messages::getSuccessMessage('Employee');

            DB::commit();
            return redirect(route(self::EMP_REDIRECT_URI))->with(['success' => $message]);
        } catch (ModelNotCreatedException | ModelNotUpdatedException $ex) {
            DB::rollBack();
            return redirect(route(self::EMP_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }
}
