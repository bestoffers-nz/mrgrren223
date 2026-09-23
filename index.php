<?php

declare(strict_types=1);
session_start();
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
$allowed = ['gclid', 'gbraid', 'wbraid', 'gad_source', 'gad_campaignid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
$tracking = [];
foreach ($allowed as $key) {
    if (isset($_GET[$key])) {
        $v = trim((string)$_GET[$key]);
        if ($v !== '') $tracking[$key] = substr($v, 0, 250);
    }
}
if ($tracking) {
    $_SESSION['tracking'] = array_merge($_SESSION['tracking'] ?? [], $tracking);
    $_SESSION['landing_time'] ??= time();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Practical digital resources and easy-to-understand online guides.">
    <title>Mr Green | Digital Resources & Online Guides</title>
    <link rel="canonical" href="/">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <header>
        <div class="container bar">

            <a class="brand" href="/">
                Mr Green
            </a>

            <nav>
                <a href="#resources">Resources</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </nav>

        </div>
    </header>


    <main>

        <!-- HERO -->
        <section class="hero">

            <div class="container narrow">

                <span class="pill">
                    INFORMATION & RESOURCES
                </span>

                <h1>
                    Clear information for navigating online services
                </h1>

                <p>
                    Explore practical guides and informational resources
                    designed to help visitors better understand common
                    digital topics, online services, and third-party
                    resources.
                </p>

                <a class="btn" href="#resources">
                    Explore Resources
                </a>

            </div>

        </section>


        <!-- RESOURCES -->
        <section class="section" id="resources">

            <div class="container">

                <div class="title">

                    <h2>
                        Explore Our Resources
                    </h2>

                    <p>
                        Straightforward informational content designed
                        to help visitors research and understand online
                        topics before making their own decisions.
                    </p>

                </div>


                <div class="grid">

                    <article>

                        <b>01</b>

                        <h3>
                            Digital Guides
                        </h3>

                        <p>
                            Easy-to-understand guides covering common
                            digital tools, online services, website
                            features, and everyday online experiences.
                        </p>

                    </article>


                    <article>

                        <b>02</b>

                        <h3>
                            Helpful Resources
                        </h3>

                        <p>
                            Access practical information and resources
                            presented in a clear format so you can
                            research relevant topics more easily.
                        </p>

                    </article>


                    <article>

                        <b>03</b>

                        <h3>
                            Online Insights
                        </h3>

                        <p>
                            Read informational content covering
                            technology, digital services, online
                            experiences, and developments that may
                            be useful to visitors.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- PURPOSE -->
        <section class="section alt">

            <div class="container narrow">

                <div class="title">

                    <h2>
                        Information Made Easier to Understand
                    </h2>

                    <p>
                        Our goal is to present useful information in a
                        clear and accessible format. Visitors are
                        encouraged to review relevant information and
                        verify important details with the appropriate
                        provider before making a decision.
                    </p>

                </div>

            </div>

        </section>


        <!-- TRANSPARENCY -->
        <section class="section">

            <div class="container narrow">

                <div class="title">

                    <h2>
                        Our Commitment to Transparency
                    </h2>

                    <p>
                        We aim to clearly distinguish informational
                        content from third-party websites, products,
                        services, and offers. Information available
                        through third-party providers may change, so
                        visitors should review the provider's current
                        terms and policies before using its services.
                    </p>

                </div>

            </div>

        </section>


        <!-- INDEPENDENT WEBSITE DISCLOSURE -->
        <section class="section alt">

            <div class="container narrow">

                <div class="title">

                    <h2>
                        Independent Website Disclosure
                    </h2>

                    <p>
                        This website provides independent informational
                        content. References to third-party companies,
                        brands, products, or services do not imply
                        ownership, sponsorship, partnership, or
                        endorsement unless an official relationship
                        is explicitly stated.
                    </p>

                    <p>
                        Third-party trademarks, brand names, and logos
                        belong to their respective owners. For
                        authoritative information about a third-party
                        service, visitors should consult the relevant
                        provider directly.
                    </p>

                </div>

            </div>

        </section>

    </main>


    <footer>

        <div class="container foot">

            <span>
                &copy; 2026 Mr Green.
            </span>

            <div>

                <a href="about.php">
                    About
                </a>

                <a href="privacy.php">
                    Privacy Policy
                </a>

                <a href="terms.php">
                    Terms &amp; Conditions
                </a>

                <a href="disclaimer.php">
                    Disclaimer
                </a>

                <a href="contact.php">
                    Contact
                </a>

            </div>

        </div>

    </footer>

</body>

</html>