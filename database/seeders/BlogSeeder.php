<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Local development sample data only — not real published content.
     */
    public function run(): void
    {
        $posts = [
            [
                'blog_title' => '7 Laravel Performance Tips That Actually Move the Needle',
                'blog_slug' => 'laravel-performance-tips',
                'blog_type' => 'tutorial',
                'thumbnail_img' => 'blogs/thumbnails/laravel-performance.jpg',
                'main_img' => 'blogs/main_images/laravel-performance-main.jpg',
                'posted_on' => now()->subDays(12),
                'short_desc' => 'Practical, measurable ways to speed up a Laravel application — from query optimization to queue tuning.',
                'main_desc' => '<p>Laravel gives you a lot out of the box, but a default install is rarely tuned for production load. Here are seven changes worth making before you reach for more infrastructure.</p><h3>1. Eager load your relationships</h3><p>N+1 queries are the most common performance killer in Laravel apps. Use <code>with()</code> proactively and consider enabling <code>Model::preventLazyLoading()</code> in local development to catch them early.</p><h3>2. Cache configuration and routes</h3><p><code>php artisan config:cache</code> and <code>php artisan route:cache</code> remove filesystem parsing overhead on every request — a simple win with zero code changes.</p><h3>3. Move slow work to queues</h3><p>Anything that talks to a third-party API — email, webhooks, PDF generation — belongs on a queue, not in the request/response cycle.</p><h3>4. Index what you filter and sort on</h3><p>Check your slow query log. Columns used in <code>WHERE</code>, <code>ORDER BY</code>, and join conditions almost always need an index.</p><h3>5. Use database-level pagination</h3><p><code>paginate()</code> is efficient; loading a full collection into memory and slicing it in PHP is not.</p><h3>6. Cache expensive, rarely-changing queries</h3><p>Wrap read-heavy, slow-changing queries in <code>Cache::remember()</code> with a sensible TTL.</p><h3>7. Profile before you optimize</h3><p>Tools like Laravel Debugbar or Telescope will tell you where time is actually going — guessing wastes engineering time.</p>',
                'tags' => ['laravel', 'performance', 'php'],
                'status' => 'active',
                'seo_meta' => [
                    'meta_title' => '7 Laravel Performance Tips That Actually Move the Needle | DuCodes',
                    'meta_description' => 'Practical, measurable ways to speed up a Laravel application — from query optimization to queue tuning.',
                    'meta_keywords' => ['laravel performance', 'laravel optimization', 'php'],
                ],
            ],
            [
                'blog_title' => 'When Does a Business Actually Need an AI Chatbot?',
                'blog_slug' => 'when-does-a-business-need-an-ai-chatbot',
                'blog_type' => 'news',
                'thumbnail_img' => 'blogs/thumbnails/ai-chatbots.jpg',
                'main_img' => 'blogs/main_images/ai-chatbots-main.jpg',
                'posted_on' => now()->subDays(6),
                'short_desc' => 'AI chatbots aren\'t a fit for every business. Here\'s a practical framework for deciding if one is worth building.',
                'main_desc' => '<p>Generative AI chatbots get pitched as a fix for almost anything, but they\'re not always the right tool. Before committing budget, it helps to separate genuine use cases from hype.</p><h3>Good fits</h3><ul><li>High-volume, repetitive support questions with clear, factual answers</li><li>Lead qualification on a website where a human can\'t respond instantly</li><li>Internal knowledge-base search across large, unstructured documentation</li></ul><h3>Poor fits</h3><ul><li>Situations requiring empathy or judgment calls (refunds, complaints, legal questions)</li><li>Low-traffic support channels where a bot won\'t see enough volume to justify the build cost</li><li>Any process where a wrong answer has real financial or safety consequences without human review</li></ul><h3>What "done well" looks like</h3><p>A chatbot that clearly hands off to a human when it\'s uncertain — rather than one that confidently guesses — is the difference between a tool customers trust and one they route around.</p>',
                'tags' => ['ai', 'chatbots', 'gen-ai'],
                'status' => 'active',
                'seo_meta' => [
                    'meta_title' => 'When Does a Business Actually Need an AI Chatbot? | DuCodes',
                    'meta_description' => 'AI chatbots aren\'t a fit for every business. A practical framework for deciding if one is worth building.',
                    'meta_keywords' => ['ai chatbot', 'gen ai', 'business automation'],
                ],
            ],
            [
                'blog_title' => 'Zoho CRM vs. Salesforce: Picking the Right Fit for a Growing Team',
                'blog_slug' => 'zoho-crm-vs-salesforce',
                'blog_type' => 'review',
                'thumbnail_img' => 'blogs/thumbnails/zoho-crm.jpg',
                'main_img' => 'blogs/main_images/zoho-crm-main.jpg',
                'posted_on' => now()->subDays(20),
                'short_desc' => 'Both platforms can run a sales pipeline well. The right choice usually comes down to team size, budget, and integration needs.',
                'main_desc' => '<p>Zoho CRM and Salesforce solve the same core problem — tracking leads, deals, and customer relationships — but they\'re built for different-sized teams and budgets.</p><h3>Where Zoho CRM tends to win</h3><p>Lower total cost, a bundled suite (Books, Desk, Campaigns) that\'s easy to connect without heavy custom development, and a faster setup for small-to-mid-sized sales teams.</p><h3>Where Salesforce tends to win</h3><p>Deeper customization through Apex and Flow, a larger third-party app ecosystem (AppExchange), and better support for complex, multi-team enterprise sales processes.</p><h3>The real question to ask</h3><p>It\'s less "which CRM is better" and more "how much custom logic will our sales process actually need in the next two years." Teams that overbuy enterprise CRM tooling early often end up paying for complexity they don\'t use yet.</p>',
                'tags' => ['zoho', 'salesforce', 'crm'],
                'status' => 'active',
                'seo_meta' => [
                    'meta_title' => 'Zoho CRM vs. Salesforce: Picking the Right Fit | DuCodes',
                    'meta_description' => 'Both platforms can run a sales pipeline well. The right choice usually comes down to team size, budget, and integration needs.',
                    'meta_keywords' => ['zoho crm', 'salesforce', 'crm comparison'],
                ],
            ],
            [
                'blog_title' => 'React or Vue in 2026: A Practical Comparison for New Projects',
                'blog_slug' => 'react-or-vue-in-2026',
                'blog_type' => 'tutorial',
                'thumbnail_img' => 'blogs/thumbnails/react-vs-vue.jpg',
                'main_img' => 'blogs/main_images/react-vs-vue-main.jpg',
                'posted_on' => now()->subDays(2),
                'short_desc' => 'Both frameworks are mature and production-ready. Here\'s how to think about the tradeoffs for a new project.',
                'main_desc' => '<p>React and Vue have converged a lot over the years — both offer component-based architecture, strong TypeScript support, and mature routing/state solutions. The decision usually comes down to team and ecosystem fit rather than raw capability.</p><h3>Team familiarity matters more than benchmarks</h3><p>Both frameworks perform well for the vast majority of applications. Hiring pool and existing team experience will usually save more time than a marginal performance difference.</p><h3>Ecosystem size</h3><p>React\'s larger ecosystem means more third-party libraries and more Stack Overflow answers for edge cases — useful when a project has unusual requirements.</p><h3>Learning curve</h3><p>Vue\'s single-file components and more opinionated defaults tend to get new developers productive faster, which can matter for teams that scale quickly.</p><h3>Our take</h3><p>For most client projects, we choose based on what the team will maintain long-term after launch, not which framework benchmarks slightly faster in a synthetic test.</p>',
                'tags' => ['react', 'vue', 'frontend'],
                'status' => 'active',
                'seo_meta' => [
                    'meta_title' => 'React or Vue in 2026: A Practical Comparison | DuCodes',
                    'meta_description' => 'Both frameworks are mature and production-ready. How to think about the tradeoffs for a new project.',
                    'meta_keywords' => ['react vs vue', 'frontend framework', 'javascript'],
                ],
            ],
        ];

        foreach ($posts as $post) {
            $blog = Blog::updateOrCreate(
                ['blog_slug' => $post['blog_slug']],
                collect($post)->except('status')->all()
            );
            $blog->status = $post['status'];
            $blog->save();
        }
    }
}
