<?php

namespace App\Services;



use App\Models\User;
use App\Providers\SesProvider;

class NotificationService
{
    protected $sestProvider;

    public function __construct(SesProvider $sestProvider)
    {
        $this->sestProvider = $sestProvider;
    }

    public function notify(User $user, string $message){
        return $this->sestProvider->send($user->email, $message);
    }
}
