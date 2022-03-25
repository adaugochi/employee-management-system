<?php

namespace App\Http\Services;

use App\Exceptions\ModelNotUpdatedException;
use App\Exceptions\TokenExpiredException;
use App\Helpers\Messages;
use App\Helpers\Statuses;
use App\Helpers\Utils;
use App\Http\Repositories\PasswordResetRepository;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{

    const EXPIRES = 960; // 15 minutes

    protected $userRepository;
    protected $pwdResetRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->pwdResetRepository = new PasswordResetRepository();
    }

    /**
     * @throws TokenExpiredException
     */
    public function validateToken($token)
    {
        $tokenExist = $this->pwdResetRepository->findFirst(['token' => $token]);

        if (!$tokenExist) {
            throw new ModelNotFoundException(Messages::INVALID_TOKEN);
        }

        if (time() > (strtotime($tokenExist->expires_at))) {
            throw new TokenExpiredException(Messages::TOKEN_EXPIRED);
        }

        $user = $this->userRepository->findFirst(['email' => $tokenExist->email]);
        return $user->email;
    }

    /**
     * @throws ModelNotUpdatedException
     */
    public function setPassword($request): bool
    {
        $user = $this->userRepository->findFirst(['email' => $request['email']])
            ->update(['password' => Hash::make($request['password']), 'is_active' => 1]);
        if (!$user) {
            throw new ModelNotUpdatedException(Messages::NOT_UPDATED);
        }
        return true;
    }

    public function sendResetLink($request): bool
    {
        $email = $request->email;

        $user = $this->userRepository->findFirst(['email' => $email]);
        if (!$user) {
            throw new ModelNotFoundException(Messages::USER_NOT_FOUND);
        }

        $token = Utils::generateToken();
        $this->sendPasswordToken($email, $token);

        $url =  config('app.url') . "password/reset/" . $token;

        return true;
    }
}
