<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries with optional status filter.
     */
    public function index(): View
    {
        $status = request()->query('status', null);
        $query = Enquiry::query();

        if ($status && in_array($status, ['new', 'in_progress', 'closed'])) {
            $query->where('status', $status);
        }

        $enquiries = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.enquiries.index', [
            'enquiries' => $enquiries,
            'currentStatus' => $status,
        ]);
    }

    /**
     * Display the specified enquiry.
     */
    public function show(Enquiry $enquiry): View
    {
        return view('admin.enquiries.show', [
            'enquiry' => $enquiry,
        ]);
    }

    /**
     * Update the status of an enquiry.
     */
    public function updateStatus(Enquiry $enquiry): RedirectResponse
    {
        $validated = request()->validate([
            'status' => 'required|in:new,in_progress,closed',
        ], [
            'status.required' => 'Please select a status.',
            'status.in' => 'Invalid status value.',
        ]);

        try {
            $enquiry->update(['status' => $validated['status']]);

            return redirect()
                ->route('admin.enquiries.show', $enquiry->id)
                ->with('success', 'Enquiry status updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while updating the enquiry status.');
        }
    }

    /**
     * Remove the specified enquiry from storage.
     */
    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        try {
            $enquiry->delete();

            return redirect()
                ->route('admin.enquiries.index')
                ->with('success', 'Enquiry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the enquiry.');
        }
    }
}
