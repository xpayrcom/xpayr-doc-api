# Webhooks and IPN

Webhooks provide real-time payment state updates.

## Register Webhook
`POST /webhooks`

```json
{ "url": "https://yourdomain.com/webhooks/xpayr" }
```

- URL must be HTTPS.
- Webhook secret is returned once.

## Read Webhook Config
`GET /webhooks`

## Send Test Event
`POST /webhooks/test`

## Remove Webhook
`DELETE /webhooks`

## Dynamic Callback Override
When creating payment sessions, you can pass `ipn_callback_url` in `POST /payments`.
If present, XPayr sends callback events to this URL instead of the global webhook URL.

This is recommended for multi-store setups (for example: WooCommerce + Shopware + custom checkout under one merchant account).

## Signature Verification (PHP)

```php
$raw = file_get_contents('php://input');
$header = $_SERVER['HTTP_X_XPAYR_SIGNATURE'] ?? '';
$header = preg_replace('/^sha256=/', '', $header);
$expected = hash_hmac('sha256', $raw, $webhookSecret);

if (!hash_equals($expected, $header)) {
  http_response_code(401);
  exit('invalid signature');
}
```

## Core Event Mapping
- `payment.completed`, `payment.confirmed` -> paid/processing/completed
- `payment.pending`, `payment.processing` -> pending
- `payment.failed` -> failed
- `payment.expired` -> cancelled/expired

## Reliability Notes
- Store `session_id` and `invoice_id` at create time.
- Treat callbacks as retryable and idempotent.
- Return 2xx only after durable write.
