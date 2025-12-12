<h2>New Enquiry Received</h2>

<p><strong>From:</strong> {{ $enquiry->from_location }}</p>
<p><strong>To:</strong> {{ $enquiry->to_location }}</p>
<p><strong>Travel Date:</strong> {{ \Carbon\Carbon::parse($enquiry->travel_date)->format('d/m/Y') }}</p>
<p><strong>Seating Capacity:</strong> {{ $enquiry->seating_capacity }}</p>
<p><strong>Phone Number:</strong> {{ $enquiry->phone_number }}</p>
<p><strong>Distance:</strong> {{ $enquiry->distance_km ?? 'N/A' }} km</p>

<p>A new enquiry has been submitted on Rentlee.</p>
