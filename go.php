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
    if ($value !== '') $params[$key] = substr($value, 0, 250);
}

if ($params) {
    $destination .= (str_contains($destination, '?') ? '&' : '?')
        . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
}

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('X-Robots-Tag: noindex, nofollow');
header('Location: ' . $destination, true, 302);
exit;
