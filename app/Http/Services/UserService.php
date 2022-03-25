<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\Helpers\Messages;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $userRepository;
    protected $employeeRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    /**
     * @throws ModelNotCreatedException
     */
    public function saveUser($request): int
    {
        $user = $this->userRepository->insert($request);
        if (!$user) {
            throw new ModelNotCreatedException(Messages::NOT_CREATED);
        }

        return $user->id;
    }

    /**
     * @throws ModelNotCreatedException
     */
    public function saveEmployee($request, $userId): bool
    {
        $request['user_id'] = $userId;
        $employee = $this->employeeRepository->insert($request);
        if (!$employee) {
            throw new ModelNotCreatedException(Messages::NOT_CREATED);
        }

        return true;
    }
}
