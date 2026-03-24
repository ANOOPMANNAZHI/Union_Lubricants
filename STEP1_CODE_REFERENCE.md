# Union Lubricants - STEP 1 Code Reference
## Complete File Outputs

---

## 📋 FILE LISTING

**Documentation Files Created:**
```
STEP1_PROJECT_SETUP.md              - Detailed setup documentation
ENV_CONFIGURATION_GUIDE.md          - Complete .env reference guide  
STEP1_COMPLETE_CONFIGURATION.md     - Full configuration with code examples
STEP1_SUMMARY.md                    - Quick start guide
STEP1_OVERVIEW.txt                  - Visual summary
STEP1_CODE_REFERENCE.md             - This file
```

**Configuration Files Modified:**
```
.env                                - Environment variables (configured for MySQL)
.env.example                        - Template (unchanged)
```

**Project Root Files:**
```
composer.json                       - PHP dependencies
composer.lock                       - Locked dependency versions (111 packages)
package.json                        - Node.js dependencies
package-lock.json                   - Locked npm versions (159 packages)
vite.config.js                      - Vite bundler configuration
tailwind.config.js                  - Tailwind CSS configuration
postcss.config.js                   - PostCSS configuration
phpunit.xml                         - Testing configuration
artisan                             - Laravel CLI tool
README.md                           - Default Laravel README
```

**Total Files in Project:** 100+

---

## 🔧 KEY CONFIGURATION FILES (Full Code)

### `.env` - Environment Configuration

```dotenv
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

## 📂 DIRECTORY STRUCTURE

```
union_lubricants/
├── app/
│   ├── Broadcasting/           → Broadcasting channels
│   ├── Console/                → Artisan commands
│   ├── Events/                 → Event classes
│   ├── Exceptions/             → Exception handling
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
│   │   ├── Requests/
│   │   │   └── (Custom request validation classes)
│   │   └── Kernel.php
│   ├── Jobs/                   → Queued jobs
│   ├── Listeners/              → Event listeners
│   ├── Mail/                   → Mailable classes
│   ├── Models/
│   │   ├── User.php            → User model (Authenticatable)
│   │   └── (Business models here in STEP 4)
│   ├── Notifications/          → Notification classes
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── Rules/                  → Custom validation rules
│
├── bootstrap/
│   ├── app.php                 → Application bootstrap file
│   └── cache/                  → Application cache
│
├── config/
│   ├── app.php                 → Application configuration
│   ├── auth.php                → Authentication configuration
│   ├── broadcasting.php        → Broadcasting configuration
│   ├── cache.php               → Cache configuration
│   ├── database.php            → Database configuration
│   ├── filesystems.php         → File storage configuration
│   ├── hashing.php             → Password hashing (bcrypt)
│   ├── logging.php             → Logging configuration
│   ├── mail.php                → Mail configuration
│   ├── queue.php               → Queue configuration
│   ├── services.php            → Third-party services
│   └── session.php             → Session configuration
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2025_12_01_173544_create_sessions_table.php
│   │   └── (Add new migrations here in future steps)
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   └── (Add data seeders here in STEP 3)
│   └── factories/
│       └── UserFactory.php
│
├── public/
│   ├── build/
│   │   ├── assets/
│   │   │   ├── app-*.css       → Compiled Tailwind CSS
│   │   │   └── app-*.js        → Compiled JavaScript
│   │   └── manifest.json
│   ├── index.php               → Application entry point
│   ├── .htaccess
│   ├── favicon.ico
│   ├── robots.txt
│   └── web.config
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
│   │   │   ├── app.blade.php   → Main application layout
│   │   │   ├── auth.blade.php  → Auth pages layout
│   │   │   ├── guest.blade.php → Guest layout
│   │   │   └── navigation.blade.php
│   │   ├── components/
│   │   │   ├── application-logo.blade.php
│   │   │   └── responsive-nav-link.blade.php
│   │   ├── dashboard.blade.php → Admin dashboard
│   │   └── welcome.blade.php   → Home page
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
│
├── routes/
│   ├── web.php                 → Web routes (MVC)
│   ├── api.php                 → API routes (not used for admin)
│   ├── auth.php                → Authentication routes
│   ├── channels.php            → Broadcasting channels
│   └── console.php             → Artisan commands
│
├── storage/
│   ├── app/
│   │   ├── public/             → User-uploaded files
│   │   └── logs/
│   ├── framework/
│   │   ├── cache/              → Application cache
│   │   ├── sessions/           → User sessions
│   │   └── views/              → Compiled Blade templates
│   └── logs/
│       └── laravel.log         → Application logs
│
├── tests/
│   ├── Feature/                → Feature tests
│   ├── Unit/                   → Unit tests
│   └── TestCase.php
│
├── .env                        → Environment variables (configured)
├── .env.example                → Template .env file
├── .gitignore                  → Git ignore rules
├── .gitattributes             → Git attributes
├── .editorconfig              → Editor configuration
├── artisan                    → Laravel CLI tool
├── composer.json              → PHP dependencies
├── composer.lock              → Locked versions
├── package.json               → Node.js dependencies
├── package-lock.json          → Locked npm versions
├── phpunit.xml                → Testing configuration
├── vite.config.js             → Vite configuration
├── tailwind.config.js         → Tailwind CSS configuration
├── postcss.config.js          → PostCSS configuration
├── README.md                  → Laravel README
│
└── Documentation Files:
    ├── STEP1_PROJECT_SETUP.md
    ├── ENV_CONFIGURATION_GUIDE.md
    ├── STEP1_COMPLETE_CONFIGURATION.md
    ├── STEP1_SUMMARY.md
    ├── STEP1_OVERVIEW.txt
    └── STEP1_CODE_REFERENCE.md (this file)
```

---

## 🔐 User Model (`app/Models/User.php`)

```php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
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

## 🛣️ Web Routes (`routes/web.php`)

```php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
```

---

## 🔑 Auth Routes (`routes/auth.php`)

```php
<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
```

---

## ⚙️ Config - App (`config/app.php` - Key Settings)

```php
return [
    'name' => env('APP_NAME', 'Laravel'),      // "Union Lubricants"
    'env' => env('APP_ENV', 'production'),     // "local"
    'debug' => (bool) env('APP_DEBUG', false), // true
    'url' => env('APP_URL', 'http://localhost'), // http://union-lubricants.local
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    
    // ... providers, aliases, etc.
];
```

---

## 🔐 Config - Auth (`config/auth.php` - Key Settings)

```php
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

---

## 💾 Config - Database (`config/database.php` - MySQL Settings)

```php
'mysql' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),     // 127.0.0.1
    'port' => env('DB_PORT', 3306),            // 3306
    'database' => env('DB_DATABASE', 'laravel'), // union_lubricants
    'username' => env('DB_USERNAME', 'root'),  // root
    'password' => env('DB_PASSWORD', ''),      // (empty)
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

## 📧 Config - Mail (`config/mail.php` - Key Settings)

```php
return [
    'default' => env('MAIL_MAILER', 'log'),    // 'log' for development
    
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),  // "Union Lubricants"
    ],

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
            'port' => env('MAIL_PORT', 2525),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],
    ],
];
```

---

## 📄 Blade Template Example (`resources/views/layouts/app.blade.php`)

The main application layout includes:
- Dark mode support
- Responsive navigation
- User dropdown menu
- Logout button
- Slot for page content

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
```

---

## 🔄 Database Migration Example (`database/migrations/*create_users_table.php`)

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
```

---

## 📦 Dependencies

### Composer Packages (PHP)

```json
{
  "require": {
    "laravel/framework": "^12.0",
    "laravel/breeze": "^2.3",
    "laravel/tinker": "^2.10"
  },
  "require-dev": {
    "phpunit/phpunit": "^11.5",
    "laravel/pint": "^1.26",
    "mockery/mockery": "^1.6",
    "fakerphp/faker": "^1.24"
  }
}
```

### NPM Packages (JavaScript)

```json
{
  "devDependencies": {
    "axios": "^1.6.1",
    "laravel-vite-plugin": "^2.0.0",
    "vite": "^7.2.0",
    "@tailwindcss/forms": "^0.5.7",
    "tailwindcss": "^3.4.0"
  }
}
```

---

## 📊 Database Tables Structure

### `users`
```sql
CREATE TABLE users (
    id bigint unsigned PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    email_verified_at timestamp NULL,
    password varchar(255) NOT NULL,
    remember_token varchar(100),
    created_at timestamp NULL,
    updated_at timestamp NULL
);
```

### `sessions`
```sql
CREATE TABLE sessions (
    id varchar(255) PRIMARY KEY,
    user_id bigint unsigned,
    ip_address varchar(45),
    user_agent text,
    payload longtext NOT NULL,
    last_activity int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### `cache`
```sql
CREATE TABLE cache (
    key varchar(255) PRIMARY KEY,
    value mediumtext NOT NULL,
    expiration int NOT NULL
);
```

---

## 🎯 Key Takeaways

1. **MVC Architecture Ready**
   - Models: `app/Models/User.php`
   - Views: `resources/views/*.blade.php`
   - Controllers: `app/Http/Controllers/`

2. **Authentication Complete**
   - Session-based (database driver)
   - Email verification included
   - Password reset functionality
   - Profile management
   - All routes registered in `routes/auth.php`

3. **Database Ready**
   - MySQL configured (not yet created)
   - Migrations prepared (not yet executed)
   - User table schema ready
   - Session storage configured

4. **Frontend Framework**
   - Tailwind CSS 3.4+
   - Dark mode enabled
   - Responsive design
   - Blade templating

5. **Security Built-In**
   - CSRF protection
   - Password hashing (bcrypt, 12 rounds)
   - Email verification
   - Session management
   - SQL injection prevention

6. **Development Tools**
   - Vite (asset bundler)
   - PHPUnit (testing)
   - Laravel Pint (code formatting)
   - Faker (test data)

---

## 🚀 Next Steps for STEP 2

1. Create MySQL database
2. Run migrations
3. Create admin user
4. Test login functionality
5. Verify dashboard access

---

**Status**: STEP 1 ✅ COMPLETE
**Next**: STEP 2 - Database Initialization & Migrations

