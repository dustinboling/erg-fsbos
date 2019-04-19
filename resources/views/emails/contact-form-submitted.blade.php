@component('mail::message')
# New Contact Form Submission

From: {{ $submission->name }}

Phone: {{ $submission->phone }}

Email: {{ $submission->email }}


Message:
{{ $submission->message }}
@endcomponent
