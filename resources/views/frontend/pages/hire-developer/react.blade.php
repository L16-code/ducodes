@extends('frontend.pages.hire-developer.base', [
    'title' => 'React',
    'description' => 'Create dynamic, responsive user interfaces with our skilled React developers who build modern web applications.'
])

@section('benefits')
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-primary bg-opacity-10 rounded-circle">
                <i class="bi bi-layers fs-1 text-primary"></i>
            </div>
            <h5 class="mb-3">Component-Based</h5>
            <p class="text-body-secondary">Reusable components for faster development</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-warning bg-opacity-10 rounded-circle">
                <i class="bi bi-speedometer2 fs-1 text-warning"></i>
            </div>
            <h5 class="mb-3">High Performance</h5>
            <p class="text-body-secondary">Optimized React applications for speed</p>
        </div>
    </div>
    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center">
            <div class="width-5x height-5x mb-4 mx-auto flex-center bg-success bg-opacity-10 rounded-circle">
                <i class="bi bi-phone fs-1 text-success"></i>
            </div>
            <h5 class="mb-3">Responsive Design</h5>
            <p class="text-body-secondary">Mobile-first, responsive interfaces</p>
        </div>
    </div>
@endsection

@section('skills')
    <div class="col-lg-10 mx-auto">
        <div class="row g-3">
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">React.js</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Redux/Context API</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">React Hooks</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Next.js</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">TypeScript</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Material-UI</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">REST/GraphQL</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Jest/Testing</span></div>
            <div class="col-md-4"><span class="badge bg-primary-subtle text-primary p-3 w-100">Webpack/Vite</span></div>
        </div>
    </div>
@endsection

@section('services')
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">SPA Development</h5>
                <p class="text-body-secondary mb-0">Build fast, interactive single-page applications</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">UI/UX Development</h5>
                <p class="text-body-secondary mb-0">Create beautiful, user-friendly interfaces</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Progressive Web Apps</h5>
                <p class="text-body-secondary mb-0">Develop PWAs with offline capabilities</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-5">
                <h5 class="mb-3">Migration Services</h5>
                <p class="text-body-secondary mb-0">Migrate legacy apps to modern React</p>
            </div>
        </div>
    </div>
@endsection
