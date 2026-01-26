@extends('frontend.pages.hire-developer.base', [
    'title' => 'Laravel',
    'description' => 'Build robust, scalable web applications with our expert Laravel developers who specialize in creating high-performance solutions.'
])

@section('benefits')
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-primary bg-opacity-10 rounded-circle">
                <i class="bi bi-code-square fs-1 text-primary"></i>
            </div>
            <h5 class="mb-3">Clean Code</h5>
            <p class="text-body-secondary">Follow Laravel best practices and coding standards</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-warning bg-opacity-10 rounded-circle">
                <i class="bi bi-rocket-takeoff fs-1 text-warning"></i>
            </div>
            <h5 class="mb-3">Scalable Solutions</h5>
            <p class="text-body-secondary">Build applications that grow with your business</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-success bg-opacity-10 rounded-circle">
                <i class="bi bi-gear fs-1 text-success"></i>
            </div>
            <h5 class="mb-3">Full-Stack Expertise</h5>
            <p class="text-body-secondary">Complete Laravel ecosystem knowledge</p>
        </div>
    </div>
@endsection

@section('skills')
    <div class="col-lg-10 mx-auto">
        <div class="row g-3">
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Laravel Framework</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Eloquent ORM</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">RESTful APIs</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Laravel Livewire</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Queue Management</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Laravel Sanctum</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Database Design</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Testing (PHPUnit)</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Deployment</span></div>
        </div>
    </div>
@endsection

@section('services')
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Custom Web Applications</h5>
                <p class="text-body-secondary mb-0">Build tailored web applications using Laravel's powerful features</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">API Development</h5>
                <p class="text-body-secondary mb-0">Create robust RESTful APIs for mobile and web applications</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">E-commerce Solutions</h5>
                <p class="text-body-secondary mb-0">Develop feature-rich e-commerce platforms with Laravel</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Maintenance & Upgrades</h5>
                <p class="text-body-secondary mb-0">Keep your Laravel applications updated and running smoothly</p>
            </div>
        </div>
    </div>
@endsection
