<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = request()->validate([
            'author_name' => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'author_position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
        ]);

        try {
            if (request()->hasFile('author_image')) {
                $image = request()->file('author_image');
                $imagePath = $image->store('testimonials', 'public');
                $validated['author_image'] = $imagePath;
            }

            Testimonial::create($validated);

            return redirect()
                ->route('admin.testimonials.index')
                ->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the testimonial.');
        }
    }

    /**
     * Show the form for editing a testimonial.
     */
    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified testimonial.
     */
    public function update(Testimonial $testimonial): RedirectResponse
    {
        $validated = request()->validate([
            'author_name' => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'author_position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
        ]);

        try {
            if (request()->hasFile('author_image')) {
                if ($testimonial->author_image) {
                    Storage::disk('public')->delete($testimonial->author_image);
                }
                $image = request()->file('author_image');
                $imagePath = $image->store('testimonials', 'public');
                $validated['author_image'] = $imagePath;
            }

            $testimonial->update($validated);

            return redirect()
                ->route('admin.testimonials.index')
                ->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the testimonial.');
        }
    }

    /**
     * Delete the specified testimonial.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        try {
            if ($testimonial->author_image) {
                Storage::disk('public')->delete($testimonial->author_image);
            }

            $testimonial->delete();

            return redirect()
                ->route('admin.testimonials.index')
                ->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the testimonial.');
        }
    }
}
