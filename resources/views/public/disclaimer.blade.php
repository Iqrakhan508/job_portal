@extends('public.layout')

@section('content')
    <section class="page-header py-4 py-md-5">
        <div class="container">
            <h1 class="page-title text-center mb-2 mb-md-3">Disclaimer</h1>
            <p class="page-subtitle text-center mb-0">Important information about content and accuracy</p>
        </div>
    </section>

    <section class="py-4 py-md-5">
        <div class="container">
            <div class="px-3 px-md-4 px-lg-5">
                <h2 class="h4 mb-3">Content accuracy</h2>
                <p class="mb-3">While we strive to keep all listings and company information accurate and up to date, 1000Jobs does not guarantee the completeness or accuracy of any job post. Employers are responsible for the content they publish.</p>

                <h2 class="h4 mt-4 mb-3">No guarantees</h2>
                <p class="mb-3">Using this website does not guarantee employment. Job applications and hiring decisions are solely made by the respective employers.</p>

                <h2 class="h4 mt-4 mb-3">External links</h2>
                <p class="mb-3">This website may contain links to third-party sites. We are not responsible for the content or privacy practices of those websites.</p>

                <h2 class="h4 mt-4 mb-3">Liability</h2>
                <p class="mb-3">Under no circumstances shall 1000Jobs be liable for any loss or damage arising from the use of information on this website.</p>

                <p class="text-muted">If you spot an issue, please contact us via the <a href="{{ route('contact') }}">Contact</a> page.</p>
            </div>
        </div>
    </section>
@endsection


