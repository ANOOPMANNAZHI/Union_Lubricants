<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{
    /**
     * Display a listing of settings.
     */
    public function index(): View
    {
        $settingsCollection = Setting::orderBy('key', 'asc')->get();

        // Convert collection to associative array for easier access in view
        $settings = [];
        foreach ($settingsCollection as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        // Group settings by category for better organization
        $groupedSettings = [
            'Company' => ['company_name', 'company_email', 'company_phone', 'company_address', 'company_description'],
            'Email' => ['mail_mailer', 'mail_from_name', 'mail_from_address', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_scheme'],
            'SEO' => ['meta_title', 'meta_description', 'meta_keywords'],
            'Social' => ['facebook_url', 'linkedin_url', 'twitter_url', 'instagram_url'],
        ];

        return view('admin.settings.index', [
            'settings' => $settings,
            'groupedSettings' => $groupedSettings,
        ]);
    }

    /**
     * Store/Create a new setting or update existing.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'company_name' => 'nullable|string',
            'company_email' => 'nullable|email',
            'company_phone' => 'nullable|string',
            'company_address' => 'nullable|string',
            'company_description' => 'nullable|string',
            'mail_mailer' => 'nullable|string|in:smtp,sendmail,log,array',
            'mail_from_name' => 'nullable|string',
            'mail_from_address' => 'nullable|email',
            'mail_host' => 'nullable|string',
            'mail_port' => 'nullable|integer|min:1|max:65535',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_scheme' => 'nullable|string|in:tls,ssl',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        try {
            // Update each setting
            foreach ($validated as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Settings saved successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while saving the settings.');
        }
    }

    /**
     * Update a specific setting.
     */
    public function update(Setting $setting): RedirectResponse
    {
        $validated = request()->validate([
            'value' => 'nullable|string',
        ]);

        try {
            $setting->update(['value' => $validated['value']]);

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Setting updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the setting.');
        }
    }

    /**
     * Test email configuration by sending a test email
     */
    public function testEmail(): RedirectResponse
    {
        try {
            $userEmail = Auth::user()->email;

            // Send a simple test email
            Mail::raw('This is a test email from Union Lubricants admin panel.', function ($message) use ($userEmail) {
                $message->to($userEmail)
                    ->subject('Test Email - Union Lubricants');
            });

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Test email sent successfully to ' . $userEmail);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.settings.index')
                ->with('error', 'Failed to send test email: ' . $e->getMessage());
        }
    }
}
