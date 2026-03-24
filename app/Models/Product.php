<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'code',
        'short_description',
        'description',
        'viscosity_grade',
        'specifications',
        'applications',
        'pack_sizes',
        'image_path',
        'tds_pdf',
        'msds_pdf',
        'is_active',
        'is_featured',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pack_sizes' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the product category that owns this product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Get all industries this product is used in.
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'industry_product', 'product_id', 'industry_id');
    }

    /**
     * Get all enquiries for this product.
     */
    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class, 'product_id');
    }
}
