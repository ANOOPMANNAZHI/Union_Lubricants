<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of brands.
     */
    public function index(): View
    {
        $brands = Brand::orderBy('name', 'asc')->paginate(15);

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create(): View
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'description' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Brand name is required.',
            'name.unique' => 'A brand with this name already exists.',
            'logo.image' => 'The logo must be an image file.',
            'logo.mimes' => 'The logo must be a JPEG, PNG, JPG, or GIF file.',
            'logo.max' => 'The logo file size must not exceed 2MB.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle logo upload
            if (request()->hasFile('logo')) {
                $validated['logo_path'] = request()->file('logo')->store('brands', 'public');
            }

            Brand::create($validated);

            return redirect()
                ->route('admin.brands.index')
                ->with('success', 'Brand created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the brand.');
        }
    }

    /**
     * Display the specified brand.
     */
    public function show(Brand $brand): View
    {
        $catalogs = $brand->catalogs()->paginate(15);

        return view('admin.brands.show', [
            'brand' => $brand,
            'catalogs' => $catalogs,
        ]);
    }

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Brand $brand): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'description' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Brand name is required.',
            'name.unique' => 'A brand with this name already exists.',
            'logo.image' => 'The logo must be an image file.',
            'logo.mimes' => 'The logo must be a JPEG, PNG, JPG, or GIF file.',
            'logo.max' => 'The logo file size must not exceed 2MB.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle logo upload
            if (request()->hasFile('logo')) {
                // Delete old logo if exists
                if ($brand->logo_path && Storage::disk('public')->exists($brand->logo_path)) {
                    Storage::disk('public')->delete($brand->logo_path);
                }
                $validated['logo_path'] = request()->file('logo')->store('brands', 'public');
            }

            $brand->update($validated);

            return redirect()
                ->route('admin.brands.index')
                ->with('success', 'Brand updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the brand.');
        }
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        try {
            // Delete logo if exists
            if ($brand->logo_path && Storage::disk('public')->exists($brand->logo_path)) {
                Storage::disk('public')->delete($brand->logo_path);
            }

            $brand->delete();

            return redirect()
                ->route('admin.brands.index')
                ->with('success', 'Brand deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the brand.');
        }
    }
}
