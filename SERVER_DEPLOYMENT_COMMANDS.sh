#!/bin/bash
# Union Lubricants - Server Deployment Commands
# Run these commands on your hosting server after uploading the project

# ============================================================
# STEP 1: Navigate to Project Directory
# ============================================================
cd /path/to/union_lubricants

# ============================================================
# STEP 2: Run Database Migrations (Creates Tables)
# ============================================================
php artisan migrate --force

# ============================================================
# STEP 3: Create Storage Symlink (For File Uploads)
# ============================================================
php artisan storage:link

# ============================================================
# STEP 4: Set File Permissions
# ============================================================
# Option A: Basic permissions (755)
chmod -R 755 storage bootstrap/cache

# Option B: Group write permissions (775) - if web server in different group
chmod -R 775 storage bootstrap/cache

# ============================================================
# STEP 5: Clear Old Cache (Safe to do, creates fresh)
# ============================================================
php artisan config:clear
php artisan view:clear

# ============================================================
# STEP 6: Re-cache Configuration & Routes (Production)
# ============================================================
php artisan config:cache
php artisan route:cache

# ============================================================
# STEP 7: Verify Installation
# ============================================================
# Check for errors in the log file
tail -f storage/logs/laravel.log

# ============================================================
# DATABASE MIGRATION DETAILS
# ============================================================
# This creates the following tables:
# - users (admin users)
# - sessions (session storage)
# - cache (cache storage)
# - jobs (queue jobs)
# - password_reset_tokens
# - product_categories
# - products
# - industries
# - industry_product (pivot table)
# - posts (news/blog)
# - enquiries (contact form submissions)
# - settings
# - abouts
# - certifications
# - testimonials
# - services
# - banners

# ============================================================
# AFTER DEPLOYMENT - UPDATE .env FOR YOUR DOMAIN
# ============================================================
# 1. Edit .env file with your domain:
#    APP_URL=https://yourdomain.com
#
# 2. Update email credentials (Mailtrap currently):
#    MAIL_HOST=smtp.mailtrap.io
#    MAIL_USERNAME=your-mailtrap-username
#    MAIL_PASSWORD=your-mailtrap-password
#
# 3. Re-cache after changes:
#    php artisan config:cache

# ============================================================
# TESTING COMMANDS
# ============================================================

# Test database connection
php artisan tinker
# In tinker, type: \DB::connection()->getPdo()
# If no error, database is connected

# Test email configuration
php artisan tinker
# In tinker, type:
# \Mail::raw('Test email', function($m) {
#   $m->to('test@example.com')->subject('Test');
# });

# ============================================================
# BACKUP COMMANDS
# ============================================================

# Backup database to SQL file
mysqldump -u u872972048_lubricant -p u872972048_lubricants > backup.sql

# Note: Replace password when prompted with: lPGDz:u^6+

# ============================================================
# MONITORING
# ============================================================

# Watch error logs in real-time
tail -f storage/logs/laravel.log

# Check disk usage
du -sh /path/to/union_lubricants

# Check database size
mysql -u u872972048_lubricant -p u872972048_lubricants -e "SELECT SUM(data_length + index_length) FROM information_schema.tables WHERE table_schema='u872972048_lubricants';"

# ============================================================
# TROUBLESHOOTING
# ============================================================

# If migrations fail, try:
php artisan migrate:reset --force
php artisan migrate --force

# If storage symlink fails, manually create it:
ln -s /path/to/union_lubricants/storage/app/public /path/to/union_lubricants/public/storage

# Clear all application cache:
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Re-build cache:
php artisan config:cache
php artisan route:cache

# Check Laravel installation:
php artisan about

# ============================================================
# CRON JOB (If using queues/scheduled tasks)
# ============================================================
# Add to crontab -e:
# * * * * * cd /path/to/union_lubricants && php artisan schedule:run >> /dev/null 2>&1

# ============================================================
# NOTES
# ============================================================
# 1. Always backup database before running migrations
# 2. Keep .env file secure and never commit to git
# 3. Monitor storage/logs/laravel.log for errors
# 4. Update email credentials before going live
# 5. Configure SSL/HTTPS for production
# 6. Set up regular backups
# 7. Test all features before announcing to users

