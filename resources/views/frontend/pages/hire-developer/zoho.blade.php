@extends('frontend.pages.hire-developer.base', [
    'title' => 'Zoho',
    'description' => 'Scale your business with expert Zoho developers who can customize and integrate Zoho applications to streamline your operations.'
])

@section('benefits')
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-primary bg-opacity-10 rounded-circle">
                <i class="bi bi-award fs-1 text-primary"></i>
            </div>
            <h5 class="mb-3">Certified Experts</h5>
            <p class="text-body-secondary">Our developers are Zoho certified with years of hands-on experience</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-warning bg-opacity-10 rounded-circle">
                <i class="bi bi-lightning-charge fs-1 text-warning"></i>
            </div>
            <h5 class="mb-3">Quick Deployment</h5>
            <p class="text-body-secondary">Fast onboarding and project kickoff within 48 hours</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-success bg-opacity-10 rounded-circle">
                <i class="bi bi-shield-check fs-1 text-success"></i>
            </div>
            <h5 class="mb-3">100% Satisfaction</h5>
            <p class="text-body-secondary">Guaranteed quality work with ongoing support</p>
        </div>
    </div>
@endsection

@section('skills')
    <div class="col-lg-10 mx-auto">
        <div class="row g-3">
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Zoho CRM</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Zoho Creator</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Zoho Books</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Zoho Desk</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Zoho Analytics</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Deluge Scripting</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">API Integration</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Workflow Automation</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Custom Modules</span></div>
        </div>
    </div>
@endsection

@section('services')
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Zoho CRM Customization</h5>
                <p class="text-body-secondary mb-0">Tailor Zoho CRM to your specific business needs with custom fields, modules, and workflows</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Zoho Integration Services</h5>
                <p class="text-body-secondary mb-0">Seamlessly integrate Zoho with third-party applications and existing systems</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Custom App Development</h5>
                <p class="text-body-secondary mb-0">Build custom applications using Zoho Creator to solve unique business challenges</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Migration & Support</h5>
                <p class="text-body-secondary mb-0">Migrate from legacy systems to Zoho with ongoing maintenance and support</p>
            </div>
        </div>
    </div>
@endsection
