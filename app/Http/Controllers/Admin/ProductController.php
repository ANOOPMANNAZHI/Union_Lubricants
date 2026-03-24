<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Industry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $industries = Industry::orderBy('name', 'asc')->get();

        return view('admin.products.create', [
            'categories' => $categories,
            'industries' => $industries,
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255|unique:products,name',
            'code' => 'required|string|max:100|unique:products,code',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'viscosity_grade' => 'nullable|string|max:50',
            'specifications' => 'nullable|string',
            'applications' => 'nullable|string',
            'pack_sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:5120',
            'tds_pdf' => 'nullable|mimes:pdf|max:10240',
            'msds_pdf' => 'nullable|mimes:pdf|max:10240',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'industries' => 'nullable|array',
            'industries.*' => 'exists:industries,id',
        ], [
            'category_id.required' => 'Please select a category.',
            'name.required' => 'Product name is required.',
            'name.unique' => 'A product with this name already exists.',
            'code.required' => 'Product code is required.',
            'code.unique' => 'A product with this code already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle image upload
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imagePath = $image->store('products', 'public');
                $validated['image_path'] = $imagePath;
            }

            // Handle TDS PDF upload
            if (request()->hasFile('tds_pdf')) {
                $tds = request()->file('tds_pdf');
                $tdsPath = $tds->store('docs', 'public');
                $validated['tds_pdf'] = $tdsPath;
            }

            // Handle MSDS PDF upload
            if (request()->hasFile('msds_pdf')) {
                $msds = request()->file('msds_pdf');
                $msdsPath = $msds->store('docs', 'public');
                $validated['msds_pdf'] = $msdsPath;
            }

            // Convert pack_sizes string to JSON array if provided
            if (!empty($validated['pack_sizes'])) {
                $packs = array_map('trim', explode(',', $validated['pack_sizes']));
                $validated['pack_sizes'] = json_encode($packs);
            }

            // Create product
            $product = Product::create($validated);

            // Attach industries
            if (!empty($validated['industries'])) {
                $product->industries()->sync($validated['industries']);
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the product.');
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product): View
    {
        $product->load(['category', 'industries']);

        return view('admin.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $product->load(['category', 'industries']);
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $industries = Industry::orderBy('name', 'asc')->get();
        $selectedIndustries = $product->industries()->pluck('industries.id')->toArray();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'industries' => $industries,
            'selectedIndustries' => $selectedIndustries,
        ]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Product $product): RedirectResponse
    {
        $validated = request()->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'code' => 'required|string|max:100|unique:products,code,' . $product->id,
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'viscosity_grade' => 'nullable|string|max:50',
            'specifications' => 'nullable|string',
            'applications' => 'nullable|string',
            'pack_sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:5120',
            'tds_pdf' => 'nullable|mimes:pdf|max:10240',
            'msds_pdf' => 'nullable|mimes:pdf|max:10240',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'industries' => 'nullable|array',
            'industries.*' => 'exists:industries,id',
        ], [
            'category_id.required' => 'Please select a category.',
            'name.required' => 'Product name is required.',
            'name.unique' => 'A product with this name already exists.',
            'code.required' => 'Product code is required.',
            'code.unique' => 'A product with this code already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle image upload
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imagePath = $image->store('products', 'public');
                $validated['image_path'] = $imagePath;
            }

            // Handle TDS PDF upload
            if (request()->hasFile('tds_pdf')) {
                $tds = request()->file('tds_pdf');
                $tdsPath = $tds->store('docs', 'public');
                $validated['tds_pdf'] = $tdsPath;
            }

            // Handle MSDS PDF upload
            if (request()->hasFile('msds_pdf')) {
                $msds = request()->file('msds_pdf');
                $msdsPath = $msds->store('docs', 'public');
                $validated['msds_pdf'] = $msdsPath;
            }

            // Convert pack_sizes string to JSON array if provided
            if (!empty($validated['pack_sizes'])) {
                $packs = array_map('trim', explode(',', $validated['pack_sizes']));
                $validated['pack_sizes'] = json_encode($packs);
            }

            // Update product
            $product->update($validated);

            // Sync industries
            if (!empty($validated['industries'])) {
                $product->industries()->sync($validated['industries']);
            } else {
                $product->industries()->detach();
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the product.');
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        try {
            $product->delete();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the product.');
        }
    }
}
