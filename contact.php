<?php

declare(strict_types=1);
$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sent = true;
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="index,follow">
    <title>Contact | Mr Green</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header>
        <div class="container bar"><a class="brand" href="/">Mr Green</a>
            <nav><a href="/">Home</a><a href="about.php">About</a></nav>
        </div>
    </header>
    <main class="section">
        <div class="container narrow">
            <h1>Contact</h1><?php if ($sent): ?>
                <div class="notice">Thank you. Your message has been received.</div>
            <?php else: ?>
                <form method="post">
                    <label>Name<input name="name" required maxlength="80">
                    </label><label>Email<input type="email" name="email" required maxlength="120"></label>
                    <label>Message<textarea name="message" required maxlength="2000"></textarea></label>
                    <button class="btn" type="submit">Send Message</button>
                </form><?php endif; ?>
        </div>
    </main>
</body>

</html>