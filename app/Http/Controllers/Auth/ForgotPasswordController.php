<?php

namespace App\Http\Controllers\Auth;

use App\helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Services\AuthService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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

    public function sendResetLink(ForgetPasswordRequest $request)
    {
        try {
            $this->authService->sendResetLink($request->all());
            return redirect(route('password.request'))->with(['success' => Messages::FORGET_PASSWORD_MSG]);
        } catch (ModelNotFoundException $e) {
            return redirect(route('password.request'))->with(['error' => $e->getMessage()]);
        }
    }
}
