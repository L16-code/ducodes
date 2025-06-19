{{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Form Ajaxchimp JS -->
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- animate__animated animate__JS -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script> --}}

<!-- Contact JS -->
{{-- <script src="{{ asset('assets/js/contact-form-script.js') }}"></script> --}}


<!--begin: Main script -->
<script src="{{ asset('assets/js/theme.bundle.min.js') }}"></script>
<!--/end: Main script -->

<!--begin:Swiper slider-->
<script src="{{ asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/node_modules/js/gsap.min.js') }}"></script>
<script>
    //Main Hero Slider
    var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        history: false,
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
        },
        on: {
            'afterInit': function (swiper) {
                swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                    .forEach($progress => $progress.style.transitionDuration =
                        `${swiper.params.autoplay.delay}ms`)
            }
        }
    });
    var swiperClassic = new Swiper(".swiper-classic", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        effect: "creative",
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },
        thumbs: {
            swiper: sliderThumbs
        },
    });

    //swiper partners
    var swiperPartners5 = new Swiper(".swiper-partners", {
        slidesPerView: 2,
        loop: true,
        spaceBetween: 16,
        autoplay: true,
        breakpoints: {
            768: {
                slidesPerView: 4
            },
            1024: {
                slidesPerView: 5
            }
        },
        pagination: {
            el: ".swiper-partners-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-partners-button-next",
            prevEl: ".swiper-partners-button-prev"
        }
    });

    //swiper Testimonials
    var swiperTestimonails = new Swiper(".swiper-testimonials", {
        autoHeight: true,
        spaceBetween: 16,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        },
        pagination: {
            el: ".swiper-testimonials-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-testimonials-button-next",
            prevEl: ".swiper-testimonials-button-prev"
        }
    });

</script>
<script>
    //cursor
    var element = document.querySelector('.cursor');
    let mouse = {
        x: 0,
        y: 0
    };
    window.addEventListener('mousemove', ev => mouse = getMousePos(ev));
    const lerp = (a, b, n) => (1 - n) * a + n * b;
    const getMousePos = e => {
        return {
            x: e.clientX,
            y: e.clientY
        };
    };

    class Cursor {
        constructor(el) {
            this.DOM = {
                el: el
            };
            this.DOM.el.style.opacity = 0;

            this.bounds = this.DOM.el.getBoundingClientRect();

            this.renderedStyles = {
                tx: {
                    previous: 0,
                    current: 0,
                    amt: 0.2
                },
                ty: {
                    previous: 0,
                    current: 0,
                    amt: 0.2
                },
                scale: {
                    previous: 1,
                    current: 1,
                    amt: 0.2
                },
                opacity: {
                    previous: 1,
                    current: 1,
                    amt: 0.2
                }
            };

            this.onMouseMoveEv = () => {
                this.renderedStyles.tx.previous = this.renderedStyles.tx.current = mouse.x - this.bounds
                    .width / 2;
                this.renderedStyles.ty.previous = this.renderedStyles.ty.previous = mouse.y - this
                    .bounds.height / 2;
                gsap.to(this.DOM.el, {
                    duration: 0.9,
                    ease: 'Power3.easeOut',
                    opacity: 1
                });
                requestAnimationFrame(() => this.render());
                window.removeEventListener('mousemove', this.onMouseMoveEv);
            };
            window.addEventListener('mousemove', this.onMouseMoveEv);
        }
        enter() {
            element.classList.add('cHover');
        }
        leave() {
            this.renderedStyles['scale'].current = 1;
            this.renderedStyles['opacity'].current = 1;
            element.classList.remove('cHover');
        }
        render() {
            this.renderedStyles['tx'].current = mouse.x - this.bounds.width / 2;
            this.renderedStyles['ty'].current = mouse.y - this.bounds.height / 2;

            for (const key in this.renderedStyles) {
                this.renderedStyles[key].previous = lerp(this.renderedStyles[key].previous, this
                    .renderedStyles[key].current, this.renderedStyles[key].amt);
            }
            this.DOM.el.style.transform =
                `translateX(${(this.renderedStyles['tx'].previous)}px) translateY(${this.renderedStyles['ty'].previous}px) scale(${this.renderedStyles['scale'].previous})`;
            this.DOM.el.style.opacity = this.renderedStyles['opacity'].previous;
            requestAnimationFrame(() => this.render());
        }
    }


    const cursor = new Cursor(document.querySelector('.cursor'));

    [...document.querySelectorAll('a,.btn')].forEach(link => {
        link.addEventListener('mouseenter', () => cursor.enter());
        link.addEventListener('mouseleave', () => cursor.leave());
    });

</script>