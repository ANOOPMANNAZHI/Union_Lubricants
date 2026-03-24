# STEP 2 – Migrations Quick Reference

## 7 New Migration Files Created

All migration files are ready to execute. Location: `database/migrations/`

---

## 📋 TABLE STRUCTURE OVERVIEW

### 1. product_categories
```sql
id (PK) | name (UNIQUE) | slug (UNIQUE) | description | is_active | timestamps
```
- Stores product categories
- Example: "Motor Oils", "Hydraulic Fluids", "Greases"

### 2. products
```sql
id | category_id (FK) | name (UNIQUE) | slug | code (UNIQUE) | 
short_description | description | viscosity_grade | 
specifications | applications | pack_sizes (JSON) | 
image_path | tds_pdf | msds_pdf | is_active | is_featured | timestamps
```
- Main products table
- Stores detailed product information
- JSON field for multiple pack sizes (e.g., 5L, 20L, 200L)

### 3. industries
```sql
id (PK) | name (UNIQUE) | slug (UNIQUE) | description | timestamps
```
- Industry types/sectors
- Example: "Automotive", "Manufacturing", "Aerospace"

### 4. industry_product (Pivot)
```sql
id | industry_id (FK) | product_id (FK) | unique(industry_id, product_id) | timestamps
```
- Links products to industries (many-to-many)
- Example: Hydraulic Oil is used in Automotive AND Manufacturing

### 5. posts
```sql
id (PK) | title (UNIQUE) | slug (UNIQUE) | excerpt | content | 
featured_image | published_at | is_published | timestamps
```
- Blog posts
- Draft support (published_at = NULL)

### 6. enquiries
```sql
id (PK) | name | email | phone | subject | message | 
product_id (FK, nullable) | status (ENUM: new/in_progress/closed) | timestamps
```
- Customer enquiries
- Status tracking (new → in_progress → closed)

### 7. settings
```sql
id (PK) | key (UNIQUE) | value | timestamps
```
- Key-value configuration storage
- Example: site_name, site_email, company_phone

---

## 🔑 KEY FEATURES

### Foreign Keys
- `products.category_id` → `product_categories.id` (CASCADE DELETE)
- `industry_product.industry_id` → `industries.id` (CASCADE DELETE)
- `industry_product.product_id` → `products.id` (CASCADE DELETE)
- `enquiries.product_id` → `products.id` (SET NULL on delete)

### Unique Constraints
- `product_categories.name`, `slug`
- `products.name`, `slug`, `code`
- `industries.name`, `slug`
- `posts.title`, `slug`
- `industry_product.(industry_id, product_id)` - prevents duplicates
- `settings.key`

### Indexes
- All slugs are indexed (fast lookups)
- Active/featured/published flags are indexed (filtering)
- Foreign keys are indexed (joins)
- Timestamps are indexed (sorting)

### JSON Fields
- `products.pack_sizes` - Store as JSON array
  ```json
  ["5L", "20L", "200L", "1000L"]
  ```

### Enums
- `enquiries.status` - Enforced at database level
  - Values: 'new', 'in_progress', 'closed'

---

## ✅ VERIFICATION STEPS

After running migrations:

```bash
# Check tables exist
mysql> SHOW TABLES;

# Check table structure
mysql> DESCRIBE products;

# Check indexes
mysql> SHOW INDEXES FROM products;

# Check foreign keys
mysql> SELECT CONSTRAINT_NAME, TABLE_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME 
       FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
       WHERE TABLE_NAME = 'products';
```

---

## 🚀 EXECUTION

```bash
cd c:\laragon\www\union_lubricants

# Create database first
mysql -u root
CREATE DATABASE union_lubricants;
exit;

# Run all migrations
php artisan migrate

# Check status
php artisan migrate:status
```

---

**Status**: ✅ 7 migrations ready for execution  
**Location**: `database/migrations/`

