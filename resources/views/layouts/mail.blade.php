<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Nunito', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #000000 !important;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0 !important;
            mso-table-rspace: 0 !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        .email-social li a {
            display: inline-block;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background: #ffffff;
        }

        .email-social li a img { width: 30px; }

        .email-wraper a { color: #000000; word-break: break-all; }

        .email-wraper .link-block { display: block; }

        .email-ul li { list-style: disc; list-style-position: inside; }

        .email-ul-col2 li { width: 50%; padding-right: 10px; }

        .email-social li { display: inline-block; padding: 4px; }

        @media (max-width: 480px) { .email-preview-page .card { border-radius: 0; margin-left: -20px; margin-right: -20px; }
            .email-ul-col2 li { width: 100%; } }
    </style>
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
<center style="width: 100%; background-color: #f5f6fa;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
        <tr>
            <td style="padding: 40px 0;">
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding-bottom:25px">
                            <a href="{{ route('index') }}">
                                <h2>{{ config('app.name') }}</h2>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                @yield('content')

                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; padding:25px 20px 0;">
                                <p style="font-size: 13px;">Copyright © {{ date('Y') }} {{ config('app.name') }}. All rights reserved. .</p>
                                <p style="font-size: 12px;">
                                    This email was sent to you as a registered user of
                                    <a style="color: #000000; text-decoration:none;" href="{{ route('index') }}">
                                        {{ config('app.url') }}
                                    </a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</center>

</body>
</html>

