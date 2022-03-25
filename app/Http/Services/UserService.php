<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotCreatedException;
use App\Helpers\Messages;
use App\Helpers\MigrationConstants;
use App\Helpers\Utils;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function sendInviteToken($email, $token): bool
    {
        return DB::table(MigrationConstants::TABLE_PASSWORD_RESET)->insert([
            'email' => $email,
            'token' => $token,
            'expires_at' => Carbon::now()->addMinutes(config('mail.expiry_time')),
            'created_at' => Utils::getCurrentDatetime()
        ]);
    }
}
