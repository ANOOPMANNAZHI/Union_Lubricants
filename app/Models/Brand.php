<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo_path',
    ];

    /**
     * Get all catalogs for this brand
     */
    public function catalogs(): HasMany
    {
        return $this->hasMany(ProductCatalog::class, 'brand_id');
    }

    /**
     * Get the logo URL for public access
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo_path) {
            return asset('storage/' . $this->logo_path);
        }
        return null;
    }
}
