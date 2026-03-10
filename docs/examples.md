# SDK-Style Examples

## JavaScript (Node / Fetch)

```js
const baseUrl = 'https://xpayr.com/api/v1';
const secretKey = process.env.XPAYR_SECRET_KEY;

const res = await fetch(`${baseUrl}/payments`, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${secretKey}`
  },
  body: JSON.stringify({
    amount: '19.99',
    currency: 'USDC',
    network: 'bsc-testnet',
    metadata: { order_id: 'ORDER-2026-001' }
  })
});

const data = await res.json();
console.log(data);
```

## PHP (cURL)

```php
$ch = curl_init('https://xpayr.com/api/v1/payments');
curl_setopt_array($ch, [
  CURLOPT_POST => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $secretKey,
  ],
  CURLOPT_POSTFIELDS => json_encode([
    'amount' => '19.99',
    'currency' => 'USDC',
    'network' => 'bsc-testnet',
  ]),
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
```
