@extends('layouts.mail')
@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
            <tr>
                <td style="padding: 30px 30px 15px 30px;">
                    <h2 style="color: #000000; margin: 0; text-align: center;">
                        <img style="width:88px; margin-bottom:24px" src="{{ asset('images/kyc-success.png') }}" alt="Confirmed">
                    </h2>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 30px 20px">
                    <p style="margin-bottom: 10px; font-weight: bold">Hello {{ $firstName }}!</p>
                    <p style="margin-bottom: 10px;">
                        You are receiving this email because you have been invited by the admin of
                        <strong>{{ config('app.name') }}</strong>.
                    </p>
                    <p>
                        Being invited means you are now an employee of <strong>{{ config('app.name') }}</strong>.
                        To gain full access into our platform, you need to set your activate your account.
                        You will be redirected to a page to set your password.
                    </p>
                    <p style="margin-bottom: 25px;">
                        Click the link below to activate your account.
                    </p>
                    <p style="margin-bottom: 25px;">
                        This link will expire in <strong>{{ config('mail.expiry_time') }} minutes </strong> and can only be used once.
                    </p>
                    <div style="text-align: center;">
                        <a href="{{ $actionURL }}" style="background-color:#000000;border-radius:4px;color:#ffffff;display:inline-block;line-height:44px;text-transform:uppercase;padding: 0 30px">
                            Set Password
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 30px">
                    <p style="margin-bottom: 10px;">If the button above does not work, paste this link into your web browser:</p>
                    <a href="{{ $actionURL }}" style="color: #6576ff; text-decoration:none;word-break: break-all;">{{ $actionURL }} </a>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 30px 40px">
                    <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">
                        This is an automatically generated email please do not reply to this email.
                        If you face any issues, please contact us at
                        <a href="mailto:support@ems.com">support@ems.com</a>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
@endsection()
