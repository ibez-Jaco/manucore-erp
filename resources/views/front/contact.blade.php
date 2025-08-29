@extends('layouts.front')
@section('title', 'Contact - ManuCore ERP')
@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="erp-header text-3xl mb-8">Contact Us</h1>
    <div class="erp-card max-w-2xl mx-auto">
        <form class="space-y-4">
            <div>
                <label class="erp-label">Name</label>
                <input type="text" class="erp-input" placeholder="Your name">
            </div>
            <div>
                <label class="erp-label">Email</label>
                <input type="email" class="erp-input" placeholder="your@email.com">
            </div>
            <div>
                <label class="erp-label">Message</label>
                <textarea class="erp-input" rows="4" placeholder="Your message"></textarea>
            </div>
            <button type="submit" class="erp-btn-primary">Send Message</button>
        </form>
    </div>
</div>
@endsection
