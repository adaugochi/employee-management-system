<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ModelNotUpdatedException;
use App\Exceptions\TokenExpiredException;
use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest as ResetPasswordRequest;
use App\Http\Services\AuthService;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * @param Request $request
     * @param $token
     * @return Application|Factory|RedirectResponse|View|void
     */
    public function showResetForm(Request $request, $token = null)
    {
        try {
            $title = 'Reset Password';
            $formActionURL = route('password.update');
            $email = $this->authService->validateToken($token);
            return view('auth.passwords.reset', compact('token',  'email', 'title', 'formActionURL'));
        } catch (TokenExpiredException $e) {
            return redirect()->route('password.request')->with(['error' => $e->getMessage()]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function reset(ResetPasswordRequest $request): RedirectResponse
    {
        try {
            $this->authService->resetPassword($request->all());
            return redirect()->route('login')->with(['success' => Messages::PWD_RESET_MSG]);
        } catch (ModelNotUpdatedException $e) {
            return redirect()->route('password.request')->with(['error' => $e->getMessage()]);
        }
    }
}
