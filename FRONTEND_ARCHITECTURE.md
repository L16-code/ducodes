# Frontend Architecture Documentation

## Overview
The frontend views have been reorganized into a clean, maintainable structure following Laravel best practices.

## New Directory Structure

```
resources/views/
├── frontend/                    # All user-facing views
│   ├── layouts/
│   │   └── app.blade.php       # Master layout (extends to all pages)
│   ├── partials/
│   │   ├── header.blade.php    # Navigation bar
│   │   ├── footer.blade.php    # Footer section
│   │   ├── loader.blade.php    # Page loader (commented out)
│   │   ├── styles.blade.php    # CSS includes
│   │   └── scripts.blade.php   # JavaScript includes
│   ├── pages/
│   │   ├── home.blade.php      # Homepage
│   │   ├── about.blade.php     # About page
│   │   ├── blogs.blade.php     # Blog listing page
│   │   ├── blog-details.blade.php  # Single blog page
│   │   └── contact.blade.php   # Contact page
│   └── components/
│       ├── banner.blade.php    # Hero banner section
│       ├── about-section.blade.php  # About section
│       ├── services-section.blade.php  # Services section
│       ├── blog-section.blade.php  # Blog section
│       ├── contact-form.blade.php  # Contact form component
│       └── about/
│           └── aboutHelp.blade.php  # About page content
└── admin/                       # Admin panel (unchanged)
```

## Key Changes

### 1. **Master Layout Pattern**
All pages now extend `frontend.layouts.app` which includes:
- Meta tags and title
- CSS includes via `@include('frontend.partials.styles')`
- Header via `@include('frontend.partials.header')`
- Footer via `@include('frontend.partials.footer')`
- JavaScript via `@include('frontend.partials.scripts')`
- Support for `@stack('styles')` and `@stack('scripts')`

### 2. **Page Structure**
Each page follows this pattern:
```blade
@extends('frontend.layouts.app')

@section('title', 'Page Title')

@section('content')
    <!-- Page content here -->
@endsection
```

### 3. **Updated Controller Paths**
`HomeController.php` has been updated:
- `home.homepage` → `frontend.pages.home`
- `home.about` → `frontend.pages.about`
- `home.blogs` → `frontend.pages.blogs`
- `home.blog-details` → `frontend.pages.blog-details`
- `home.contact` → `frontend.pages.contact`

### 4. **Route Names (Unchanged)**
All route names remain the same:
- `route('homepage')` - Homepage
- `route('about')` - About page
- `route('blogs')` - Blog listing
- `route('blog.details', $slug)` - Blog details
- `route('contact')` - Contact page
- `route('contact.store')` - Contact form submission

## Benefits

1. **Clear Separation**: Layouts, pages, components, and partials are clearly separated
2. **Reusability**: Components can be easily reused across pages
3. **Maintainability**: Easy to find and update specific sections
4. **Consistency**: All pages use the same master layout
5. **Scalability**: Easy to add new pages or components

## Old vs New Structure

### Old Structure (Deprecated - Do Not Use)
```
resources/views/home/
├── homepage.blade.php
├── about.blade.php
├── blogs.blade.php
├── blog-details.blade.php
├── contact.blade.php
├── navbar.blade.php
├── footer.blade.php
├── homecss.blade.php
├── homejs.blade.php
└── homeComponents/
    ├── banner.blade.php
    ├── homeAbout.blade.php
    └── homeService.blade.php
```

### New Structure (Use This)
```
resources/views/frontend/
├── layouts/app.blade.php
├── partials/
├── pages/
└── components/
```

## Migration Notes

The old `/home` directory structure is still present but should NOT be used for new development. All new pages should follow the new `/frontend` structure.

## Admin Panel

The admin panel structure (`resources/views/admin/`) remains unchanged and is not affected by this reorganization.
