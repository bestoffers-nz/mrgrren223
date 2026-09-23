<?php

declare(strict_types=1);
session_start();

// Extract final destination from Google click URL (adurl parameter)
$adurl = $_GET['adurl'] ?? '';
$destination = 'https://dailysource.online/';

// If adurl provided, decode it to get the actual destination URL
if (!empty($adurl)) {
    $destination = rawurldecode($adurl);
    if (!filter_var($destination, FILTER_VALIDATE_URL)) {
        $destination = 'https://dailysource.online/';
    }
}

// Fallback to localhost if no valid destination
if (empty($destination)) {
    $destination = 'https://dailysource.online/';
}

$allowed = ['gclid', 'gbraid', 'wbraid', 'gad_source', 'gad_campaignid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
$saved = $_SESSION['tracking'] ?? [];
$params = [];
foreach ($allowed as $key) {
    if (isset($saved[$key])) {
        $v = trim((string)$saved[$key]);
        if ($v !== '') $params[$key] = substr($v, 0, 250);
    }
}
if ($params) {
    $destination .= (str_contains($destination, '?') ? '&' : '?') . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
}
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Location: ' . $destination, true, 302);
exit;
