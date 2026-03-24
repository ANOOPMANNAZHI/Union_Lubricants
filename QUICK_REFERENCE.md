# Union Lubricants - Quick Reference Card

## 🔐 Database Credentials (SAVE THIS!)

```
Database: u872972048_lubricants
Username: u872972048_lubricant
Password: lPGDz:u^6+
Host: localhost (or as provided by hosting)
Port: 3306
```

## 📋 3-Step Deployment

### Step 1: Upload to Server
- Upload entire `union_lubricants` folder
- Include `.env` file (contains credentials)

### Step 2: SSH into Server
```bash
cd /path/to/union_lubricants
```

### Step 3: Run These Commands (In Order)
```bash
php artisan migrate --force
php artisan storage:link
chmod -R 755 storage bootstrap/cache
```

**Done!** Your site is now live.

---

## 🔧 Configuration Updates

### Update Your Domain in .env
```
APP_URL=https://yourdomain.com
```
Then run: `php artisan config:cache`

### Update Email Credentials
Edit `.env` with your email service:

**Option 1: SendGrid**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=SG.xxxxx
MAIL_FROM_ADDRESS=noreply@yourdomain.com
```

**Option 2: Gmail**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_FROM_ADDRESS=your-email@gmail.com
```

Then run: `php artisan config:cache`

---

## ✅ Testing Checklist

After deployment, test these:

- [ ] Homepage loads: `https://yourdomain.com`
- [ ] Products page: `https://yourdomain.com/products`
- [ ] Admin login: `https://yourdomain.com/login`
- [ ] Admin dashboard: `https://yourdomain.com/admin/`
- [ ] File upload works (try uploading product image)
- [ ] Contact form sends email
- [ ] All images load correctly
- [ ] Mobile responsive works

---

## 🐛 If Something Goes Wrong

### Check Error Log
```bash
tail -f storage/logs/laravel.log
```

### Clear Cache & Retry
```bash
php artisan config:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
```

### Check Database Connection
```bash
php artisan tinker
# Type: \DB::connection()->getPdo()
# If no error = database is connected
```

### Fix Permissions
```bash
chmod -R 755 storage bootstrap/cache
chmod -R 755 public
```

---

## 📁 Important Files

| File | Purpose | Action |
|------|---------|--------|
| `.env` | Configuration | Keep secure, never commit to git |
| `storage/` | File uploads | Needs write permissions (755) |
| `public/` | Website root | Point domain here |
| `bootstrap/cache/` | Cache files | Needs write permissions |
| `storage/logs/laravel.log` | Error logs | Monitor for issues |

---

## 🔒 Security Notes

- ✅ APP_DEBUG is false (safe for production)
- ✅ All secrets in .env (not in code)
- ⚠️ Enable HTTPS/SSL (critical!)
- ⚠️ Change admin password after setup
- ⚠️ Regular backups (set up immediately)
- ⚠️ Monitor error logs regularly

---

## 📊 What Gets Created in Database

When you run `php artisan migrate --force`:

**Tables Created:** 17 tables
- User management (users, passwords, sessions)
- Products (products, categories, images)
- Blog/News (posts, comments)
- Services (services, industries)
- Contact (enquiries/submissions)
- Content (about, banners, certifications, testimonials, settings)

**Data:** Empty - ready for you to add content in admin panel

---

## 🆘 Support

**Issues?** Check these in order:

1. Error log: `storage/logs/laravel.log`
2. This guide: Look at DEPLOYMENT_GUIDE.md
3. Database credentials: Verify in `.env`
4. File permissions: Run `chmod -R 755 storage bootstrap/cache`
5. Hosting support: Contact your hosting provider

---

## ✨ Admin Features Available

**Login at:** `https://yourdomain.com/login`

Admin can manage:
- ✅ Products & Categories
- ✅ Blog Posts
- ✅ Services
- ✅ Banners
- ✅ Testimonials
- ✅ Enquiries from visitors
- ✅ Settings (company info)
- ✅ User profile
- ✅ Certifications
- ✅ Industries

---

## 🚀 You're Ready!

Everything is configured and ready to deploy:
- ✅ Environment set to production
- ✅ Database credentials configured
- ✅ Assets built and optimized
- ✅ Documentation complete

**Next Step:** Upload to hosting server and run the 3 commands above!

---

**Credentials:** Stored in `.env`  
**Database:** Ready to migrate  
**Assets:** Built and optimized  
**Status:** READY FOR PRODUCTION  

Good luck! 🎉

