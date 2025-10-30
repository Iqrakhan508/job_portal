@extends('public.layout')

@section('content')
    <section class="page-header py-4 py-md-5">
        <div class="container">
            <h1 class="page-title text-center mb-2 mb-md-3">Privacy Policy</h1>
            <p class="page-subtitle text-center mb-0">How 1000Jobs collects and uses your data</p>
        </div>
    </section>

    <section class="py-4 py-md-5">
        <div class="container">
            <div class="px-3 px-md-4 px-lg-5">
                <h2 class="h4 mb-3">Overview</h2>
                <p class="mb-3">We respect your privacy. This page describes what data we collect on 1000Jobs, how we use it, and the choices you have.</p>

                <h3 class="h5 mt-4">Information we collect</h3>
                <ul class="mb-3">
                    <li>Account details you provide (name, email, phone, location).</li>
                    <li>Profile and job application data you submit.</li>
                    <li>Usage analytics to improve the website experience.</li>
                </ul>

                <h3 class="h5 mt-4">How we use your data</h3>
                <ul class="mb-3">
                    <li>To match you with relevant jobs and companies.</li>
                    <li>To communicate important updates regarding your account or applications.</li>
                    <li>To keep our platform secure and improve our services.</li>
                </ul>

                <h3 class="h5 mt-4">Third-party sharing</h3>
                <p class="mb-3">We do not sell your personal data. Limited sharing may occur with trusted service providers (e.g., email delivery, analytics) under strict confidentiality.</p>

                <h3 class="h5 mt-4">Your choices</h3>
                <ul class="mb-3">
                    <li>Update or delete your profile information from your account.</li>
                    <li>Unsubscribe from marketing emails at any time.</li>
                    <li>Contact us for data-related requests at <a href="mailto:kiqra8715@gmail.com">support</a>.</li>
                </ul>

                <p class="text-muted">Last updated: {{ now()->format('F d, Y') }}</p>
            </div>
        </div>
    </section>
@endsection


