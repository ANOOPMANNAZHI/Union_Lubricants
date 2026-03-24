<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    protected $signature = 'mail:test';
    protected $description = 'Send a test email';

    public function handle()
    {
        try {
            Mail::raw('Test email from Laravel', function ($message) {
                $message->to('info@ulg.ae')
                    ->subject('Test Email from Union Lubricants');
            });
            $this->info('✓ Test email sent successfully!');
        } catch (\Exception $e) {
            $this->error('✗ Error: ' . $e->getMessage());
        }
    }
}
