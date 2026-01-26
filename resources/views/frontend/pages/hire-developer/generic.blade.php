@extends('frontend.pages.hire-developer.base', [
    'title' => $title,
    'description' => 'Hire expert ' . $title . ' developers from DuCodes to build innovative solutions for your business needs.'
])

@section('benefits')
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-primary bg-opacity-10 rounded-circle">
                <i class="bi bi-award fs-1 text-primary"></i>
            </div>
            <h5 class="mb-3">Expert Developers</h5>
            <p class="text-body-secondary">Highly skilled professionals with proven track record</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-warning bg-opacity-10 rounded-circle">
                <i class="bi bi-clock-history fs-1 text-warning"></i>
            </div>
            <h5 class="mb-3">On-Time Delivery</h5>
            <p class="text-body-secondary">We respect deadlines and deliver quality work on time</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-success bg-opacity-10 rounded-circle">
                <i class="bi bi-headset fs-1 text-success"></i>
            </div>
            <h5 class="mb-3">24/7 Support</h5>
            <p class="text-body-secondary">Round-the-clock support for your development needs</p>
        </div>
    </div>
@endsection

@section('skills')
    <div class="col-lg-10 mx-auto">
        <div class="row g-3">
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">{{ $title }} Development</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Best Practices</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Code Quality</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Performance Optimization</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Testing & QA</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Deployment</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Security</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Documentation</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Maintenance</span></div>
        </div>
    </div>
@endsection

@section('services')
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Custom Development</h5>
                <p class="text-body-secondary mb-0">Build tailored solutions using {{ $title }} technology</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Consulting Services</h5>
                <p class="text-body-secondary mb-0">Expert guidance for your {{ $title }} projects</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Integration & Migration</h5>
                <p class="text-body-secondary mb-0">Seamlessly integrate or migrate to {{ $title }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Support & Maintenance</h5>
                <p class="text-body-secondary mb-0">Ongoing support to keep your systems running smoothly</p>
            </div>
        </div>
    </div>
@endsection
