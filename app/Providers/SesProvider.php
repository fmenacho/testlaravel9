<?php

namespace App\Providers;

class SesProvider implements MailerProvider
{

    public function send(string $email, string $message){
        return true;
    }
}
