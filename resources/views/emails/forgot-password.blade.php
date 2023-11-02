<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="border-collapse: collapse;">
                    <!-- Header Section -->
                    <tr>
                        <td bgcolor="#1e6b6f" style="padding: 20px 0; text-align: center;">
                            <h1 style="color: #fff;">Forgot Password</h1>
                        </td>
                    </tr>
                    <!-- Email Content Section -->
                    <tr>
                        <td style="padding: 20px;">
                            <p>Hello,</p>
                            <p>You've requested to reset your password. Please click the button below to reset it:</p>
                            <p>
                                <a href="{!! route('password.reset',['token' => $data['token'] ,'email'=>$data['email']]) !!}" style="display: inline-block; background-color: #1e6b6f; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Reset Password</a>
                                Below link, clict to forgot your password : <br>
                                {!! route('password.reset',['token' => $data['token'] ,'email'=>$data['email']]) !!}
                            </p>
                            <p>If you didn't request this, you can safely ignore this email.</p>
                        </td>
                    </tr>
                    <!-- Footer Section -->
                    <tr>
                        <td bgcolor="#1e6b6f" style="padding: 20px 0; text-align: center; color: #fff;">
                            &copy; {{ date('Y') }} {{ env('APP_NAME') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
