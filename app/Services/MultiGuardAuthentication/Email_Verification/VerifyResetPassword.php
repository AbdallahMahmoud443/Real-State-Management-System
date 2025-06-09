<?php

namespace App\Services\MultiGuardAuthentication\Email_Verification;

use App\Mail\VerificationMail;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordEmailVerificationContract;
use Illuminate\Support\Facades\Mail;

class VerifyResetPassword implements ResetPasswordEmailVerificationContract
{
    public function SendVerificationEmail(string $email, string $token, $name, string $userType): void
    {
        // todo: generate verification link (email & token)
        $verification_link = route($userType.'.reset-password.show', [$email, $token]);
        // todo: Email Configuration
        $email_subject = 'Email Verification for ' . $name;
        $body = [
            'message' => 'Click on the link to reset your password',
            'link' => $verification_link,
        ];
        // todo: send verification mail
        Mail::to($email)->send(new VerificationMail($email_subject, $body));
    }
}
