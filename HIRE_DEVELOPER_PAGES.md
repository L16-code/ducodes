# Hire Developer Pages Documentation

## Overview
SEO-friendly individual pages for each developer category with proper URL structure and templating.

## URL Structure
All hire developer pages follow this pattern:
```
https://yourdomain.com/hire-developer/{category-slug}
```

Examples:
- `/hire-developer/zoho` - Hire Zoho Developer
- `/hire-developer/laravel` - Hire Laravel Developer
- `/hire-developer/react` - Hire React Developer

## Directory Structure

```
resources/views/frontend/pages/hire-developer/
├── base.blade.php              # Master template for all hire pages
├── generic.blade.php           # Fallback template for categories without custom pages
├── zoho.blade.php             # Custom Zoho developer page
├── laravel.blade.php          # Custom Laravel developer page
├── react.blade.php            # Custom React developer page
└── [add more as needed]
```

## How It Works

### 1. Base Template (`base.blade.php`)
The master template that all hire developer pages extend. It includes:
- Hero section with title and description
- "Why Hire" benefits section
- Skills section
- Services section
- CTA (Call-to-Action) section

### 2. Custom Pages
Each technology can have its own custom page (e.g., `zoho.blade.php`, `laravel.blade.php`).

**Example structure:**
```blade
@extends('frontend.pages.hire-developer.base', [
    'title' => 'Zoho',
    'description' => 'Your custom description here'
])

@section('benefits')
    <!-- Custom benefits content -->
@endsection

@section('skills')
    <!-- Custom skills list -->
@endsection

@section('services')
    <!-- Custom services offered -->
@endsection
```

### 3. Generic Template
If a category doesn't have a custom page, the system automatically uses `generic.blade.php` with default content.

## Available Categories

All 27 developer categories from the navigation:

| Slug | Title | Custom Page |
|------|-------|-------------|
| `zoho` | Zoho | ✅ Yes |
| `gen-ai` | Gen AI | ❌ Generic |
| `nodejs` | Node.js | ❌ Generic |
| `java` | Java | ❌ Generic |
| `laravel` | Laravel | ✅ Yes |
| `python` | Python | ❌ Generic |
| `graphic-designer` | Graphic Designer | ❌ Generic |
| `mern` | MERN | ❌ Generic |
| `salesforce` | Salesforce | ❌ Generic |
| `react` | React | ✅ Yes |
| `power-bi` | Power BI | ❌ Generic |
| `spring-boot` | Spring Boot | ❌ Generic |
| `angular` | Angular | ❌ Generic |
| `seo` | SEO | ❌ Generic |
| `ai-ml` | AI/ML | ❌ Generic |
| `asp-net` | ASP.NET | ❌ Generic |
| `mean` | MEAN | ❌ Generic |
| `hubspot` | HubSpot | ❌ Generic |
| `devops` | DevOps | ❌ Generic |
| `react-native` | React Native | ❌ Generic |
| `ionic` | Ionic | ❌ Generic |
| `flutter` | Flutter | ❌ Generic |
| `php` | PHP | ❌ Generic |
| `wordpress` | WordPress | ❌ Generic |
| `shopify` | Shopify | ❌ Generic |
| `database-engineer` | Database Engineer | ❌ Generic |

## Creating a New Custom Page

1. **Create the view file:**
   ```bash
   resources/views/frontend/pages/hire-developer/{slug}.blade.php
   ```

2. **Use this template:**
   ```blade
   @extends('frontend.pages.hire-developer.base', [
       'title' => 'Technology Name',
       'description' => 'Brief description for SEO'
   ])

   @section('benefits')
       <!-- 3 benefit cards -->
   @endsection

   @section('skills')
       <!-- Skills badges -->
   @endsection

   @section('services')
       <!-- Service cards -->
   @endsection
   ```

3. **The page will automatically work** - No need to add routes or controller changes!

## SEO Benefits

✅ **Unique URLs** - Each technology has its own URL  
✅ **Custom Titles** - `Hire {Technology} Developer - DuCodes`  
✅ **Targeted Content** - Technology-specific content for better ranking  
✅ **Internal Linking** - All pages linked from main navigation  
✅ **Scalable** - Easy to add more pages without code changes  

## Controller Logic

The `HireDeveloperController` handles all pages:
- Checks if category exists
- Looks for custom view file
- Falls back to generic template if no custom page exists
- Returns 404 if category doesn't exist

## Navigation Integration

All links in the header "Hire A Developer" dropdown now point to these pages using:
```blade
{{ route('hire.developer', 'slug-name') }}
```

## Adding More Categories

To add a new category:

1. Add to `HireDeveloperController::$categories` array
2. Optionally create custom page in `hire-developer/` folder
3. Add link to navigation (if needed)

That's it! The system handles the rest automatically.
