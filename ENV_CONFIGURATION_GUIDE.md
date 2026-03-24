# Environment Configuration Guide
## Union Lubricants - Laravel Project

This document describes all .env configuration keys needed for the Union Lubricants application.

---

## Core Application Settings

### `APP_NAME`
- **Current Value**: `"Union Lubricants"`
- **Description**: Application name displayed throughout the UI
- **Type**: String
- **Required**: Yes

### `APP_ENV`
- **Current Value**: `local`
- **Options**: `local`, `production`, `staging`, `testing`
- **Description**: Environment mode (affects error reporting, debugging, caching)
- **Type**: String
- **Required**: Yes

### `APP_KEY`
- **Current Value**: `base64:JI3HdUPFAu2P5btGexFnkud6VLOFwkFK4HhZB8Im1wo=`
- **Description**: Encryption key for application data
- **Type**: String (base64 encoded)
- **Generated**: Automatically via `php artisan key:generate`
- **Required**: Yes
- **Note**: Never share this key publicly

### `APP_DEBUG`
- **Current Value**: `true`
- **Options**: `true`, `false`
- **Description**: Show detailed error pages (development only)
- **Type**: Boolean
- **Required**: Yes
- **Production Note**: Must be `false` in production

### `APP_URL`
- **Current Value**: `http://union-lubricants.local`
- **Description**: Base URL of the application
- **Type**: URL String
- **Required**: Yes
- **Production**: Change to your domain (e.g., `https://union-lubricants.com`)

---

## Localization & Timezone

### `APP_LOCALE`
- **Current Value**: `en`
- **Description**: Default application language
- **Type**: String (language code)
- **Options**: `en`, `es`, `fr`, `de`, etc.
- **Required**: Yes

### `APP_FALLBACK_LOCALE`
- **Current Value**: `en`
- **Description**: Fallback language if translation is missing
- **Type**: String (language code)
- **Required**: Yes

### `APP_FAKER_LOCALE`
- **Current Value**: `en_US`
- **Description**: Locale for Faker (test data generation)
- **Type**: String
- **Required**: Yes (for testing/seeding)

---

## Database Configuration

### `DB_CONNECTION`
- **Current Value**: `mysql`
- **Options**: `mysql`, `pgsql`, `sqlite`, `sqlserver`
- **Description**: Database driver
- **Type**: String
- **Required**: Yes

### `DB_HOST`
- **Current Value**: `127.0.0.1`
- **Description**: Database server hostname/IP
- **Type**: String
- **Required**: Yes
- **Note**: Use `localhost` on Windows/Mac, `127.0.0.1` on Linux

### `DB_PORT`
- **Current Value**: `3306`
- **Description**: Database server port
- **Type**: Integer
- **Required**: Yes
- **Default**: 3306 for MySQL

### `DB_DATABASE`
- **Current Value**: `union_lubricants`
- **Description**: Database name
- **Type**: String
- **Required**: Yes
- **Setup**: Create this database manually: `CREATE DATABASE union_lubricants;`

### `DB_USERNAME`
- **Current Value**: `root`
- **Description**: Database user
- **Type**: String
- **Required**: Yes
- **Note**: Do NOT use `root` in production

### `DB_PASSWORD`
- **Current Value**: (empty)
- **Description**: Database user password
- **Type**: String
- **Required**: Sometimes (if password is set)
- **Note**: Do NOT hardcode in version control

---

## Cache Configuration

### `CACHE_STORE`
- **Current Value**: `database`
- **Options**: `array`, `database`, `file`, `memcached`, `redis`
- **Description**: Default cache driver
- **Type**: String
- **Required**: Yes
- **Development**: `database` or `array` is fine
- **Production**: Consider `redis` for performance

### `CACHE_PREFIX`
- **Current Value**: (empty)
- **Description**: Prefix for cache keys (useful for shared servers)
- **Type**: String
- **Required**: No

---

## Session Configuration

### `SESSION_DRIVER`
- **Current Value**: `database`
- **Options**: `cookie`, `database`, `file`, `memcached`, `redis`
- **Description**: Where user sessions are stored
- **Type**: String
- **Required**: Yes
- **Note**: `database` allows session invalidation on logout

### `SESSION_LIFETIME`
- **Current Value**: `120`
- **Description**: Session timeout in minutes (2 hours)
- **Type**: Integer
- **Required**: Yes
- **Adjustment**: Increase for longer sessions, decrease for higher security

### `SESSION_ENCRYPT`
- **Current Value**: `false`
- **Description**: Encrypt session data
- **Type**: Boolean
- **Required**: Yes
- **Note**: Set to `true` in production for sensitive data

### `SESSION_PATH` & `SESSION_DOMAIN`
- **Current Values**: `/` and `null`
- **Description**: Cookie path and domain restrictions
- **Type**: String
- **Required**: No

---

## Mail Configuration

### `MAIL_MAILER`
- **Current Value**: `log`
- **Options**: `log`, `smtp`, `mailgun`, `sendgrid`, `ses`, `postmark`
- **Description**: Email driver
- **Type**: String
- **Required**: Yes
- **Development**: Use `log` to test emails without sending
- **Production**: Change to `smtp` or a service

### `MAIL_HOST`
- **Current Value**: `127.0.0.1`
- **Description**: SMTP host
- **Type**: String
- **Required**: If using `smtp` mailer
- **Examples**:
  - Mailgun: `smtp.mailgun.org`
  - SendGrid: `smtp.sendgrid.net`
  - Gmail: `smtp.gmail.com`

### `MAIL_PORT`
- **Current Value**: `2525`
- **Description**: SMTP port
- **Type**: Integer
- **Required**: If using `smtp` mailer
- **Common Ports**: 25 (unencrypted), 465 (SSL), 587 (TLS)

### `MAIL_USERNAME` & `MAIL_PASSWORD`
- **Current Values**: `null`
- **Description**: SMTP credentials
- **Type**: String
- **Required**: If using `smtp` mailer
- **Note**: Do NOT commit these to version control

### `MAIL_FROM_ADDRESS` & `MAIL_FROM_NAME`
- **Current Values**: `hello@example.com` and `${APP_NAME}`
- **Description**: Default sender email and name
- **Type**: String
- **Required**: Yes
- **Update**: Change to your company email

### `MAIL_SCHEME`
- **Current Value**: `null`
- **Description**: Encryption scheme (`null`, `tls`, `ssl`)
- **Type**: String
- **Required**: No (auto-detected by port)

---

## File Storage Configuration

### `FILESYSTEM_DISK`
- **Current Value**: `local`
- **Options**: `local`, `s3`, `other configured disks`
- **Description**: Default storage disk
- **Type**: String
- **Required**: Yes
- **Development**: Use `local` (stores in `storage/app`)
- **Production**: Consider `s3` for scalability

---

## AWS S3 Configuration (Optional)

### `AWS_ACCESS_KEY_ID`
- **Description**: AWS IAM access key
- **Type**: String
- **Required**: Only if using S3 for file storage
- **Note**: Do NOT commit this

### `AWS_SECRET_ACCESS_KEY`
- **Description**: AWS IAM secret key
- **Type**: String
- **Required**: Only if using S3 for file storage
- **Note**: Do NOT commit this

### `AWS_DEFAULT_REGION`
- **Current Value**: `us-east-1`
- **Description**: AWS region
- **Type**: String
- **Required**: Only if using AWS services

### `AWS_BUCKET`
- **Description**: S3 bucket name
- **Type**: String
- **Required**: Only if using S3 for file storage

### `AWS_USE_PATH_STYLE_ENDPOINT`
- **Current Value**: `false`
- **Description**: Use path-style URLs instead of virtual-hosted-style
- **Type**: Boolean
- **Required**: Only if using AWS services

---

## Queue Configuration

### `QUEUE_CONNECTION`
- **Current Value**: `database`
- **Options**: `sync`, `database`, `redis`, `sqs`, `beanstalkd`
- **Description**: Default queue driver
- **Type**: String
- **Required**: Yes
- **Development**: `database` or `sync` (processes jobs immediately)
- **Production**: Consider `redis` for performance

---

## Logging Configuration

### `LOG_CHANNEL`
- **Current Value**: `stack`
- **Options**: `single`, `stack`, `daily`, `slack`, `stderr`, `papertrail`
- **Description**: Default logging channel
- **Type**: String
- **Required**: Yes

### `LOG_STACK`
- **Current Value**: `single`
- **Description**: Logging stack (which channels are active)
- **Type**: String
- **Required**: No

### `LOG_LEVEL`
- **Current Value**: `debug`
- **Options**: `debug`, `info`, `notice`, `warning`, `error`, `critical`, `alert`, `emergency`
- **Description**: Minimum log level to record
- **Type**: String
- **Required**: Yes
- **Development**: `debug` for detailed logs
- **Production**: `warning` or `error` for performance

### `LOG_DEPRECATIONS_CHANNEL`
- **Current Value**: `null`
- **Description**: Separate channel for deprecation warnings
- **Type**: String
- **Required**: No

---

## Redis Configuration (Optional)

### `REDIS_CLIENT`
- **Current Value**: `phpredis`
- **Options**: `phpredis`, `predis`
- **Description**: Redis client library
- **Type**: String
- **Required**: Only if using Redis

### `REDIS_HOST`
- **Current Value**: `127.0.0.1`
- **Description**: Redis server hostname
- **Type**: String
- **Required**: Only if using Redis

### `REDIS_PASSWORD`
- **Current Value**: `null`
- **Description**: Redis password
- **Type**: String
- **Required**: Only if Redis has authentication

### `REDIS_PORT`
- **Current Value**: `6379`
- **Description**: Redis server port
- **Type**: Integer
- **Required**: Only if using Redis

---

## Broadcast Configuration (Optional)

### `BROADCAST_CONNECTION`
- **Current Value**: `log`
- **Options**: `log`, `pusher`, `ably`, `redis`
- **Description**: Broadcasting driver (for real-time features)
- **Type**: String
- **Required**: No (unless using real-time features)

---

## Maintenance Mode Configuration

### `APP_MAINTENANCE_DRIVER`
- **Current Value**: `file`
- **Options**: `file`, `database`
- **Description**: How to store maintenance mode state
- **Type**: String
- **Required**: No

### `APP_MAINTENANCE_STORE`
- **Current Value**: (commented)
- **Description**: Database table for maintenance mode (if using database driver)
- **Type**: String
- **Required**: No (unless using database driver)

---

## Frontend Configuration

### `VITE_APP_NAME`
- **Current Value**: `"${APP_NAME}"`
- **Description**: Application name passed to frontend
- **Type**: String
- **Required**: Yes (for Vite)

---

## Miscellaneous

### `BCRYPT_ROUNDS`
- **Current Value**: `12`
- **Description**: Password hashing iterations
- **Type**: Integer
- **Range**: 10-15 (higher = slower but more secure)
- **Required**: Yes

### `PHP_CLI_SERVER_WORKERS` (commented)
- **Description**: Number of workers for `php artisan serve`
- **Type**: Integer
- **Required**: No
- **Usage**: Uncomment for multiple concurrent requests during development

---

## Environment-Specific Examples

### Local Development (.env)
```env
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=mysql
DB_PASSWORD=local_password
MAIL_MAILER=log
QUEUE_CONNECTION=sync
CACHE_STORE=array
```

### Staging (.env.staging)
```env
APP_ENV=staging
APP_DEBUG=false
DB_CONNECTION=mysql
DB_PASSWORD=${SECURE_PASSWORD}
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
QUEUE_CONNECTION=redis
CACHE_STORE=redis
```

### Production (.env.production)
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://union-lubricants.com
DB_CONNECTION=mysql
DB_PASSWORD=${SECURE_PASSWORD}
MAIL_MAILER=smtp
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=redis
CACHE_STORE=redis
SESSION_ENCRYPT=true
LOG_LEVEL=warning
```

---

## Security Best Practices

1. **Never commit .env** to version control (use `.gitignore`)
2. **Use environment variables** for secrets in production
3. **Rotate sensitive keys** regularly
4. **Use HTTPS** in production (APP_URL)
5. **Enable CSRF protection** (automatic in Laravel)
6. **Validate all user input** (covered in controllers/requests)
7. **Use prepared statements** (automatic in Eloquent ORM)
8. **Keep secrets in secure vaults** (AWS Secrets Manager, HashiCorp Vault, etc.)

---

## Quick Reference Table

| Key | Value | Type | Required | Notes |
|-----|-------|------|----------|-------|
| APP_NAME | Union Lubricants | String | Yes | Display name |
| APP_ENV | local | String | Yes | local/production/staging |
| APP_DEBUG | true | Boolean | Yes | false in production |
| APP_URL | http://union-lubricants.local | URL | Yes | Base domain |
| DB_CONNECTION | mysql | String | Yes | Database driver |
| DB_HOST | 127.0.0.1 | String | Yes | Database server |
| DB_PORT | 3306 | Integer | Yes | Default 3306 |
| DB_DATABASE | union_lubricants | String | Yes | Create database first |
| DB_USERNAME | root | String | Yes | Don't use root in prod |
| DB_PASSWORD | (empty) | String | Maybe | Leave empty if no password |
| MAIL_MAILER | log | String | Yes | log/smtp/mailgun/sendgrid |
| CACHE_STORE | database | String | Yes | database/redis/array |
| QUEUE_CONNECTION | database | String | Yes | sync/database/redis |

---

## Creating .env Files for Different Environments

```bash
# Copy example to new environment
cp .env.example .env.staging

# Or from current
cp .env .env.production

# Update values for that environment
nano .env.production

# Deploy with environment-specific file
APP_ENV=production php artisan migrate --env=production
```

---

## Troubleshooting

**"No application encryption key has been generated"**
- Run: `php artisan key:generate`

**"Connection refused" (Database)**
- Check MySQL is running
- Verify DB_HOST, DB_PORT, DB_USERNAME, DB_PASSWORD
- Create database: `CREATE DATABASE union_lubricants;`

**"Mail not sending"**
- Check `MAIL_MAILER=log` during development
- For production SMTP, verify credentials
- Check `MAIL_FROM_ADDRESS` is valid

**"Session not persisting"**
- Run: `php artisan migrate` (creates sessions table)
- Check `SESSION_DRIVER=database` in .env
- Verify database connection

---

**Last Updated**: December 1, 2025  
**Version**: Step 1 - Project Setup Complete
