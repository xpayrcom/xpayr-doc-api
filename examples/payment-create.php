<?php
$baseUrl = getenv('XPAYR_API_BASE_URL') ?: 'https://xpayr.com/api/v1';
$secretKey = getenv('XPAYR_SECRET_KEY');

if (!$secretKey) {
    fwrite(STDERR, "Missing XPAYR_SECRET_KEY\n");
    exit(1);
}

$payload = [
    'amount' => '19.99',
    'currency' => 'USDC',
    'network' => 'bsc-testnet',
    'metadata' => ['order_id' => 'ORDER-2026-001'],
];

$ch = curl_init(rtrim($baseUrl, '/') . '/payments');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $secretKey,
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    fwrite(STDERR, "cURL error: {$error}\n");
    exit(1);
}

echo "HTTP {$httpCode}\n";
echo $response . "\n";
