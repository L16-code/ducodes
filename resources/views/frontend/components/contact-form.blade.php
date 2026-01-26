<div class="contact-form pb-100">
    <!-- Location -->
    <div class="loaction-area">
        <div class="container">
            <div class="row location-bg">
                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-pin"></i>
                            <img src="assets/img/home-one/12.png" alt="Shape">
                        </div>
                        <h3>Location</h3>
                        <ul>
                            <li>2108-267 Road Quadra,Toronto, Victiria Canada</li>
                        </ul>
                        <a class="location-link" href="https://www.google.com/maps" target="_blank">View on gogle
                            map</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-email"></i>
                            <img src="assets/img/home-one/12.png" alt="Shape">
                        </div>
                        <h3>Email</h3>
                        <ul>
                            <li>
                                <a
                                    {{-- href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#751d1019191a35190c0f1a5b161a18"><span --}}
                                        class="__cf_email__"
                                        data-cfemail="d8b0bdb4b4b798b4a1a2b7f6bbb7b5">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <a
                                    {{-- href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#bdd4d3dbd2fdd1c4c7d293ded2d0"><span --}}
                                        class="__cf_email__"
                                        data-cfemail="40292e262f002c393a2f6e232f2d">[email&#160;protected]</span></a>
                            </li>
                        </ul>
                        <a class="location-link" href="https://www.google.com/maps" target="_blank">View on gogle
                            map</a>
                    </div>
                </div>
                <div class="col-sm-6   col-lg-4">
                    <div class="location-item">
                        <div class="location-icon">
                            <i class="flaticon-call"></i>
                            <img src="assets/img/home-one/12.png" alt="Shape">
                        </div>
                        <h3>Phone</h3>
                        <ul>
                            <li>
                                <a href="tel:+0755543332322">+07 5554 3332 322</a>
                            </li>
                            <li>
                                <a href="tel:+0555962435736">+05 5596 2435 736</a>
                            </li>
                        </ul>
                        <a class="location-link" href="https://www.google.com/maps" target="_blank">View on gogle
                            map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Location -->

    <div class="container-fluid">
        <form id="contactForm">
            <div class="row contact-wrap">
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" required
                            data-error="Please enter your name" placeholder="Your Full Name">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" required
                            data-error="Please enter your email" placeholder="Your Email">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="text" name="phone_number" id="phone_number" required
                            data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required
                            data-error="Please enter your subject" placeholder="Subject">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                            data-error="Write your message" placeholder="Case Description"></textarea>
                        <div class="help-block with-errors"></div>
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
