<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body style="color: #000000; font-family: 'Open Sans', sans-serif;">

    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailContainer">
                    <tr>
                        <td align="center" valign="top">
                            <h3 style="height: 40px; line-height: 40px; background-color: #f56857; color: #ffffff;">
                                There has been an exception thrown on {{ config('app.name', 'unknown') }}</h3>
                            <table class="emailExceptionTable" style="text-align: left;" border="0" cellspacing="0"
                                cellpadding="3">
                                <tr>
                                    <td>
                                        <strong>Environment:</strong>
                                    </td>
                                    <td>
                                        {{ config('app.env', 'unknown') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Exception Url:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['fullUrl'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Is ajax call:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['isAjax'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ip Address:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['ip'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>User agent:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['userAgent'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Exception Class:</strong>
                                    </td>
                                    <td>
                                        {{ get_class($mailData['exception']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Exception Message:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['exception']->getMessage() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Exception Code:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['exception']->getCode() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Request Method:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['method'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Request Params:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['params'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Request Headers:</strong>
                                    </td>
                                    <td>
                                        {{ $mailData['headers'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>StackTrace:</strong>
                                    </td>
                                    <td>
                                        {!! $mailData['stackTrace'] !!}
                                    </td>
                                </tr>
                            </table>
                            {{-- <hr style="color: #f6f6f6;">
                        <table align="center" style="text-align: center;" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    In {{ $mailData['exception']->getFile() }} on line {{  $mailData['exception']->getLine() }}
                                </td>
                            </tr>
                        </table>
                        <hr style="color: #f6f6f6;">
                        <table align="center" style="text-align: center;" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <strong>Stack Trace:</strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="text-align: left;">
                                    {!! nl2br($mailData['exception']->getTraceAsString()) !!}
                                </td>
                            </tr>
                        </table> --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
