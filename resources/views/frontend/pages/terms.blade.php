@extends('frontend.layouts.app')

@section('title', 'Terms and Conditions | DuCodes')
@section('meta_description', 'The terms and conditions governing the use of the DuCodes website.')

@push('schema')
    <script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'Terms and Conditions',
        'The terms and conditions governing the use of the DuCodes website.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Terms and Conditions' => url()->current(),
    ]),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h1 class="display-5 mb-2">Terms and Conditions</h1>
                    <p class="text-body-secondary mb-6">Last updated: July 15, 2026</p>

                    <h2 class="h4 mt-6 mb-3">Acceptance of terms</h2>
                    <p>By accessing this website (ducodes.com), you agree to be bound by these Terms and Conditions. If you
                        do not agree, please do not use this website.</p>

                    <h2 class="h4 mt-6 mb-3">About DuCodes</h2>
                    <p>DuCodes is a custom software development company based in Jaipur, Rajasthan, India, providing web,
                        mobile, and AI application development services. Information on this website is provided for general
                        informational purposes about our services.</p>

                    <h2 class="h4 mt-6 mb-3">Use of this website</h2>
                    <p>You agree to use this website only for lawful purposes and in a way that does not infringe the rights
                        of, or restrict or inhibit the use and enjoyment of, this site by any third party. You may not use
                        this site to submit false, misleading, or spam content through our contact form.</p>

                    <h2 class="h4 mt-6 mb-3">Intellectual property</h2>
                    <p>Unless otherwise stated, the text, graphics, logos, and content on this website are the property of
                        DuCodes or its content suppliers and are protected by applicable intellectual property laws. You may
                        not reproduce or redistribute this content without our written permission.</p>

                    <h2 class="h4 mt-6 mb-3">Services and quotes</h2>
                    <p>Any project quote, timeline, or scope discussed via this website or our contact form is preliminary
                        and non-binding until formalized in a separate written agreement or statement of work between
                        DuCodes and the client.</p>

                    <h2 class="h4 mt-6 mb-3">No warranty</h2>
                    <p>This website and its content are provided "as is" without warranties of any kind, express or implied,
                        including but not limited to accuracy, completeness, or fitness for a particular purpose.</p>

                    <h2 class="h4 mt-6 mb-3">Limitation of liability</h2>
                    <p>To the fullest extent permitted by law, DuCodes shall not be liable for any indirect, incidental, or
                        consequential damages arising from your use of this website.</p>

                    <h2 class="h4 mt-6 mb-3">Third-party links</h2>
                    <p>This website may contain links to third-party websites. We are not responsible for the content or
                        privacy practices of those external sites.</p>

                    <h2 class="h4 mt-6 mb-3">Governing law</h2>
                    <p>These Terms and Conditions are governed by the laws of India, and any disputes shall be subject to
                        the jurisdiction of the courts of Jaipur, Rajasthan.</p>

                    <h2 class="h4 mt-6 mb-3">Changes to these terms</h2>
                    <p>We may revise these Terms and Conditions at any time. Continued use of this website after changes are
                        posted constitutes acceptance of the revised terms.</p>

                    <h2 class="h4 mt-6 mb-3">Contact us</h2>
                    <p>Questions about these Terms can be sent to <a
                            href="mailto:support@ducodes.com">support@ducodes.com</a> or by phone at <a
                            href="tel:+919119101224">+91 9119101224</a>.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
