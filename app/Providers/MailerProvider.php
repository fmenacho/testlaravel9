<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

interface MailerProvider
{
    public function send(string $email, string $message);
}
