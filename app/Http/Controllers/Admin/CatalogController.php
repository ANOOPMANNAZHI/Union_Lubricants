<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCatalog;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     * Display a listing of the catalogs.
     */
    public function index(): View
    {
        $catalogs = ProductCatalog::orderByDesc('version')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.catalogs.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new catalog.
     */
    public function create(): View
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.catalogs.create', compact('brands'));
    }

    /**
     * Store a newly created catalog in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'file' => 'required|file|mimes:pdf,xlsx,xls,csv|max:10240',
            'brand_id' => 'nullable|exists:brands,id',
            'description' => 'nullable|string|max:1000',
        ], [
            'file.required' => 'Please select a catalog file to upload.',
            'file.mimes' => 'File must be PDF, Excel (.xlsx, .xls), or CSV format.',
            'file.max' => 'File size must not exceed 10MB.',
            'brand_id.exists' => 'The selected brand is invalid.',
        ]);

        try {
            // Get the uploaded file
            $file = request()->file('file');
            $fileName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();

            // Get the latest version number
            $latestVersion = ProductCatalog::max('version') ?? 0;
            $newVersion = $latestVersion + 1;

            // Generate file path with version
            $filePath = $file->store('catalogs', 'public');

            // Create catalog record
            ProductCatalog::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'version' => $newVersion,
                'uploaded_by' => Auth::id(),
                'brand_id' => $validated['brand_id'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);

            return redirect()->route('admin.catalogs.index')
                ->with('success', 'Product catalog uploaded successfully. Version: ' . $newVersion);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to upload catalog: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified catalog.
     */
    public function show(ProductCatalog $catalog): View
    {
        return view('admin.catalogs.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified catalog.
     */
    public function edit(ProductCatalog $catalog): View
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.catalogs.edit', compact('catalog', 'brands'));
    }

    /**
     * Update the specified catalog in storage.
     */
    public function update(ProductCatalog $catalog): RedirectResponse
    {
        $validated = request()->validate([
            'brand_id' => 'nullable|exists:brands,id',
            'description' => 'nullable|string|max:1000',
        ], [
            'brand_id.exists' => 'The selected brand is invalid.',
        ]);

        try {
            $catalog->update([
                'brand_id' => $validated['brand_id'] ?? $catalog->brand_id,
                'description' => $validated['description'] ?? $catalog->description,
            ]);

            return redirect()->route('admin.catalogs.show', $catalog->id)
                ->with('success', 'Catalog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update catalog: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified catalog from storage.
     */
    public function destroy(ProductCatalog $catalog): RedirectResponse
    {
        try {
            // Delete file from storage
            if ($catalog->file_path && Storage::disk('public')->exists($catalog->file_path)) {
                Storage::disk('public')->delete($catalog->file_path);
            }

            // Delete database record
            $catalog->delete();

            return redirect()->route('admin.catalogs.index')
                ->with('success', 'Catalog deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete catalog: ' . $e->getMessage());
        }
    }

    /**
     * Download the catalog file.
     */
    public function download(ProductCatalog $catalog)
    {
        $filePath = storage_path('app/public/' . $catalog->file_path);

        if (!file_exists($filePath)) {
            return redirect()->back()
                ->with('error', 'File not found.');
        }

        return response()->download($filePath, $catalog->file_name);
    }

    /**
     * Download the catalog file (public access - for frontend).
     */
    public function downloadPublic(ProductCatalog $catalog)
    {
        $filePath = storage_path('app/public/' . $catalog->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'Catalog file not found.');
        }

        return response()->download($filePath, $catalog->file_name);
    }
}

