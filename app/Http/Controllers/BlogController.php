<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // Import the Blog model
use Illuminate\Support\Facades\Log; // Import Log for debugging
use Illuminate\Support\Str; // Import Str for slug generation

class BlogController extends Controller
{
    public function add_blog()
    {   
        return view('admin.blogs.addBlogs');
    }

    public function store(Request $request)
    {
        try {
            // Validate the form inputs
            $validatedData = $request->validate([
                'blog_title' => 'required|string|max:255',
                'blog_slug' => 'nullable|string|max:255|unique:blogs,blog_slug',
                'blog_type' => 'required|in:news,tutorial,review',
                'thumbnail_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'main_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'posted_on' => 'required|date',
                'short_desc' => 'required|string|max:500',
                'main_desc' => 'required|string',
                'tags' => 'required|string|max:255', // Comma-separated tags
                'meta_title' => 'required|string|max:255',
                'meta_description' => 'required|string|max:500',
                'meta_keywords' => 'required|string|max:255', // Comma-separated keywords
            ]);

            // Generate slug if not provided
            if (empty($validatedData['blog_slug'])) {
                $validatedData['blog_slug'] = Str::slug($validatedData['blog_title']);
            }

            // Handle duplicate slugs
            $originalSlug = $validatedData['blog_slug'];
            $counter = 1;
            while (Blog::where('blog_slug', $validatedData['blog_slug'])->exists()) {
                $validatedData['blog_slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Handle file uploads
            $thumbnailPath = $request->file('thumbnail_img')->store('blogs/thumbnails', 'public');
            $mainImagePath = $request->file('main_img')->store('blogs/main_images', 'public');

            // Convert tags and meta keywords into arrays
            $tags = array_map('trim', explode(',', $validatedData['tags']));
            $metaKeywords = array_map('trim', explode(',', $validatedData['meta_keywords']));

            // Create the blog entry
            $blog = Blog::create([
                'blog_title' => $validatedData['blog_title'],
                'blog_slug' => $validatedData['blog_slug'],
                'blog_type' => $validatedData['blog_type'],
                'thumbnail_img' => $thumbnailPath,
                'main_img' => $mainImagePath,
                'posted_on' => $validatedData['posted_on'],
                'short_desc' => $validatedData['short_desc'],
                'main_desc' => $validatedData['main_desc'],
                'tags' => json_encode($tags), // Save as JSON
                'seo_meta' => json_encode([
                    'meta_title' => $validatedData['meta_title'],
                    'meta_description' => $validatedData['meta_description'],
                    'meta_keywords' => $metaKeywords,
                ]),
            ]);

            return response()->json(['success' => true, 'message' => 'Blog added successfully!']);
        } catch (\Exception $e) {
            Log::error('Error in Blog Store:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function blog_listing()
    {
        $blogs = Blog::all();
        return view('admin.blogs.blogListing', compact('blogs'));
    }

    public function getBlogsData()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    public function updateStatus(Request $request)
    {
        try {
            $blog = Blog::findOrFail($request->id);
            $blog->status = $request->status;
            $blog->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Error updating blog status:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        // return "hello";
        return view('admin.blogs.editBlogs', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            // Validate the form inputs
            $validatedData = $request->validate([
                'blog_title' => 'required|string|max:255',
                'blog_slug' => 'nullable|string|max:255|unique:blogs,blog_slug,' . $id,
                'blog_type' => 'required|in:news,tutorial,review',
                'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'posted_on' => 'required|date',
                'short_desc' => 'required|string|max:500',
                'main_desc' => 'required|string',
                'tags' => 'required|string|max:255',
                'meta_title' => 'required|string|max:255',
                'meta_description' => 'required|string|max:500',
                'meta_keywords' => 'required|string|max:255',
            ]);

            // Update slug if provided
            if (!empty($validatedData['blog_slug'])) {
                $originalSlug = $validatedData['blog_slug'];
                $counter = 1;
                while (Blog::where('blog_slug', $validatedData['blog_slug'])->where('id', '!=', $id)->exists()) {
                    $validatedData['blog_slug'] = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            // Handle file uploads
            if ($request->hasFile('thumbnail_img')) {
                $thumbnailPath = $request->file('thumbnail_img')->store('blogs/thumbnails', 'public');
                $blog->thumbnail_img = $thumbnailPath;
            }
            if ($request->hasFile('main_img')) {
                $mainImagePath = $request->file('main_img')->store('blogs/main_images', 'public');
                $blog->main_img = $mainImagePath;
            }

            // Convert tags and meta keywords into arrays
            $tags = array_map('trim', explode(',', $validatedData['tags']));
            $metaKeywords = array_map('trim', explode(',', $validatedData['meta_keywords']));

            // Update the blog entry
            $blog->update([
                'blog_title' => $validatedData['blog_title'],
                'blog_slug' => $validatedData['blog_slug'] ?? $blog->blog_slug,
                'blog_type' => $validatedData['blog_type'],
                'posted_on' => $validatedData['posted_on'],
                'short_desc' => $validatedData['short_desc'],
                'main_desc' => $validatedData['main_desc'],
                'tags' => json_encode($tags),
                'seo_meta' => json_encode([
                    'meta_title' => $validatedData['meta_title'],
                    'meta_description' => $validatedData['meta_description'],
                    'meta_keywords' => $metaKeywords,
                ]),
            ]);

            return response()->json(['success' => true, 'message' => 'Blog updated successfully!']);
        } catch (\Exception $e) {
            Log::error('Error in Blog Update:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}