<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\ModelNotCreatedException;
use App\Helpers\Messages;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

    public function addEmployee()
    {
        $user = [];
        return view('admin.employees.employee', compact('user'));
    }

    public function saveEmployee(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $userId = $this->userService->saveUser($request->all());
            $this->userService->saveEmployee($request->all(), $userId);

            DB::commit();
            return redirect(route(self::EMP_REDIRECT_URI))->with([
                'success' => Messages::getSuccessMessage('Employee')
            ]);
        } catch (ModelNotCreatedException $ex) {
            DB::rollBack();
            return redirect(route(self::EMP_REDIRECT_URI))->with(['error' => $ex->getMessage()]);
        }
    }
}
