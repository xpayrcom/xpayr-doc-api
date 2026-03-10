# Plugin Integration Patterns

Reference callback patterns for XPayr plugins.

## Quickstart Flow
1. Generate `sk_test_...` or `sk_live_...`.
2. Fetch dynamic catalog with `GET /me/networks`.
3. Create checkout using `POST /payments`.
4. Configure callback using `POST /webhooks` or per-order `ipn_callback_url`.
5. Verify signature and map event status.

## Recommended Callback URLs
- WooCommerce: `https://<domain>/?wc-api=wc_gateway_xpayr`
- PrestaShop: `https://<domain>/module/xpayr/ipn`
- OpenCart: `https://<domain>/index.php?route=extension/payment/xpayr/callback`
- Magento 2: `https://<domain>/rest/V1/xpayr/ipn`
- Shopware 6: `https://<domain>/api/xpayr/payment/notify`
- Zen Cart: `https://<domain>/ipn_xpayr.php`

## Canonical Create Payload

```json
{
  "amount": "49.90",
  "currency": "USDC",
  "network": "bsc-testnet",
  "success_url": "https://merchant-site.com/success",
  "cancel_url": "https://merchant-site.com/cancel",
  "ipn_callback_url": "https://merchant-site.com/?wc-api=wc_gateway_xpayr",
  "metadata": {
    "source": "woocommerce",
    "order_id": "WOO-100045",
    "woocommerce_order_id": 100045,
    "customer_email": "buyer@example.com"
  }
}
```
