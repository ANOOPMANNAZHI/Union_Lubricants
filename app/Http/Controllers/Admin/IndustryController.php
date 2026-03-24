<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display a listing of industries.
     */
    public function index(): View
    {
        $industries = Industry::orderBy('name', 'asc')->paginate(15);

        return view('admin.industries.index', [
            'industries' => $industries,
        ]);
    }

    /**
     * Show the form for creating a new industry.
     */
    public function create(): View
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created industry in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:industries,name',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Industry name is required.',
            'name.unique' => 'An industry with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            Industry::create($validated);

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the industry.');
        }
    }

    /**
     * Display the specified industry.
     */
    public function show(Industry $industry): View
    {
        $products = $industry->products()->paginate(15);

        return view('admin.industries.show', [
            'industry' => $industry,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified industry.
     */
    public function edit(Industry $industry): View
    {
        return view('admin.industries.edit', [
            'industry' => $industry,
        ]);
    }

    /**
     * Update the specified industry in storage.
     */
    public function update(Industry $industry): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:industries,name,' . $industry->id,
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Industry name is required.',
            'name.unique' => 'An industry with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            $industry->update($validated);

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the industry.');
        }
    }

    /**
     * Remove the specified industry from storage.
     */
    public function destroy(Industry $industry): RedirectResponse
    {
        try {
            $industry->delete();

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the industry.');
        }
    }
}
