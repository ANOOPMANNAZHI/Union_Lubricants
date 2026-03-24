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
        .button { display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Enquiry Received</h2>
            <p>A new enquiry has been submitted on your website.</p>
        </div>

        <div class="section">
            <h3>Enquiry Details</h3>
            <p><span class="label">Name:</span> {{ $enquiry->name }}</p>
            <p><span class="label">Email:</span> {{ $enquiry->email }}</p>
            <p><span class="label">Phone:</span> {{ $enquiry->phone }}</p>
            <p><span class="label">Subject:</span> {{ $enquiry->subject }}</p>
        </div>

        <div class="divider"></div>

        <div class="section">
            <h3>Message</h3>
            <p>{{ $enquiry->message }}</p>
        </div>

        <div class="divider"></div>

        <div class="section">
            <h3>Additional Information</h3>
            @if($enquiry->product_id && $enquiry->product)
                <p><span class="label">Product:</span> {{ $enquiry->product->name }}</p>
                <p><span class="label">Product Code:</span> {{ $enquiry->product->code }}</p>
            @endif
            <p><span class="label">Status:</span> {{ ucfirst($enquiry->status) }}</p>
            <p><span class="label">Submitted:</span> {{ $enquiry->created_at->format('M d, Y \a\t h:i A') }}</p>
        </div>

        <div class="divider"></div>

        <div class="section">
            <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="button">View Enquiry in Admin</a>
        </div>
    </div>
</body>
</html>
