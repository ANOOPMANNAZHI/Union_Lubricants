<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load email configuration from database
        try {
            // Only load if settings table exists (avoid errors during migration)
            if ($this->settingsTableExists()) {
                $this->loadMailConfigFromDatabase();
            }
        } catch (\Exception $e) {
            // If there's an error, continue with default config
        }
    }

    /**
     * Check if settings table exists
     */
    private function settingsTableExists(): bool
    {
        try {
            return \DB::connection()->getSchemaBuilder()->hasTable('settings');
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Load mail configuration from database
     */
    private function loadMailConfigFromDatabase(): void
    {
        // Get email settings from database
        $mailSettings = Setting::whereIn('key', [
            'mail_mailer',
            'mail_from_name',
            'mail_from_address',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_scheme',
        ])->pluck('value', 'key');

        // Apply configuration if we have settings
        if ($mailSettings->isNotEmpty()) {
            // Set default mailer
            if ($mailSettings->has('mail_mailer')) {
                Config::set('mail.default', $mailSettings->get('mail_mailer'));
            }

            // Set from address
            if ($mailSettings->has('mail_from_address')) {
                $fromName = $mailSettings->get('mail_from_name', 'Union Lubricants');
                Config::set('mail.from', [
                    'address' => $mailSettings->get('mail_from_address'),
                    'name' => $fromName,
                ]);
            }

            // Set SMTP configuration if mailer is SMTP
            if ($mailSettings->get('mail_mailer') === 'smtp') {
                $smtpConfig = [
                    'transport' => 'smtp',
                    'scheme' => $mailSettings->get('mail_scheme', 'ssl'),
                    'host' => $mailSettings->get('mail_host', 'smtp.mailtrap.io'),
                    'port' => (int) $mailSettings->get('mail_port', 465),
                    'username' => $mailSettings->get('mail_username'),
                    'password' => $mailSettings->get('mail_password'),
                ];

                Config::set('mail.mailers.smtp', $smtpConfig);
            }
        }
    }
}
