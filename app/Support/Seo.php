<?php

namespace App\Support;

class Seo
{
    /**
     * Sitewide Organization JSON-LD, built only from verified config values.
     */
    public static function organizationSchema(): array
    {
        $org = config('seo.organization');

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $org['name'],
            'url' => $org['url'],
            'telephone' => $org['telephone'],
            'email' => $org['email'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $org['address']['addressLocality'],
                'addressRegion' => $org['address']['addressRegion'],
                'addressCountry' => $org['address']['addressCountry'],
            ],
        ];

        if (!empty($org['logo'])) {
            $schema['logo'] = asset($org['logo']);
        }

        if (!empty($org['same_as'])) {
            $schema['sameAs'] = array_values($org['same_as']);
        }

        return $schema;
    }

    /**
     * Sitewide WebSite JSON-LD. No SearchAction is emitted because the site
     * has no functional on-site search endpoint — a SearchAction pointing at
     * a page that doesn't actually search would be fake structured data.
     */
    public static function websiteSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => config('seo.site_name'),
            'url' => config('app.url'),
        ];
    }

    /**
     * BreadcrumbList JSON-LD.
     *
     * @param  array<string, string|null>  $items  ['Label' => url|null]
     */
    public static function breadcrumbSchema(array $items): array
    {
        $position = 0;
        $list = [];

        foreach ($items as $name => $url) {
            $position++;
            $entry = [
                '@type' => 'ListItem',
                'position' => $position,
                'name' => $name,
            ];
            if ($url) {
                $entry['item'] = $url;
            }
            $list[] = $entry;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ];
    }

    /**
     * WebPage JSON-LD for a generic content page.
     */
    public static function webPageSchema(string $name, string $description, string $url): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $name,
            'description' => $description,
            'url' => $url,
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => config('seo.site_name'),
                'url' => config('app.url'),
            ],
        ];
    }

    /**
     * Service JSON-LD for a hire-developer / technology landing page.
     */
    public static function serviceSchema(string $name, string $description, string $url): array
    {
        $org = config('seo.organization');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => $name,
            'name' => $name,
            'description' => $description,
            'url' => $url,
            'provider' => [
                '@type' => 'Organization',
                'name' => $org['name'],
                'url' => $org['url'],
            ],
            'areaServed' => 'Worldwide',
        ];
    }

    /**
     * BlogPosting JSON-LD for a blog detail page. No authorPerson name is
     * invented — bylines currently render as "Admin" in the UI, so schema
     * omits `author` rather than asserting a fabricated Person.
     */
    public static function blogPostingSchema(string $title, string $description, string $url, ?string $image, \DateTimeInterface $datePublished): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $title,
            'description' => $description,
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $url,
            ],
            'datePublished' => $datePublished->format(\DateTimeInterface::ATOM),
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('seo.organization.name'),
            ],
        ];

        if ($image) {
            $schema['image'] = $image;
        }

        return $schema;
    }

    /**
     * FAQPage JSON-LD. Content must genuinely appear on the page — FAQ schema
     * must mirror visible content per Google's structured data guidelines.
     *
     * @param  array<int, array{question: string, answer: string}>  $faqs
     */
    public static function faqSchema(array $faqs): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ], $faqs),
        ];
    }
}
