<!--Main hero-->
<section class="position-relative overflow-hidden bg-dark jarallax" data-speed=".2">
    <img src="{{ asset('assets/img/backgrounds/bg2.jpg') }}" alt="" class="jarallax-img opacity-50">

    <!--Divider shape-->
    <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg);" preserveAspectRatio="none"
        width="100%" height="64" viewBox="0 0 1460 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
            fill="currentColor" />
    </svg>
    <div class="container pt-6 pb-12 position-relative z-1">
        <div class="row pt-lg-6 pb-12 pb-lg-15">
            <div class="col-xl-8 col-lg-10 mx-auto text-center text-white" data-aos data-aos-delay="100"
                data-aos-mirror="true" data-aos-once="false">
                {{-- <h1 class="splitting-up display-2 fw-bolder mb-lg-4 mb-0" data-splitting>


                    Empowering
                    <span class="text-warning">Business Leaders</span> To Reach Their
                    Full Potential
                </h1> --}}
                <div class="position-relative d-table mb-5 z-1">
                    <h1 class="display-3 me-lg-n15 mb-4 position-relative">Empowering Businesses With <br>

                        <!--Typed section heading-->
                        <span class="d-block" style="color:#2196F3;"
                            data-typed='{"strings": ["AI App Development","GEN AI Chatbot Development","Zoho Development", "Salesforce Development", "HubSpot Development", "Website Development", "Mobile App Development","Power BI Solutions"]}'>
                        </span>
                        <span class="d-block text-white">To Unlock Your Full Potential</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!--begin:Section Newsletter signup-->
<section class="position-relative">
    <div class="container w-lg-75 mx-auto">
        <div
            class="py-5 px-4 py-lg-7 px-xl-9 px-lg-7 px-md-5 overflow-hidden bg-gradient bg-primary rounded-5 shadow-xl position-relative mt-n15 z-1 justify-content-center align-items-end">
            <!--shape-->
            <svg class="position-absolute bottom-0 start-0 text-white" width="100%" height="75%"
                preserveAspectRatio="none" viewBox="0 0 498 168" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity=".05" fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 149.333L20.75 152.444C41.5 155.556 83 161.778 124.5 152.444C166 143.111 207.5 118.222 249 93.3333C290.5 68.4444 332 43.5556 373.5 28C415 12.4444 456.5 6.22222 477.25 3.11111L498 0V168H477.25C456.5 168 415 168 373.5 168C332 168 290.5 168 249 168C207.5 168 166 168 124.5 168C83 168 41.5 168 20.75 168H0V149.333Z"
                    fill="currentColor" />
            </svg>

            <div class="position-relative">
                <div id="quoteFormResponse"></div>
                <form id="quoteForm" class="ajax-contact-form" data-response-id="quoteFormResponse"
                    action="{{ route('contact.store') }}" method="POST" novalidate>
                    @csrf
                    <!-- Honeypot: hidden from real users via CSS, only bots fill this in -->
                    <div class="d-none" aria-hidden="true">
                        <label for="quote_website">Leave this field empty</label>
                        <input type="text" name="website" id="quote_website" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="msg_subject" value="Free quote request (homepage)">
                    <input type="hidden" name="grid_check" value="1">

                    <div class="row g-2 justify-content-center w-100 mb-3">
                        <div class="col-md-12 col-lg-8">
                            <h2 class="mb-0 fs-1 text-white">Get a free quote
                            </h2>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <button type="submit" class="btn btn-warning btn-lg w-100">Send request</button>
                        </div>
                    </div>

                    <div class="row g-2 justify-content-center w-100">
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                            <input type="text" name="name" placeholder="Name" required
                                class="form-control bg-dark bg-opacity-10 text-white form-control-lg shadow-none border-0">
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                            <input type="tel" name="phone_number" placeholder="Phone" required
                                pattern="\+?[0-9\s\-\(\)]{7,20}"
                                title="Enter a valid phone number (7-20 digits, may include +, spaces, dashes, or parentheses)"
                                class="form-control bg-dark bg-opacity-10 text-white form-control-lg shadow-none border-0">
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <input type="email" name="email" placeholder="Email" required
                                class="form-control bg-dark bg-opacity-10 text-white form-control-lg shadow-none border-0">
                        </div>
                    </div>
                    <div class="row g-2 justify-content-center w-100 mt-3">
                        <div class="col-md-12 col-lg-12">
                            <textarea name="message" placeholder="About Your Project" required
                                class="form-control bg-dark bg-opacity-10 text-white form-control-lg shadow-none border-0"></textarea>
                        </div>
                    </div>
                    <p class="small text-white-50 mt-3 mb-0">By submitting, you agree to be contacted by DuCodes about your inquiry.</p>
                </form>
            </div>
        </div>
    </div>
</section>
<!--/end:Section Newsletter signup-->
