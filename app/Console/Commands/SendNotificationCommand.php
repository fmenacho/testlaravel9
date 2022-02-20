<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to specified user';
    protected $notificationService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(NotificationService $notificationService)
    {
        parent::__construct();
        $this->notificationService = $notificationService;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::getById($this->argument('userId'));
        $message = Str::random(30);
        $notified = $this->notificationService->notify($user, $message);

        $this->table(
            ['Id', 'Email', 'Message', 'Result'],
            [
                [
                    'id' => $user->id,
                    'email' => $user->email,
                    'message' => $message,
                    'result' => $notified
                ]
            ]
        );
    }
}
