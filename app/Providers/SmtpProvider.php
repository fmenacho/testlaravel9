<?php

namespace App\Providers;

class SmtpProvider implements MailerProvider
{
    public function send(string $email, string $message){
        return true;
    }
}
