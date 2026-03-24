<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .section { margin-bottom: 20px; }
        .label { font-weight: bold; color: #555; }
        .divider { border-top: 1px solid #ddd; margin: 20px 0; }
        .footer { color: #888; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Thank You for Your Enquiry</h2>
            <p>Dear {{ $enquiry->name }},</p>
        </div>

        <div class="section">
            <p>We have received your enquiry and appreciate your interest in Union Lubricants.</p>
        </div>

        <div class="section">
            <h3>Your Enquiry Details</h3>
            <p><span class="label">Subject:</span> {{ $enquiry->subject }}</p>
        </div>

        <div class="section">
            <h3>Message</h3>
            <p>{{ $enquiry->message }}</p>
        </div>

        @if($enquiry->product_id && $enquiry->product)
        <div class="section">
            <p><span class="label">Product:</span> {{ $enquiry->product->name }}<br>
            <span class="label">Product Code:</span> {{ $enquiry->product->code }}</p>
        </div>
        @endif

        <div class="divider"></div>

        <div class="section">
            <h3>What Happens Next</h3>
            <p>Our team has received your enquiry and will review it shortly. We will contact you at the following details you provided:</p>
            <p>
                <span class="label">Email:</span> {{ $enquiry->email }}<br>
                <span class="label">Phone:</span> {{ $enquiry->phone }}
            </p>
            <p>We typically respond to all enquiries within <strong>24-48 business hours</strong>.</p>
        </div>

        <div class="divider"></div>

        <div class="section">
            <h3>Need Immediate Assistance?</h3>
            <p>If you need urgent support, please contact us directly:</p>
            <p>
                <span class="label">Phone:</span> +971-67447700<br>
                <span class="label">Email:</span> info@ulg.ae
            </p>
        </div>

        <div class="divider"></div>

        <div class="footer">
            <p>Best regards,<br>{{ config('app.name') }} Team</p>
        </div>
    </div>
</body>
</html>
