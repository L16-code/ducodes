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
    @include('home.contactNavbar')
    <!-- End Navbar -->

    <main class="main-content" id="main-content">
        <section class="position-relative">
            <div class="container position-relative pt-12 pt-lg-15">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <h1 class="display-4 mb-3">
                            Get in touch with us
                        </h1>
                        <p class="mb-7 pe-lg-9 lead">Do you have questions about our products or need a quote? Use
                            the
                            contact form below and we will get back to you.</p>
                    </div>
                </div>
                <!--/.row-->
                <img src="assets/img/1200x600/2.jpg" class="img-fluid rounded-block" alt="">
            </div>
            <!--/.content-->
        </section>
        <!--/section-->

        <section class="position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row mb-9 mb-lg-11">
                    <div class="col-lg-4 mb-5 mb-lg-0 text-center">

                        <h5 class="mb-2">Customer support</h5>
                        <p class="mb-3 small">
                            If you are already a customer with us, we will be happy to help you in our
                            Customer Support.
                        </p>
                        <a href="mailto:youremail.com" class="btn btn-sm btn-light shadow-sm">
                            <i class="bi bi-headset align-middle fw-normal me-1"></i> Customer support
                        </a>
                    </div>

                    <div class="col-lg-4 mb-5 mb-lg-0 text-center">

                        <h5 class="mb-2"> Skype</h5>
                        <p class="mb-3 small">
                            Want to Discuss in details about your next project?, Join us on skype
                        </p>
                        <a href="#" class="btn text-lowercase btn-sm btn-light shadow-sm">
                            <i class="bi bi-skype align-middle fw-normal me-1"></i> rakesh.sharma856
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">

                        <h5 class="mb-2">Phone</h5>
                        <p class="mb-3 small">
                            Give us a call Monday to Friday<br> 10:AM to 5:PM
                        </p>
                        <a href="#!" class="btn btn-sm btn-light shadow-sm">
                            <i class="bi bi-phone align-middle fw-normal me-1"></i> +01 1234-567-890
                        </a>
                    </div>
                </div>
                <div class="overflow-hidden mb-9 mb-lg-11 shadow border rounded-3">
                    <div id='map' class="rounded-3" style='width: 100%; height: 350px;'>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28471.675413009787!2d75.75061068476563!3d26.873030133265424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5debf22fa8f%3A0x79ea81d0af2764a3!2sCityPark%20Jaipur!5e0!3m2!1sen!2sin!4v1750410537697!5m2!1sen!2sin" height="350px" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="position-relative">
                            <h1>
                                Contact Form
                            </h1>
                            <p class="mb-3 lead w-lg-75">
                                Use the contact form if you have questions about our products. Our sales team will
                                be happy to help you:
                            </p>
                            <div class="width-7x pt-1 bg-primary mb-7"></div>
                            <form id="contactForm" action="https://uigator.com/assan/5.4/assan-main/assets/contact/send_mail.php" method="post" role="form"
                            class="needs-validation mb-5 mb-lg-7" novalidate>
                            <div class="row">
                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="name">Your name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="John Doe" required>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="email">Your email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="john@gmail.com" aria-label="jackwayley@gmail.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address
                                    </div>
                                </div>

                                <div class="w-100"></div>

                                <!-- Input -->

                                <!-- Services -->
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Web Design" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <!-- Message -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" placeholder="Hi there...."
                                    required=""></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>

                            <div class="d-md-flex justify-content-between align-items-center">
                                <p class="small mb-4 text-body-secondary mb-md-0">We'll get back to you in 1-2
                                    business days.</p>
                                <input type="submit" name="submit" value="Submit message" id="sendBtn"
                                    class="btn btn-lg btn-primary">
                            </div>
                        </form>
                        <!-- End Contacts Form -->
                            <!-- End Contacts Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container pb-9">
                <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-primary text-white position-relative overflow-hidden"
                    data-aos="fade-up">
                    <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                        preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                            fill="currentColor" />
                    </svg>

                    <div class="row align-items-end position-relative">
                        <div class="col-lg-7 text-center text-lg-start">
                            <p class="text-white mb-2">Let's start building</p>
                            <h2 class="mb-5 mb-lg-0">Stunning websites ease</h2>
                        </div>
                        <div class="col-lg-5 text-lg-end text-center">
                            <a href="#!" class="btn btn-outline-white btn-lg rounded-3 me-2 mb-2 mb-lg-0">Contact sales</a>
                            <a href="#!" class="btn btn-white btn-lg rounded-3">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->


    <!-- Essential JS -->
    @include('home.homejs')
</body>

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:15 GMT -->
{{-- <script>
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
</script> --}}

</html>
