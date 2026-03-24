<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatalog extends Model
{
    use HasFactory;

    protected $table = 'product_catalogs';

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'version',
        'uploaded_by',
        'brand_id',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user who uploaded the catalog
     */
    public function uploadedByUser()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the brand associated with this catalog
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the file extension
     */
    public function getFileExtensionAttribute()
    {
        return pathinfo($this->file_path, PATHINFO_EXTENSION);
    }

    /**
     * Get formatted file size
     */
    public function getFileSizeAttribute()
    {
        $path = storage_path('app/public/' . $this->file_path);
        if (file_exists($path)) {
            return formatBytes(filesize($path));
        }
        return 'Unknown';
    }

    /**
     * Get full public URL for download
     */
    public function getPublicUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
