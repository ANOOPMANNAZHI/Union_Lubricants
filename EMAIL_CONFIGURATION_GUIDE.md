# Email Configuration Setup - Admin Panel

## Overview

The Union Lubricants application now includes a comprehensive email configuration system in the admin panel. This allows administrators to configure email settings without directly editing the `.env` file.

## Features Implemented

### 1. **Email Configuration in Admin Settings**
   - Located in: **Admin Dashboard → Settings → Email Configuration**
   - Administrators can configure all email parameters through a user-friendly form

### 2. **Configurable Email Parameters**
   - **Mail Driver**: Choose between SMTP, Sendmail, Log (testing), or Array (testing)
   - **Encryption**: Select TLS or SSL encryption
   - **From Name**: Display name for emails sent from the application
   - **From Email Address**: Email address used as sender
   - **SMTP Host**: Mail server hostname (e.g., smtp.gmail.com, smtp.mailtrap.io)
   - **SMTP Port**: Port number for SMTP connection (1-65535)
   - **SMTP Username**: Authentication username for SMTP server
   - **SMTP Password**: Authentication password for SMTP server

### 3. **Test Email Feature**
   - "Send Test Email" button in the settings page
   - Sends a test email to the logged-in user's email address
   - Helps verify that email configuration is working correctly

### 4. **Dynamic Configuration Loading**
   - Email settings are stored in the database `settings` table
   - A service provider (`MailConfigServiceProvider`) automatically loads these settings at runtime
   - Changes are applied immediately without server restart

## Database Schema

Settings are stored in the existing `settings` table with the following email-related keys:

| Key | Value Type | Default |
|-----|-----------|---------|
| mail_mailer | string | smtp |
| mail_from_name | string | Union Lubricants |
| mail_from_address | string | noreply@unionlubricants.com |
| mail_host | string | smtp.mailtrap.io |
| mail_port | integer | 465 |
| mail_username | string | (empty) |
| mail_password | string | (empty) |
| mail_scheme | string | tls |

## Configuration Files Modified/Created

### 1. **app/Providers/MailConfigServiceProvider.php** (NEW)
   - Loads email settings from database at application boot
   - Updates Laravel's mail configuration dynamically
   - Handles SMTP, Sendmail, and other driver configurations

### 2. **app/Http/Controllers/Admin/SettingController.php** (MODIFIED)
   - Added email validation rules
   - Added `testEmail()` method to send test emails
   - Email settings are saved to database via existing `store()` method

### 3. **resources/views/admin/settings/index.blade.php** (MODIFIED)
   - Added "Email Configuration" section with all email fields
   - Added "Send Test Email" button for testing

### 4. **routes/web.php** (MODIFIED)
   - Added route: `POST /admin/settings/test-email` → `SettingController@testEmail`

### 5. **bootstrap/providers.php** (MODIFIED)
   - Registered `MailConfigServiceProvider` to load at bootstrap

### 6. **database/seeders/SettingSeeder.php** (CREATED)
   - Provides default settings for all configuration categories
   - Can be run with: `php artisan db:seed --class=SettingSeeder`

## How to Use

### Accessing Email Configuration

1. Log in to the admin panel
2. Navigate to **Settings** (from left sidebar menu)
3. Scroll to the **Email Configuration** section

### Configuring Email

#### For SMTP (Recommended)
1. Select **SMTP** from Mail Driver dropdown
2. Enter SMTP Host (e.g., `smtp.gmail.com` for Gmail)
3. Enter SMTP Port (typically 587 for TLS, 465 for SSL)
4. Select Encryption (TLS or SSL)
5. Enter SMTP Username and Password
6. Set "From Name" and "From Email Address"
7. Click **Save Settings**

#### For Testing
1. Select **Log** or **Array** from Mail Driver dropdown
2. Click **Save Settings**
3. Emails will be logged to `storage/logs/laravel.log` instead of being sent

### Testing Email Configuration

1. After configuring email settings, click **Send Test Email** button
2. A test email will be sent to your user account email address
3. Check your email inbox for the test message
4. If successful, your email configuration is working correctly

### Common SMTP Providers

#### Gmail
- **Host**: smtp.gmail.com
- **Port**: 587 (TLS) or 465 (SSL)
- **Username**: your-email@gmail.com
- **Password**: App-specific password (not your Gmail password)
- **Encryption**: TLS

#### Mailtrap (Development/Testing)
- **Host**: smtp.mailtrap.io
- **Port**: 465
- **Username**: Your Mailtrap username
- **Password**: Your Mailtrap password
- **Encryption**: TLS

#### SendGrid
- **Host**: smtp.sendgrid.net
- **Port**: 587 (TLS)
- **Username**: apikey
- **Password**: Your SendGrid API key
- **Encryption**: TLS

#### AWS SES
- **Host**: email-smtp.[region].amazonaws.com
- **Port**: 465 (TLS) or 587
- **Username**: Your SMTP username
- **Password**: Your SMTP password
- **Encryption**: TLS

## Validation Rules

Email configuration fields are validated as follows:

```php
'mail_mailer' => 'nullable|string|in:smtp,sendmail,log,array',
'mail_from_name' => 'nullable|string',
'mail_from_address' => 'nullable|email',
'mail_host' => 'nullable|string',
'mail_port' => 'nullable|integer|min:1|max:65535',
'mail_username' => 'nullable|string',
'mail_password' => 'nullable|string',
'mail_scheme' => 'nullable|string|in:tls,ssl',
```

## Troubleshooting

### Test Email Not Sending
1. Verify SMTP credentials are correct
2. Check that mail driver is set to a valid option (not 'log' or 'array')
3. Ensure SMTP host and port are reachable
4. Check server firewall rules for port access
5. Review application logs: `storage/logs/laravel.log`

### Email Not Showing from Expected Address
1. Verify "From Email Address" is correctly configured
2. Check SMTP provider allows sending from that address
3. Gmail/Office365 may require verification of sender address

### Configuration Not Being Applied
1. Clear application cache: `php artisan cache:clear`
2. Clear configuration cache: `php artisan config:clear`
3. Verify settings were saved to database: check `settings` table

### Password Storage Security
- SMTP passwords are stored in the database
- In production, consider additional encryption for sensitive data
- Access should be restricted to admin users only (already enforced by middleware)

## Technical Details

### Service Provider Boot Process
The `MailConfigServiceProvider` loads email settings at application boot:
1. Checks if `settings` table exists
2. Retrieves email-related keys from database
3. Updates Laravel's `config/mail.php` configuration
4. Applies settings to mail service

### Dynamic Configuration
- Settings are applied after database connection is available
- No need to restart server after configuration changes
- Each request loads the latest settings from database

## Future Enhancements

Possible improvements for future versions:
1. Email template management in admin panel
2. Email queue management UI
3. Email log viewing in admin panel
4. Webhook configuration for email delivery tracking
5. Encryption of stored SMTP passwords
6. Email sending history and statistics

## References

- Laravel Mail Documentation: https://laravel.com/docs/mail
- Config/mail.php configuration file
- App/Providers/MailConfigServiceProvider.php
- Admin/Settings controller and view
