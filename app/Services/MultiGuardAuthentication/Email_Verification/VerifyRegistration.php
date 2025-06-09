<?php

namespace App\Services\MultiGuardAuthentication\Email_Verification;


use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use App\Services\MultiGuardAuthentication\Contracts\RegisterEmailVerificationContract;

class VerifyRegistration implements RegisterEmailVerificationContract
{
    public function SendVerificationEmail(string $email, string $token): void
    {
        // hint: link send with verification email
        $link = route('user.register-verify.handle', $token);
        $email_subject = 'Register Email Verification';
        $body = [
            'link' => $link,
            'message' => 'Pleaser Verify your Email,to complete Registration Process'
        ];
        Mail::to($email)->send(new VerificationMail($email_subject, $body));
    }
}
