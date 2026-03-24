# Union Lubricants - Deployment Checklist

**Database Credentials:**
- Database: `u872972048_lubricants`
- Username: `u872972048_lubricant`
- Password: `lPGDz:u^6+`
- Host: `localhost` (or provided by hosting)

---

## ✅ Completed Pre-Deployment Tasks

- [x] Updated `.env` file with production settings
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - Database credentials configured
  - `FILESYSTEM_DISK=public`
  - Mail configuration set to SMTP

- [x] Installed Composer dependencies (optimized for production)
  - `composer install --optimize-autoloader --no-dev`

- [x] Built frontend assets
  - `npm install`
  - `npm run build` ✓ (Successfully created public/build/)

- [x] Cached configuration and routes
  - `php artisan config:cache` ✓
  - `php artisan route:cache` ✓
  - Views already cached

---

## 📋 Tasks to Perform on Hosting Server

### 1. Upload Project Files
- [ ] Upload entire project to server's public_html or www directory
- [ ] Ensure `.env` file is uploaded (contains database credentials)
- [ ] Verify `.htaccess` exists in `public/` folder (for Apache rewrite rules)

### 2. Database Setup
- [ ] Connect to hosting server via SSH/terminal
- [ ] Run migrations to create database tables:
  ```bash
  php artisan migrate --force
  ```
- [ ] (Optional) Seed initial data if needed:
  ```bash
  php artisan db:seed
  ```

### 3. File Permissions
- [ ] Set write permissions on storage directory:
  ```bash
  chmod -R 755 storage bootstrap/cache
  # Or for group write (if web server in different group):
  chmod -R 775 storage bootstrap/cache
  ```
- [ ] Set ownership (if possible):
  ```bash
  chown -R www-data:www-data storage bootstrap/cache
  ```

### 4. Create Storage Symlink
- [ ] Run this command to link public storage to app storage:
  ```bash
  php artisan storage:link
  ```
  This allows file uploads to be publicly accessible

### 5. Configure Web Server (Apache)
- [ ] Ensure `DocumentRoot` points to `public/` folder:
  ```apache
  DocumentRoot /home/username/public_html/yourdomain.com/public
  ```
- [ ] Enable `mod_rewrite` module:
  ```apache
  a2enmod rewrite
  ```
- [ ] Restart Apache:
  ```bash
  systemctl restart apache2
  # or
  service apache2 restart
  ```

### 6. Configure Domain & SSL
- [ ] Point domain DNS to hosting server
- [ ] Set up SSL certificate (Let's Encrypt recommended)
- [ ] Update `APP_URL` in `.env` to use `https://yourdomain.com`
- [ ] Force HTTPS redirect (add to `public/.htaccess`)

### 7. Email Configuration (Update Before Going Live)
- [ ] Configure SMTP credentials in `.env`:
  - Option A: Use hosting provider's mail server
  - Option B: Use third-party service:
    - **Mailtrap** (testing): mailtrap.io
    - **SendGrid**: sendgrid.com (free tier available)
    - **Postmark**: postmarkapp.com
    - **Amazon SES**: aws.amazon.com/ses/

### 8. Testing & Verification
- [ ] [ ] Test homepage loads correctly
- [ ] [ ] Test admin login: `/login`
- [ ] [ ] Test admin dashboard: `/admin/`
- [ ] [ ] Test file upload (try uploading a product image in admin)
- [ ] [ ] Test contact form submission (verify email sending)
- [ ] [ ] Check `storage/logs/laravel.log` for any errors
- [ ] [ ] Verify all CSS/JS assets load from `/build/` folder
- [ ] [ ] Test responsive design on mobile

### 9. Performance Optimization (Optional)
- [ ] [ ] Enable gzip compression in Apache:
  ```apache
  mod_deflate or mod_gzip
  ```
- [ ] [ ] Set up caching headers for static assets
- [ ] [ ] Configure cron job for queue (if using async jobs):
  ```bash
  * * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
  ```

### 10. Backup & Monitoring
- [ ] [ ] Set up regular database backups
- [ ] [ ] Configure error logging and monitoring
- [ ] [ ] Document admin login credentials securely

---

## 🔐 Security Checklist

- [ ] Ensure `.env` file is NOT publicly accessible
- [ ] Verify `APP_DEBUG=false` in production
- [ ] Check that `storage/` directory is outside `public/` root
- [ ] Disable directory listing in Apache (add `Options -Indexes`)
- [ ] Set strong admin password (change default if seeded)
- [ ] Enable HTTPS only (force redirect from HTTP)
- [ ] Review Laravel security best practices

---

## 📧 Email Service Setup Instructions

### Option 1: Mailtrap (Free for Testing)
1. Go to mailtrap.io
2. Sign up for free account
3. Create a project
4. Copy SMTP credentials
5. Update `.env`:
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.mailtrap.io
   MAIL_PORT=465
   MAIL_USERNAME=your-username
   MAIL_PASSWORD=your-password
   MAIL_ENCRYPTION=tls
   ```

### Option 2: SendGrid (Free tier available)
1. Go to sendgrid.com
2. Create account (free tier: 100 emails/day)
3. Create API key
4. Update `.env`:
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.sendgrid.net
   MAIL_PORT=587
   MAIL_USERNAME=apikey
   MAIL_PASSWORD=your-api-key
   MAIL_ENCRYPTION=tls
   ```

### Option 3: Hosting Provider's Mail Service
Contact your hosting provider for SMTP credentials and configure in `.env`

---

## 📁 Important File Structure

```
/public_html/union_lubricants/
├── public/                          ← Point domain root here
│   ├── index.php                    ← Laravel entry point
│   ├── .htaccess                    ← Rewrite rules
│   ├── storage → ../storage/app/public/  ← Symlink for uploads
│   └── build/                       ← Built assets (CSS, JS)
├── app/                             ← Application code
├── storage/
│   ├── app/
│   │   └── public/                  ← User uploads stored here
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/                        ← Error logs
├── bootstrap/
│   └── cache/                       ← Application cache
├── database/
│   ├── migrations/                  ← Database schemas
│   └── seeders/                     ← Initial data
├── .env                             ← Configuration (KEEP SECURE!)
├── .htaccess                        ← Apache rewrite rules (root)
├── composer.json                    ← PHP dependencies
└── package.json                     ← JavaScript dependencies
```

---

## 🚀 Quick Deployment Command Summary

After uploading to server, run these in order:

```bash
cd /path/to/union_lubricants

# 1. Clear old cache
php artisan config:clear
php artisan view:clear

# 2. Run migrations (creates database tables)
php artisan migrate --force

# 3. Seed initial data (OPTIONAL - only if needed)
php artisan db:seed

# 4. Create storage symlink (for file uploads)
php artisan storage:link

# 5. Set permissions
chmod -R 755 storage bootstrap/cache

# 6. Re-cache for production
php artisan config:cache
php artisan route:cache
```

---

## ⚠️ Troubleshooting

**Problem:** "No connection could be made"
- **Solution:** Verify database credentials in `.env` match your hosting DB

**Problem:** "Class not found" errors
- **Solution:** Run `composer install --optimize-autoloader --no-dev`

**Problem:** File uploads not working
- **Solution:** Check `storage/` permissions (should be 755 or 775)

**Problem:** 403 Forbidden error
- **Solution:** Ensure `DocumentRoot` points to `public/` not project root

**Problem:** 500 Internal Server Error
- **Solution:** Check `storage/logs/laravel.log` for detailed error message

---

## 📞 Support Resources

- Laravel Documentation: https://laravel.com/docs
- Composer Issues: https://getcomposer.org/doc/
- Server Configuration: Ask your hosting provider's support
- Email Setup Help: Contact your email service provider

---

**Status:** Ready for production deployment
**Last Updated:** December 6, 2025
**Project:** Union Lubricants CMS

