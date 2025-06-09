<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:15 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('home.homecss')
</head>

<body>

    <!-- Preloader -->
    {{-- @include('home.loader') --}}
    <!-- End Preloader -->

    <!-- Navbar -->
    @include('home.navbar')
    <!-- End Navbar -->

    <!-- Page Title -->
    <div class="page-title-area page-title-area-two title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Contact Form -->
    <div class="contact-form contact-form-four pb-100">
        <!-- Location -->
        <div class="loaction-area">
            <div class="container">
                <div class="row location-bg">
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <h3>Location</h3>
                            <ul>
                                <li>B 55, Tonk Rd, opp. kamal and company, Shakti Nagar, Tonk Phatak, Jaipur, Rajasthan
                                    302018</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <h3>Phone</h3>
                            <ul>
                                <li>
                                    <a href="tel:+0755543332322">+9414229417</a>
                                </li>
                                {{-- <li>
                                    <a href="tel:+0555962435736">+05 5596 2435 736</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6   col-lg-4">
                        <div class="location-item" style="    word-break: break-all;">
                            <div class="location-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h3>Email</h3>
                            <ul>
                                <li>
                                    {{-- <a href="#"><span class="__cf_email__"
                                            data-cfemail="5c34393030331c30252633723f3331">advocatedineshkumarjain@gmail.com</span></a> --}}
                                    <a
                                        href="mailto:advocatedineshkumarjain@gmail.com">advocatedineshkumarjain@gmail.com</a>
                                </li>
                                {{-- <li>
                                    <a href="#"><span class="__cf_email__"
                                            data-cfemail="325b5c545d725e4b485d1c515d5f">[email&#160;protected]</span></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Location -->

        <div class="container-fluid">
            <form id="contactForm">
                @csrf
                <div class="row contact-wrap">
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control"
                                data-error="Please enter your name" placeholder="Your Full Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control"
                                data-error="Please enter your email" placeholder="Your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number"
                                data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                data-error="Please enter your subject" placeholder="Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                data-error="Write your message" placeholder="Case Description"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check agree-label">
                            <input name="grid_check" class="form-check-input" type="checkbox" id="grid_check"
                                value="1">
                            <label class="form-check-label" for="grid_check">
                                Accept <a href="terms-condition.html">Terms & Conditions</a> And <a
                                    href="privacy-policy.html">Privacy Policy.</a>
                            </label>
                            <div class="help-block with-errors grid_check-error"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="text-center">
                            <button type="submit" class="contact-btn">Submit Case</button>
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact Form -->

    <!-- Start Map Area -->
    <div class="map-area">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.1059890402034!2d75.78889551209332!3d26.86837347657621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5d3a24c22d7%3A0xe0bfe48e46c49d90!2sAdvocate%20Dinesh%20Kumar%20Jain!5e0!3m2!1sen!2sin!4v1743491326860!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End Map Area -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->


    <!-- Essential JS -->
    @include('home.homejs')
</body>

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:15 GMT -->
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous messages
        document.querySelectorAll('.help-block').forEach(el => el.innerHTML = '');
        document.getElementById('msgSubmit').innerHTML = '';

        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phoneNumber = document.getElementById('phone_number').value.trim();
        const msgSubject = document.getElementById('msg_subject').value.trim();
        const message = document.getElementById('message').value.trim();
        const grid_check = document.getElementById('grid_check').checked;

        // Validation flags
        let isValid = true;

        // Validate name
        if (name === '') {
            isValid = false;
            document.querySelector('#name + .help-block').innerHTML =
                'Name is required.';
        }

        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            isValid = false;
            document.querySelector('#email + .help-block').innerHTML =
                'Email is required.';
        } else if (!emailRegex.test(email)) {
            isValid = false;
            document.querySelector('#email + .help-block').innerHTML =
                'Please enter a valid email address.';
        }

        // Validate phone number
        const phoneRegex = /^[0-9]{10}$/;
        if (phoneNumber === '') {
            isValid = false;
            document.querySelector('#phone_number + .help-block').innerHTML =
                'Phone number is required.';
        } else if (!phoneRegex.test(phoneNumber)) {
            isValid = false;
            document.querySelector('#phone_number + .help-block').innerHTML =
                'Phone number must be exactly 10 digits.';
        }

        // Validate subject
        if (msgSubject === '') {
            isValid = false;
            document.querySelector('#msg_subject + .help-block').innerHTML =
                'Subject is required.';
        }

        // Validate message
        if (message === '') {
            isValid = false;
            document.querySelector('#message + .help-block').innerHTML =
                'Message is required.';
        }

        // Validate checkbox
        if (!grid_check) {
            isValid = false;
            document.querySelector('.grid_check-error').innerHTML =
                'You must accept the Terms & Conditions and Privacy Policy.';
        }

        // If validation fails, stop form submission
        if (!isValid) {
            return;
        }

        // If validation passes, submit the form asynchronously
        const formData = new FormData(this);

        fetch('{{ route('contact.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('msgSubmit').innerHTML = '<span class="text-success">' + data
                        .message + '</span>';
                    document.getElementById('contactForm').reset();
                } else {
                    document.getElementById('msgSubmit').innerHTML =
                        '<span class="text-danger">Something went wrong. Please try again.</span>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('msgSubmit').innerHTML =
                    '<span class="text-danger">An error occurred. Please try again later.</span>';
            });
    });
</script>

</html>
