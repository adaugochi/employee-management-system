<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ModelNotUpdatedException;
use App\Exceptions\TokenExpiredException;
use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest as SetPasswordRequest;
use App\Http\Services\AuthService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class SetPasswordController extends Controller
{
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

    public function showSetPasswordForm($token = null)
    {
        try {
            $email = $this->authService->validateToken($token);
            $title = 'Set Password';
            $formActionURL = route('password.create');
            return view(
                'auth.passwords.reset',
                compact('token',  'email', 'title', 'formActionURL')
            );
        } catch (ModelNotFoundException $e) {
             abort(404);
        } catch (TokenExpiredException $e) {
            return redirect()->route('login')->with(['error' => $e->getMessage()]);
        }
    }

    public function setPassword(SetPasswordRequest $request): RedirectResponse
    {
        try {
            $this->authService->validateToken($request->get('token'));
            $this->authService->setPassword($request->all());
            return redirect()->route('login')->with(['success' => Messages::PWD_SET_MSG]);
        } catch (ModelNotUpdatedException $e) {
            abort(404);
        } catch (TokenExpiredException $e) {
            return redirect()->route('password.set')->with(['error' => $e->getMessage()]);
        }
    }
}
