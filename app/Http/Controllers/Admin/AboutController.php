<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display the About Us page management.
     */
    public function index(): View
    {
        $about = About::first();
        return view('admin.about.index', ['about' => $about]);
    }

    /**
     * Show the form for editing the about page.
     */
    public function edit(About $about): View
    {
        return view('admin.about.edit', ['about' => $about]);
    }

    /**
     * Update the about page information.
     */
    public function update(About $about): RedirectResponse
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle image upload
            if (request()->hasFile('image')) {
                if ($about->image_path) {
                    Storage::disk('public')->delete($about->image_path);
                }
                $image = request()->file('image');
                $imagePath = $image->store('about', 'public');
                $validated['image_path'] = $imagePath;
            }

            $about->update($validated);

            return redirect()
                ->route('admin.about.index')
                ->with('success', 'About Us page updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the page.');
        }
    }
}
