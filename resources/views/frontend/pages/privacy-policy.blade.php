@extends('frontend.layouts.app')

@section('title', 'Privacy Policy | DuCodes')
@section('meta_description', 'How DuCodes collects, uses, and protects information submitted through this website, including our contact form.')

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'Privacy Policy',
        'How DuCodes collects, uses, and protects information submitted through this website.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Privacy Policy' => url()->current(),
    ]),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
<section class="position-relative py-9 py-lg-11">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="display-5 mb-2">Privacy Policy</h1>
                <p class="text-body-secondary mb-6">Last updated: July 15, 2026</p>

                <h2 class="h4 mt-6 mb-3">Who we are</h2>
                <p>DuCodes ("we", "us", "our") is a software development company based in Jaipur, Rajasthan, India. This policy explains what information this website (ducodes.com) collects and how we use it.</p>

                <h2 class="h4 mt-6 mb-3">Information we collect</h2>
                <p>We collect information you voluntarily submit through our contact form, specifically: your name, email address, phone number, subject, and message. We use this information solely to respond to your inquiry about our services.</p>
                <p>We do not require an account or collect payment information through this website.</p>

                <h2 class="h4 mt-6 mb-3">Cookies</h2>
                <p>This site uses strictly necessary cookies set by our web framework (Laravel) to maintain session state and protect forms against cross-site request forgery. These cookies do not track you across other websites. If we add analytics or advertising cookies in the future, this policy will be updated first and consent will be requested where required by law.</p>

                <h2 class="h4 mt-6 mb-3">How we use your information</h2>
                <ul>
                    <li>To respond to inquiries submitted via the contact form.</li>
                    <li>To provide quotes and communicate about potential or ongoing projects.</li>
                    <li>To maintain records of client communication.</li>
                </ul>
                <p>We do not sell or rent your personal information to third parties.</p>

                <h2 class="h4 mt-6 mb-3">Data retention</h2>
                <p>We retain contact form submissions for as long as necessary to respond to your inquiry and maintain a reasonable business record, unless you request earlier deletion.</p>

                <h2 class="h4 mt-6 mb-3">Your rights</h2>
                <p>You may ask us to access, correct, or delete the personal information we hold about you by emailing <a href="mailto:support@ducodes.com">support@ducodes.com</a>. We will respond within a reasonable timeframe.</p>

                <h2 class="h4 mt-6 mb-3">Data security</h2>
                <p>We take reasonable technical measures to protect information submitted through this website. However, no method of transmission or storage is 100% secure, and we cannot guarantee absolute security.</p>

                <h2 class="h4 mt-6 mb-3">Changes to this policy</h2>
                <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last updated" date.</p>

                <h2 class="h4 mt-6 mb-3">Contact us</h2>
                <p>Questions about this Privacy Policy can be sent to <a href="mailto:support@ducodes.com">support@ducodes.com</a> or by phone at <a href="tel:+919549312341">+91 9549312341</a>.</p>
            </div>
        </div>
    </div>
</section>
@endsection
