# Union Lubricants - Production Deployment Guide

## 📦 Pre-Deployment Status

✅ **Completed:**
- Environment configuration (`.env`) - **Production ready**
- Database credentials configured
- PHP dependencies installed and optimized
- Frontend assets built (Vite)
- Configuration and route caching enabled
- APP_DEBUG disabled for security

⚠️ **Remaining (On Hosting Server):**
- Database migrations
- Storage symlink creation
- File permissions
- Email service configuration
- SSL certificate setup

---

## 🎯 Quick Start (Server-Side Steps)

Your project is now ready to upload. Here's what to do on your hosting server:

### Step 1: Upload Project to Server

Upload the entire `union_lubricants` folder to your hosting account's public_html or www directory.

**Critical:** Make sure `.env` file is uploaded as well.

### Step 2: SSH into Your Server

Connect via SSH/terminal using your hosting credentials.

### Step 3: Navigate to Project

```bash
cd /path/to/union_lubricants
```

### Step 4: Run Database Migrations

This creates all necessary database tables:

```bash
php artisan migrate --force
```

### Step 5: Create Storage Symlink

This allows public access to uploaded files:

```bash
php artisan storage:link
```

### Step 6: Set File Permissions

Give the web server write access to necessary folders:

```bash
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage bootstrap/cache  # If needed for group write
```

### Step 7: Verify Installation

Check the logs for any errors:

```bash
tail -f storage/logs/laravel.log
```

---

## 🌐 Domain Configuration

### Update APP_URL in .env

Once you have your domain configured, update this in `.env`:

```
APP_URL=https://yourdomain.com
```

Then re-cache:

```bash
php artisan config:cache
```

---

## 🔒 SSL & HTTPS Setup

### For cPanel Hosting (Most Common)

1. Go to cPanel → SSL/TLS Manager
2. Click "Auto-Fill by Domain" or install Let's Encrypt certificate
3. Once SSL is installed, edit `.env`:
   ```
   APP_URL=https://yourdomain.com
   ```
4. Update `MAIL_FROM_ADDRESS` to use your domain:
   ```
   MAIL_FROM_ADDRESS=noreply@yourdomain.com
   ```

### Force HTTPS Redirect

Add to `public/.htaccess` (after `<IfModule mod_rewrite.c>` line):

```apache
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

## 📧 Email Configuration (Important!)

**Current Setup:** Mailtrap (testing only)

### For Production Email Service

Choose one and update your `.env`:

#### Option 1: SendGrid (Recommended - Free Tier Available)

1. Sign up at https://sendgrid.com/
2. Create API key from Settings
3. Update `.env`:
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.sendgrid.net
   MAIL_PORT=587
   MAIL_USERNAME=apikey
   MAIL_PASSWORD=SG.xxxxxxxxxxxxx
   MAIL_FROM_ADDRESS=noreply@yourdomain.com
   MAIL_FROM_NAME="Union Lubricants"
   MAIL_ENCRYPTION=tls
   ```

#### Option 2: Gmail with App Password

1. Enable 2-factor authentication on Gmail
2. Create App Password from https://myaccount.google.com/apppasswords
3. Update `.env`:
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your-email@gmail.com
   MAIL_PASSWORD=xxxx xxxx xxxx xxxx
   MAIL_FROM_ADDRESS=your-email@gmail.com
   MAIL_FROM_NAME="Union Lubricants"
   MAIL_ENCRYPTION=tls
   ```

#### Option 3: Hosting Provider's Mail Server

Ask your hosting provider for SMTP details and configure in `.env`.

### After Updating Mail Config

Run caching command:

```bash
php artisan config:cache
```

---

## ✅ Post-Deployment Testing Checklist

Test these features to ensure everything works:

- [ ] Visit homepage: `https://yourdomain.com`
- [ ] Check if all images load correctly
- [ ] Visit about page: `https://yourdomain.com/about`
- [ ] Browse products: `https://yourdomain.com/products`
- [ ] Browse services: `https://yourdomain.com/services`
- [ ] Browse news/blog: `https://yourdomain.com/news`
- [ ] Test contact form: Fill and submit at `https://yourdomain.com/contact`
- [ ] Check email received (verify mail config works)
- [ ] Admin login: `https://yourdomain.com/login`
  - Email: admin@example.com (or your admin email)
  - Password: (your admin password)
- [ ] Access admin dashboard: `https://yourdomain.com/admin/`
- [ ] Test file upload: Try uploading image in Products section
- [ ] Verify uploaded files are accessible

---

## 📊 Database Backup

### Create Regular Backups

**Via SSH:**

```bash
mysqldump -u u872972048_lubricant -p u872972048_lubricants > backup.sql
```

**Via cPanel:**

1. Go to cPanel → Backup
2. Select database backup option
3. Download backup regularly

---

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [2002] No connection could be made"

**Solution:** Verify database credentials in `.env`:
```
DB_HOST=localhost (or your hosting's DB host)
DB_DATABASE=u872972048_lubricants
DB_USERNAME=u872972048_lubricant
DB_PASSWORD=lPGDz:u^6+
```

Contact hosting support if localhost doesn't work - they may provide a different host.

### Error: "Class 'App\Models\...' not found"

**Solution:** Run composer:
```bash
composer install --optimize-autoloader --no-dev
```

### Error: "Call to undefined function storage_path()"

**Solution:** Ensure correct APP_KEY is set and config is cached:
```bash
php artisan config:cache
```

### 500 Internal Server Error

**Solution:** Check error log:
```bash
tail -100 storage/logs/laravel.log
```

Look for the actual error and research the solution.

### File Uploads Not Working

**Solution:** Check storage permissions:
```bash
ls -la storage/
# Should show drwxr-xr-x (755) or drwxrwxr-x (775)
```

If not, run:
```bash
chmod -R 755 storage bootstrap/cache
```

### Symlink Error: "storage/app/public doesn't exist"

**Solution:** Ensure storage folder has proper structure:
```bash
mkdir -p storage/app/public
chmod -R 755 storage
php artisan storage:link
```

---

## 🔐 Security Checklist

Before going public:

- [ ] `APP_DEBUG=false` (verify in `.env`)
- [ ] `APP_ENV=production` (verify in `.env`)
- [ ] Change default admin password
- [ ] Enable HTTPS/SSL
- [ ] Configure backup system
- [ ] Set up monitoring/logging
- [ ] Review file permissions (especially `.env`)
- [ ] Disable directory listing in web root
- [ ] Keep Laravel and dependencies updated
- [ ] Monitor `storage/logs/laravel.log` regularly

---

## 📝 Configuration Notes

### Key Settings Reference

| Setting | Value | Purpose |
|---------|-------|---------|
| APP_ENV | production | Tells Laravel we're in production |
| APP_DEBUG | false | Hides sensitive info from errors |
| FILESYSTEM_DISK | public | File uploads go to public storage |
| CACHE_STORE | database | Uses database for caching |
| SESSION_DRIVER | database | Uses database for sessions |
| DB_CONNECTION | mysql | Uses MySQL database |
| MAIL_MAILER | smtp | Sends emails via SMTP |

### Database Character Set

Application uses `utf8mb4` encoding to support:
- Emojis in text
- Special characters
- Full Unicode support

Ensure your database supports this character set.

---

## 🚀 Optimization Tips (Optional)

### Enable Gzip Compression

Ask hosting to enable Apache's `mod_deflate` or `mod_gzip` to compress assets.

### Enable Caching Headers

Add to `public/.htaccess`:

```apache
<FilesMatch "\.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$">
    Header set Cache-Control "max-age=31536000, public"
</FilesMatch>
```

### Monitor Performance

- Check `storage/logs/laravel.log` for slow queries
- Use hosting's performance monitoring tools
- Monitor database size growth
- Check disk space regularly

---

## 📞 Support Resources

- **Laravel Docs:** https://laravel.com/docs
- **Laravel Issues:** https://github.com/laravel/framework/issues
- **Hosting Support:** Contact your hosting provider's support team
- **Email Service Support:** Contact your email service provider

---

## 📋 Checklist Summary

### Before Uploading
- [x] Environment configured
- [x] Dependencies installed
- [x] Assets built
- [x] Configuration cached

### On Server
- [ ] Project uploaded (including `.env`)
- [ ] Migrations run
- [ ] Storage symlink created
- [ ] Permissions set (755/775)
- [ ] Domain configured
- [ ] SSL certificate installed
- [ ] Email service configured
- [ ] Testing completed

### Before Going Live
- [ ] All tests passed
- [ ] Backups configured
- [ ] Monitoring set up
- [ ] Security review completed
- [ ] Admin password changed
- [ ] URLs updated to production domain

---

**Status:** Ready for Deployment
**Created:** December 6, 2025
**Project:** Union Lubricants

