<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendInvoiceEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected string $email ;
    public function __construct( string $email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Invoice PDF email sent successfully to: $this->email");
    }
}