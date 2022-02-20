<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService){
        $this->notificationService = $notificationService;
    }

    public function sendNotification($id){
        $message = Str::random(30);
        $user = User::getById($id);
        $notified = $this->notificationService->notify($user, $message);

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'message' => $message,
            'result' => $notified,
        ]);
    }
}
