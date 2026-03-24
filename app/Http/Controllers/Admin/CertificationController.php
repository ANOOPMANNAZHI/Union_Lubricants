<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of certifications.
     */
    public function index(): View
    {
        $certifications = Certification::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.certifications.index', ['certifications' => $certifications]);
    }

    /**
     * Show the form for creating a new certification.
     */
    public function create(): View
    {
        return view('admin.certifications.create');
    }

    /**
     * Store a newly created certification.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if (request()->hasFile('pdf')) {
                $pdf = request()->file('pdf');
                $pdfPath = $pdf->store('certifications', 'public');
                $validated['pdf_path'] = $pdfPath;
            }

            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imagePath = $image->store('certifications', 'public');
                $validated['image_path'] = $imagePath;
            }

            Certification::create($validated);

            return redirect()
                ->route('admin.certifications.index')
                ->with('success', 'Certification created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the certification.');
        }
    }

    /**
     * Show the form for editing a certification.
     */
    public function edit(Certification $certification): View
    {
        return view('admin.certifications.edit', ['certification' => $certification]);
    }

    /**
     * Update the specified certification.
     */
    public function update(Certification $certification): RedirectResponse
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if (request()->hasFile('pdf')) {
                if ($certification->pdf_path) {
                    Storage::disk('public')->delete($certification->pdf_path);
                }
                $pdf = request()->file('pdf');
                $pdfPath = $pdf->store('certifications', 'public');
                $validated['pdf_path'] = $pdfPath;
            }

            if (request()->hasFile('image')) {
                if ($certification->image_path) {
                    Storage::disk('public')->delete($certification->image_path);
                }
                $image = request()->file('image');
                $imagePath = $image->store('certifications', 'public');
                $validated['image_path'] = $imagePath;
            }

            $certification->update($validated);

            return redirect()
                ->route('admin.certifications.index')
                ->with('success', 'Certification updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the certification.');
        }
    }

    /**
     * Delete the specified certification.
     */
    public function destroy(Certification $certification): RedirectResponse
    {
        try {
            if ($certification->pdf_path) {
                Storage::disk('public')->delete($certification->pdf_path);
            }
            if ($certification->image_path) {
                Storage::disk('public')->delete($certification->image_path);
            }

            $certification->delete();

            return redirect()
                ->route('admin.certifications.index')
                ->with('success', 'Certification deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the certification.');
        }
    }
}
