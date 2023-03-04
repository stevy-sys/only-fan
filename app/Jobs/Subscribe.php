<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Subscribe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user ;
    /**
     * Create a new job instance.
     */
    public function __construct($user_id)
    {
        $this->user = User::find($user_id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->update([
            'premium' => false,
            'premium_type' => null
        ]);
    }
}
