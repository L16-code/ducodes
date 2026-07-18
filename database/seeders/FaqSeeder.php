<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Imports the FAQs currently hardcoded in config/service_pages.php into
     * the database, so they become editable through /admin/faqs. Safe to
     * re-run — skips a service's FAQs if any already exist for that slug.
     */
    public function run(): void
    {
        foreach (config('service_pages') as $slug => $service) {
            if (empty($service['faqs']) || Faq::where('service_slug', $slug)->exists()) {
                continue;
            }

            foreach ($service['faqs'] as $index => $faq) {
                Faq::create([
                    'service_slug' => $slug,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]);
            }
        }
    }
}
