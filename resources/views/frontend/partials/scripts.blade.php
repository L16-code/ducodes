<!--begin: Main script -->
<script src="{{ asset('assets/js/theme.bundle.min.js') }}" defer></script>
<!--/end: Main script -->

<script src="{{ asset('assets/vendor/node_modules/js/gsap.min.js') }}" defer></script>

<script defer>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('form.ajax-contact-form').forEach(function (form) {
        const responseEl = document.getElementById(form.dataset.responseId);

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            if (form.checkValidity && !form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            const originalLabel = submitBtn ? (submitBtn.tagName === 'INPUT' ? submitBtn.value : submitBtn.innerHTML) : null;

            if (submitBtn) {
                submitBtn.disabled = true;
                if (submitBtn.tagName === 'INPUT') {
                    submitBtn.value = 'Sending...';
                } else {
                    submitBtn.innerHTML = 'Sending...';
                }
            }

            fetch(form.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(form)
            })
                .then(async function (response) {
                    const data = await response.json().catch(() => ({}));
                    if (response.ok && data.success) {
                        if (responseEl) {
                            responseEl.innerHTML = '<div class="alert alert-success mb-3">' +
                                (data.message || "Thanks! We'll get back to you shortly.") + '</div>';
                        }
                        form.reset();
                        form.classList.remove('was-validated');
                    } else {
                        const errorMsg = data.message ||
                            (data.errors ? Object.values(data.errors).flat().join(' ') : 'Something went wrong. Please try again.');
                        if (responseEl) {
                            responseEl.innerHTML = '<div class="alert alert-danger mb-3">' + errorMsg + '</div>';
                        }
                    }
                })
                .catch(function () {
                    if (responseEl) {
                        responseEl.innerHTML = '<div class="alert alert-danger mb-3">Something went wrong. Please try again.</div>';
                    }
                })
                .finally(function () {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        if (submitBtn.tagName === 'INPUT') {
                            submitBtn.value = originalLabel;
                        } else {
                            submitBtn.innerHTML = originalLabel;
                        }
                    }
                });
        });
    });
});
</script>
