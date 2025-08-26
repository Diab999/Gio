@extends('layouts.app')

@section('title', $service->getTranslation('name', app()->getLocale()))

@section('content')
<div class="container py-5" style="max-width: 900px;" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <h1 class="mb-4" style="font-size:2.5rem;font-weight:600;color:#f4623a;text-align:center;">{{ $service->getTranslation('name', app()->getLocale()) }}</h1>
    
    <div style="font-size:1.2rem;line-height:1.8;color:#444;text-align:{{ app()->getLocale() == 'ar' ? 'right' : 'left' }};max-width:100%;direction:{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
        {!! $service->getTranslation('description', app()->getLocale()) !!}
    </div>
    
    <div class="text-center mt-5">
        <a href="/{{ app()->getLocale() }}#services" class="btn btn-primary btn-lg">{{ __('messages.back_to_services') }}</a>
    </div>
</div>

<style>
/* RTL Support for Service Page */
[dir="rtl"] .container {
    text-align: right;
}

[dir="rtl"] h1 {
    text-align: center !important;
}

[dir="rtl"] .btn {
    text-align: center;
}

/* Ensure proper RTL text flow */
[dir="rtl"] div[style*="text-align:right"] {
    direction: rtl;
    text-align: right;
}

/* Fix button positioning in RTL */
[dir="rtl"] .text-center {
    text-align: center !important;
}
</style>
@endsection 