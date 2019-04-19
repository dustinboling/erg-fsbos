@component('mail::message')
# New Seller Lead

**Name:** {{ $seller->first_name }} {{ $seller->last_name }}

**Phone:** {{ $seller->phone }}

**Email:** {{ $seller->email }}

**Property Address:** {{ $seller->address_line_1 }}, {{ $seller->address_line_2 ? $seller->address_line_2.', ' : '' }}{{ $seller->city }}, {{ $seller->state }} {{ $seller->postal_code }}


**Message:**

*{{ $seller->message }}*
@endcomponent
