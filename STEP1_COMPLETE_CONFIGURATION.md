# STEP 1 – Project Setup: Union Lubricants
## Complete Configuration & File Structure

---

## ✅ STEP 1 COMPLETED SUCCESSFULLY

A fresh **Laravel 12** project has been created with complete authentication scaffolding, Blade views, and MySQL database configuration.

---

## 📋 PROJECT INFORMATION

| Item | Value |
|------|-------|
| **Project Name** | Union Lubricants |
| **Framework** | Laravel 12.40.2 |
| **Authentication** | Laravel Breeze (Blade Stack) |
| **Frontend Views** | Blade Templates with Tailwind CSS |
| **Database** | MySQL (configurable) |
| **Architecture** | MVC (Models, Views, Controllers) |
| **Project Path** | `c:\laragon\www\union_lubricants` |
| **Status** | Ready for database initialization |

---

## 📁 COMPLETE PROJECT STRUCTURE

```
union_lubricants/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── Controller.php
│   │   │   └── ProfileController.php
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── PreventRequestsDuringMaintenance.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrustHosts.php
│   │   │   ├── TrustProxies.php
│   │   │   └── ValidatePostSize.php
│   │   └── Requests/
│   │       └── [Request classes for validation]
│   ├── Models/
│   │   └── User.php (Authenticatable Model)
│   ├── Exceptions/
│   │   └── Handler.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── [Other app directories]
│
├── bootstrap/
│   ├── app.php
│   └── cache/
│
├── config/
│   ├── app.php                    # Application config
│   ├── auth.php                   # Authentication guards & providers
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php               # Database connections
│   ├── filesystems.php            # Storage disks
│   ├── hashing.php
│   ├── logging.php
│   ├── mail.php                   # Mail configuration
│   ├── queue.php
│   ├── services.php
│   └── session.php
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   └── 2025_12_01_173544_create_sessions_table.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── factories/
│       └── UserFactory.php
│
├── public/
│   ├── build/                     # Compiled Vite assets (CSS/JS)
│   │   ├── assets/
│   │   │   ├── app-*.css
│   │   │   ├── app-*.js
│   │   │   └── [Other compiled files]
│   │   └── manifest.json
│   ├── index.php                  # Entry point
│   ├── favicon.ico
│   └── robots.txt
│
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   │   ├── confirm-password.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── reset-password.blade.php
│   │   │   └── verify-email.blade.php
│   │   ├── layouts/
│   │   │   ├── app.blade.php      # Main app layout
│   │   │   ├── auth.blade.php     # Auth pages layout
│   │   │   ├── guest.blade.php    # Guest layout
│   │   │   └── navigation.blade.php
│   │   ├── dashboard.blade.php    # Admin dashboard
│   │   ├── welcome.blade.php      # Home page
│   │   └── [Component files]
│   ├── css/
│   │   └── app.css                # Main stylesheet
│   └── js/
│       └── app.js                 # Main script
│
├── routes/
│   ├── web.php                    # Web routes (MVC)
│   ├── api.php                    # API routes (not used for admin)
│   ├── auth.php                   # Authentication routes
│   ├── channels.php               # Broadcasting channels
│   └── console.php                # Artisan commands
│
├── storage/
│   ├── app/                       # User-uploaded files
│   ├── framework/
│   │   ├── cache/                 # Application cache
│   │   ├── sessions/              # User sessions
│   │   └── views/                 # Compiled views
│   └── logs/                      # Application logs
│
├── tests/
│   ├── Feature/                   # Feature tests
│   ├── Unit/                      # Unit tests
│   └── TestCase.php
│
├── .env                           # Environment variables (configured)
├── .env.example                   # Template .env file
├── .gitignore                     # Git ignore rules
├── artisan                        # Laravel CLI tool
├── composer.json                  # PHP dependencies
├── composer.lock                  # Locked dependency versions
├── package.json                   # Node.js dependencies
├── package-lock.json              # Locked npm versions
├── phpunit.xml                    # PHPUnit testing config
├── vite.config.js                 # Vite bundler config
├── tailwind.config.js             # Tailwind CSS config
├── postcss.config.js              # PostCSS config
│
├── STEP1_PROJECT_SETUP.md         # This step documentation
└── ENV_CONFIGURATION_GUIDE.md     # Environment variables guide

```

---

## 🔧 CONFIGURATION FILES

### `.env` (Environment Configuration)

**Full Current Configuration:**

```env
APP_NAME="Union Lubricants"
APP_ENV=local
APP_KEY=base64:JI3HdUPFAu2P5btGexFnkud6VLOFwkFK4HhZB8Im1wo=
APP_DEBUG=true
APP_URL=http://union-lubricants.local

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=union_lubricants
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="Union Lubricants"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="Union Lubricants"
```

---

## 🗂️ KEY CONFIGURATION FILES

### `config/auth.php` - Authentication Configuration

```php
<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
```

### `config/database.php` - Database Configuration (MySQL)

```php
'mysql' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', 3306),
    'database' => env('DB_DATABASE', 'union_lubricants'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
],
```

---

## 🛡️ ROUTES

### Web Routes (`routes/web.php`)

```php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Welcome page (public)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (protected by auth + email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management (protected by auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include all auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
```

### Auth Routes (`routes/auth.php`)

All authentication routes provided by Laravel Breeze:

```
Guest Routes (accessible without authentication):
  GET    /register                 - Show registration form
  POST   /register                 - Process registration
  GET    /login                    - Show login form
  POST   /login                    - Process login
  GET    /forgot-password          - Show forgot password form
  POST   /forgot-password          - Send reset link email
  GET    /reset-password/{token}   - Show reset password form
  POST   /reset-password           - Process password reset

Authenticated Routes (require auth):
  POST   /logout                   - Logout user
  GET    /verify-email            - Email verification prompt
  POST   /email/verification-notification - Resend verification email
  POST   /confirm-password        - Confirm password action
  PUT    /password                 - Update password
```

---

## 📊 DATABASE MIGRATIONS

### 1. `create_users_table.php`

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

**Fields:**
- `id` - Primary key (auto-increment)
- `name` - User's full name
- `email` - Unique email address (used for login)
- `email_verified_at` - Null until email is verified
- `password` - Hashed password (bcrypt with 12 rounds)
- `remember_token` - "Remember me" functionality
- `created_at`, `updated_at` - Timestamps

### 2. `create_cache_table.php`

```php
Schema::create('cache', function (Blueprint $table) {
    $table->string('key')->primary();
    $table->mediumText('value');
    $table->integer('expiration');
});
```

**Used for:** Application cache storage

### 3. `create_jobs_table.php`

```php
Schema::create('jobs', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('queue')->index();
    $table->longText('payload');
    $table->unsignedTinyInteger('attempts');
    $table->unsignedInteger('reserved_at')->nullable();
    $table->unsignedInteger('available_at');
    $table->unsignedInteger('created_at');
});
```

**Used for:** Queue job storage

### 4. `create_sessions_table.php` (Created by Breeze)

```php
Schema::create('sessions', function (Blueprint $table) {
    $table->string('id')->primary();
    $table->foreignId('user_id')->nullable()->index();
    $table->string('ip_address', 45)->nullable();
    $table->text('user_agent')->nullable();
    $table->longText('payload');
    $table->integer('last_activity')->index();
});
```

**Used for:** User session storage (for session-based authentication)

### 5. `create_password_reset_tokens_table.php`

```php
Schema::create('password_reset_tokens', function (Blueprint $table) {
    $table->string('email')->primary();
    $table->string('token');
    $table->timestamp('created_at')->nullable();
});
```

**Used for:** Password reset token storage

---

## 🔐 USER MODEL

### `app/Models/User.php`

```php
<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable;
    use CanResetPassword;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

---

## 📄 BLADE VIEW STRUCTURE

### Master Layouts

1. **`resources/views/layouts/app.blade.php`** - Application layout
   - Used for authenticated dashboard
   - Includes navigation, top bar, sidebar
   - Dark mode enabled

2. **`resources/views/layouts/guest.blade.php`** - Guest/Auth layout
   - Used for login, register, password reset pages
   - Simple, centered design

3. **`resources/views/layouts/navigation.blade.php`** - Navigation component
   - Header with app name
   - User dropdown menu
   - Logout button

### Authentication Views

- **`resources/views/auth/login.blade.php`** - Login form
- **`resources/views/auth/register.blade.php`** - Registration form
- **`resources/views/auth/forgot-password.blade.php`** - Password reset request
- **`resources/views/auth/reset-password.blade.php`** - Password reset form
- **`resources/views/auth/confirm-password.blade.php`** - Confirm password
- **`resources/views/auth/verify-email.blade.php`** - Email verification

### Main Views

- **`resources/views/dashboard.blade.php`** - Admin dashboard (protected)
- **`resources/views/welcome.blade.php`** - Public home page

---

## 🎨 FRONTEND STACK

### CSS Framework
- **Tailwind CSS 3.4+** - Utility-first CSS framework
- **@tailwindcss/forms** - Form styling plugin
- **Dark mode support** - Built-in dark theme

### JavaScript
- **Vite 7.2.6+** - Lightning-fast bundler
- **Alpine.js** - Lightweight JavaScript framework (included with Breeze)

### Asset Compilation
```bash
npm run dev     # Development with hot reload
npm run build   # Production build
```

---

## 📦 INSTALLED PHP PACKAGES

### Production Dependencies
```json
{
  "laravel/framework": "^12.0",
  "laravel/breeze": "^2.3",
  "laravel/tinker": "^2.10"
}
```

### Development Dependencies
```json
{
  "phpunit/phpunit": "^11.5",
  "laravel/pint": "^1.26",
  "mockery/mockery": "^1.6",
  "fakerphp/faker": "^1.24"
}
```

### Node.js Dependencies
```json
{
  "vite": "^7.2",
  "laravel-vite-plugin": "^2.0",
  "tailwindcss": "^3.4",
  "@tailwindcss/forms": "^0.5"
}
```

---

## 🗄️ DATABASE SETUP STEPS

**Run these commands after creating the MySQL database:**

```bash
# Create the database
# In MySQL: CREATE DATABASE union_lubricants;

# Run all migrations
php artisan migrate

# (Optional) Reset and re-run migrations
php artisan migrate:refresh

# (Optional) Seed the database
php artisan db:seed
```

---

## 🚀 RUNNING THE APPLICATION

### Start Development Server
```bash
php artisan serve
# Access at http://127.0.0.1:8000
```

### Build Frontend Assets
```bash
npm run dev      # Development mode with hot reload
npm run build    # Production build
```

### Run Migrations
```bash
php artisan migrate
```

### Create Admin User (Manual in next step)
Will be implemented in STEP 4: Admin-Only Authentication

---

## 🔑 KEY FEATURES INSTALLED

✅ **User Authentication**
- Login/Logout
- User Registration (will be disabled in STEP 4)
- Password Reset
- Email Verification
- Remember Me functionality

✅ **User Profile Management**
- View/Edit profile
- Change password
- Delete account

✅ **Security Features**
- CSRF Protection (automatic)
- Password hashing (bcrypt)
- Session management
- Email verification

✅ **Frontend Framework**
- Responsive design
- Dark mode support
- Tailwind CSS utilities
- Component-based architecture

---

## 📝 REQUIRED ENV KEYS REFERENCE

**Critical (Must Configure):**
- `APP_NAME` ✅ Set to "Union Lubricants"
- `APP_KEY` ✅ Auto-generated
- `APP_URL` ✅ Set to http://union-lubricants.local
- `DB_CONNECTION` ✅ Set to mysql
- `DB_HOST` ✅ Set to 127.0.0.1
- `DB_DATABASE` ✅ Set to union_lubricants
- `DB_USERNAME` ✅ Set to root

**Important (Default OK for development):**
- `APP_ENV` - Set to "local"
- `APP_DEBUG` - Set to true
- `SESSION_DRIVER` - Set to "database"
- `MAIL_MAILER` - Set to "log" for dev

**Production Only:**
- `DB_PASSWORD` - Set actual password
- `MAIL_MAILER`, `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD` - SMTP settings
- `SESSION_ENCRYPT` - Set to true
- `FILESYSTEM_DISK` - Consider S3
- `REDIS_*` - If using Redis

---

## ✨ WHAT'S NEXT

**STEP 2:** Database initialization & migration
**STEP 3:** Admin-only authentication (disable registration, add roles)
**STEP 4:** Core business models (Products, Inventory, Orders, Customers)
**STEP 5:** Admin dashboard & reports

---

## 📞 TROUBLESHOOTING

**Issue**: "No application encryption key has been generated"
```bash
php artisan key:generate
```

**Issue**: "Connection refused" for database
- Ensure MySQL is running
- Verify DB credentials in `.env`
- Create database: `CREATE DATABASE union_lubricants;`

**Issue**: Migrations don't run
```bash
php artisan migrate --fresh
```

**Issue**: Assets not loading
```bash
npm install
npm run build
```

---

## 📅 COMPLETION CHECKLIST

- ✅ Laravel 12 project created
- ✅ Laravel Breeze authentication installed
- ✅ Blade views scaffolded with Tailwind CSS
- ✅ Dark mode enabled
- ✅ MySQL database configured
- ✅ All environment variables set
- ✅ Migrations prepared and ready
- ✅ Frontend build tools configured
- ✅ Session database driver configured
- ✅ Security features enabled

---

## 📄 FILES CREATED IN STEP 1

- `STEP1_PROJECT_SETUP.md` - Complete setup documentation
- `ENV_CONFIGURATION_GUIDE.md` - Environment variables guide
- `.env` - Environment configuration (MySQL, Breeze, etc.)
- Complete Laravel project structure with Breeze scaffolding

**Total Files**: 100+ (standard Laravel + Breeze)

---

**Status**: STEP 1 COMPLETE ✅

**Next Action**: Create MySQL database and run migrations (STEP 2)

