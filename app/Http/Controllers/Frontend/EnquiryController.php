<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EnquiryReceivedMail;
use App\Mail\EnquiryConfirmationMail;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    /**
     * Show the contact form page.
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }

    /**
     * Store a general enquiry/contact form submission.
     * Validates input and stores as enquiry with status 'new'.
     */
    public function submit(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter a valid email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please enter your message.',
            'message.max' => 'Your message cannot exceed 5000 characters.',
        ]);

        try {
            $enquiry = Enquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'product_id' => null,
                'status' => 'new',
            ]);

            // Send email to admin
            try {
                Log::info('Attempting to send enquiry email to admin (info@ulg.ae)');
                Mail::to('info@ulg.ae')->send(new EnquiryReceivedMail($enquiry));
                Log::info('Successfully sent enquiry email to admin');
            } catch (\Exception $e) {
                // Log the error but don't fail the submission
                Log::error('Failed to send enquiry email: ' . $e->getMessage());
                Log::error('Enquiry email stack trace: ' . $e->getTraceAsString());
            }

            // Send confirmation email to customer
            try {
                Log::info('Attempting to send confirmation email to: ' . $enquiry->email);
                Mail::to($enquiry->email)->send(new EnquiryConfirmationMail($enquiry));
                Log::info('Successfully sent confirmation email to: ' . $enquiry->email);
            } catch (\Exception $e) {
                // Log the error but don't fail the submission
                Log::error('Failed to send confirmation email: ' . $e->getMessage());
                Log::error('Confirmation email stack trace: ' . $e->getTraceAsString());
            }

            return redirect()
                ->route('contact.show')
                ->with('success', 'Thank you! Your enquiry has been received. We will contact you soon.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your enquiry. Please try again.');
        }
    }

    /**
     * Submit a product-specific enquiry.
     * Validates input and stores enquiry linked to product.
     */
    public function productEnquiry(Product $product): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter a valid email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please enter your message.',
            'message.max' => 'Your message cannot exceed 5000 characters.',
        ]);

        try {
            $enquiry = Enquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'product_id' => $product->id,
                'status' => 'new',
            ]);

            // Send email to admin
            try {
                Log::info('Attempting to send product enquiry email to admin (info@ulg.ae)');
                Mail::to('info@ulg.ae')->send(new EnquiryReceivedMail($enquiry));
                Log::info('Successfully sent product enquiry email to admin');
            } catch (\Exception $e) {
                // Log the error but don't fail the submission
                Log::error('Failed to send enquiry email: ' . $e->getMessage());
                Log::error('Enquiry email stack trace: ' . $e->getTraceAsString());
            }

            // Send confirmation email to customer
            try {
                Log::info('Attempting to send product confirmation email to: ' . $enquiry->email);
                Mail::to($enquiry->email)->send(new EnquiryConfirmationMail($enquiry));
                Log::info('Successfully sent product confirmation email to: ' . $enquiry->email);
            } catch (\Exception $e) {
                // Log the error but don't fail the submission
                Log::error('Failed to send confirmation email: ' . $e->getMessage());
                Log::error('Confirmation email stack trace: ' . $e->getTraceAsString());
            }

            return redirect()
                ->route('products.show', $product->slug)
                ->with('success', 'Thank you! Your product enquiry has been received. We will contact you soon.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your enquiry. Please try again.');
        }
    }
}
