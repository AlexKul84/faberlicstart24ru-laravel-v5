{{ Request::header('Content-Type : text/xml') }}
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
  	<loc>https://faberlic-start24.by/</loc>
  	<lastmod>2020-12-25T10:58:03+01:00</lastmod>
  	<priority>1.0</priority>
  </url>
  <url>
  	<loc>https://faberlic-start24.by/articles</loc>
  	<lastmod>2020-12-25T10:58:04+01:00</lastmod>
  	<priority>1.0</priority>
  </url>
  <url>
  	<loc>https://faberlic-start24.by/catalogs</loc>
  	<lastmod>2020-12-25T10:58:06+01:00</lastmod>
  	<priority>1.0</priority>
  </url>
  <url>
  	<loc>https://faberlic-start24.by/lichniy-kabinet</loc>
  	<lastmod>2020-12-25T10:58:06+01:00</lastmod>
  	<priority>1.0</priority>
  </url>
  <url>
  	<loc>https://faberlic-start24.by/oplata</loc>
  	<lastmod>2020-12-25T10:58:06+01:00</lastmod>
  	<priority>1.0</priority>
  </url>
  @foreach ($posts as $post)
      <url>
          <loc>{{ url($post->slug) }}</loc>
          <lastmod>{{ $post->updated_at->tz('GMT')->toAtomString() }}</lastmod>
          <changefreq>monthly</changefreq>
          <priority>1</priority>
      </url>
  @endforeach
</urlset>
