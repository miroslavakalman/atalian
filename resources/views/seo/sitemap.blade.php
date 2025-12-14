<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

@foreach ($locales as $locale)
    @foreach ($pages as $page)
        <url>
            <loc>{{ url($locale . '/' . $page) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>{{ $page === '' ? '1.0' : '0.8' }}</priority>
        </url>
    @endforeach
@endforeach

</urlset>
