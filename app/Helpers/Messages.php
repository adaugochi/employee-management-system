<?php

namespace App\Helpers;

class Messages
{
    const FORGET_PASSWORD_MSG = "A password reset link was sent successfully. You will receive an SMS in a minute time";
    const USER_NOT_FOUND = "Could not find this user";
    const ACCT_NOT_EXIST = 'This account does not exist';
    const INCORRECT_CREDENTIALS = 'Incorrect login credentials';
    const TOKEN_EXPIRED = "Your token has expired. kindly request for a new token";
    const INVALID_TOKEN = "Invalid token";
    const PWD_RESET_MSG = 'Your password reset was successful';
    const PWD_SET_MSG = 'Your password set was successful';
    const ACCT_DEACTIVATE = 'This account has been deactivated. You can no longer sign in';
    const ACCT_EXIST = 'This account is registered already, you can login';
    const INVALID_SIGNUP_TOKEN = "Invalid sign up token";
    const INVALID_VERIFICATION_CODE = "You entered an invalid verification code";
    const NOT_UPDATED = 'Entity failed to update';
    const NOT_CREATED = 'Entity not saved';


    public static function getSuccessMessage($entity, $task = 'created'): string
    {
        return sprintf('%s was %s successfully', $entity, $task);
    }
}
