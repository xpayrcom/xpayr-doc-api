# Payments

## Create Payment Session
`POST /payments`

Required fields:
- `amount`
- `currency`
- `network`

Example request:

```json
{
  "amount": "9.99",
  "currency": "USDC",
  "network": "bsc-testnet",
  "order_id": "ORDER-1001",
  "description": "Test payment",
  "ipn_callback_url": "https://yourdomain.com/webhook/xpayr",
  "metadata": { "source": "api-doc" }
}
```

Example response:

```json
{
  "id": "ps_42f492dedc5b665b8511852de5ea0325",
  "invoice_id": 6265178012,
  "object": "payment_session",
  "amount": "9.99",
  "currency": "USDC",
  "network": "bsc-testnet",
  "status": "pending",
  "payment_url": "https://xpayr.com/pay/ps_42f492dedc5b665b8511852de5ea0325",
  "expires_at": "2026-02-12T16:00:00+00:00",
  "livemode": false
}
```

## List Sessions
`GET /payments?page=1&limit=25&status=pending&network=bsc-testnet`

## Get Session
`GET /payments/{id}`

## Complete Session
`POST /payments/{id}/complete`

Example body:

```json
{
  "tx_hash": "0x1111111111111111111111111111111111111111111111111111111111111111",
  "from_address": "0x2222222222222222222222222222222222222222",
  "chain_id": 97
}
```

## Integration Notes
- Persist `id`, `invoice_id`, and `payment_url` on your order.
- Prefer webhook events for authoritative status transitions.
- Use `GET /payments/{id}` for fallback reconciliation.
