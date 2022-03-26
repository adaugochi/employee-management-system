<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\Exceptions\ModelNotUpdatedException;
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
     * @throws ModelNotUpdatedException
     */
    public function saveUser($request): int
    {
        if ($request['id']) {
            $user = $this->userRepository->update($request, $request['id']);
            if (!$user) {
                throw new ModelNotUpdatedException(Messages::NOT_CREATED);
            }
        } else {
            $user = $this->userRepository->insert($request);
            if (!$user) {
                throw new ModelNotCreatedException(Messages::NOT_CREATED);
            }

        }
        return $user;
    }

    /**
     * @throws ModelNotCreatedException
     * @throws ModelNotUpdatedException
     */
    public function saveEmployee($request, $userId): bool
    {
        $employee = $this->employeeRepository->findFirst(['user_id' => $userId]);

        if ($employee) {
            if (!$this->employeeRepository->update($request, $employee->id)) {
                throw new ModelNotUpdatedException(Messages::NOT_CREATED);
            }
        } else {
            $request['user_id'] = $userId;
            $employee = $this->employeeRepository->insert($request);
            if (!$employee) {
                throw new ModelNotCreatedException(Messages::NOT_CREATED);
            }
        }

        return true;
    }
}
