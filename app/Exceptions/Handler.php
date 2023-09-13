<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ExceptionMail;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception) {
            if (!$exception instanceof AuthenticationException) {

                $emailAddress = [
                    "chintan@logisticinfotech.com",
                    "sureshsavaliya@logisticinfotech.co.in",
                    "vaibhav@logisticinfotech.co.in",
                ];
                
                $ajax = 'NO';
                if (request()->ajax()) {
                    $ajax = 'YES';
                }

                $fullUrl = request()->fullUrl();
                $ip = request()->ip();
                $userAgent = request()->userAgent();
                
                $exceptionAsString = $exception->getTraceAsString();
                $exceptionArray = explode("\n", $exceptionAsString);
                $exceptionArrayNew = array();
                for ($i = 0; $i < count($exceptionArray); $i++) {
                    $exLine = $exceptionArray[$i];
                    if (!strpos($exLine, "vendor")) {
                        $exceptionArrayNew[] = $exLine;
                    }
                }                
                $mailData = [
                    'mail_title' => "MazException: " . $exception->getMessage(),
                    'exception' => $exception,
                    'user' => request()->user(),
                    'fullUrl' => $fullUrl,
                    'isAjax' => $ajax,
                    'ip' => $ip,
                    'userAgent' => $userAgent,
                    'method' => request()->method(),
                    'params' => json_encode(request()->all()),
                    'headers' => json_encode(request()->headers->all()),
                    'stackTrace' => implode("<br>", $exceptionArrayNew)
                ];                
                try {
                    Mail::to($emailAddress)->send(new ExceptionMail($mailData));

                } catch(\Exception $e) {                    
                    Log::critical($e->getMessage());
                }
            }
        });
    }
}
