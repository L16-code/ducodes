<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="assets/img/logo.png" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}"
                                class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('about') }}"
                                class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::is('attorneys*') ? 'active' : '' }}">Attorneys</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('case-studies*') ? 'active' : '' }}">Case
                                Studies</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('contact') }}"
                                class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a href="appointment.html">Get Appointment</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
