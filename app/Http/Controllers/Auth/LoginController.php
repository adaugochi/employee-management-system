<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Messages;
use App\Http\Repositories\UserRepository;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends BaseAuthController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = new UserRepository();
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        $user = $this->guard()->user();

        if ($response = $this->authenticated($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended(sprintf("/%s/dashboard", $user->user_type));
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        $user = $this->userRepository->findFirst(['email' => $request->email]);
        if (!$user) {
            return redirect(route('login'))->with(['error' => Messages::ACCT_NOT_EXIST]);
        }

        try {

            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        } catch (ValidationException $ex) {
            return redirect(route('login'))->with(['error' => $ex->getMessage()]);
        }
    }
}
