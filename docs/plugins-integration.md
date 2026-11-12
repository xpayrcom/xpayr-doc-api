# Plugin & Platform Integration Patterns (30 Official Blueprints)

Reference callback and HMAC-SHA256 verification patterns across XPayr's 30 platform integrations (`https://xpayr.com/plugins`).

## Quickstart Flow
1. Generate `sk_test_...` or `sk_live_...`.
2. Fetch active 16-chain catalog (Solana, Base, Sui, Aptos, NEAR, Arbitrum, Polygon, Optimism, TRON, XRPL, BNB Chain, Ethereum, Avalanche, TON, Bitcoin, Circle Arc) via `GET /me/networks`.
3. Create Dual Checkout session using `POST /payments`.
4. Configure signed HMAC-SHA256 callback using `POST /webhooks` or per-order `ipn_callback_url`.
5. Verify `X-XPayr-Signature` against raw request body and handle both `payment.completed` and `payment.underpaid_accepted` (1% tolerance, max $0.50 USD).

## Recommended Callback Endpoints & Guides
- **WooCommerce** (`/plugins/woocommerce`): `https://<domain>/?wc-api=wc_gateway_xpayr`
- **Shopify** (`/plugins/shopify`): `https://<app-proxy>/webhooks/xpayr/shopify`
- **Odoo ERP v16-v18** (`/plugins/odoo`): `https://<odoo-host>/payment/xpayr/webhook`
- **PrestaShop** (`/plugins/prestashop`): `https://<domain>/module/xpayr/ipn`
- **Magento 2** (`/plugins/magento`): `https://<domain>/rest/V1/xpayr/ipn`
- **Shopware 6** (`/plugins/shopware`): `https://<domain>/api/xpayr/payment/notify`
- **OpenCart** (`/plugins/opencart`): `https://<domain>/index.php?route=extension/payment/xpayr/callback`
- **Zen Cart** (`/plugins/zencart`): `https://<domain>/ipn_xpayr.php`
- **WHMCS / HostBill / Blesta / Pterodactyl** (`/plugins/whmcs`, `/plugins/hostbill`, `/plugins/blesta`, `/plugins/pterodactyl`): `https://<billing-host>/modules/gateways/callback/xpayr.php`
- **Webflow & Framer** (`/plugins/webflow`, `/plugins/framer`): `/public/sdk/xpayr-pay-button.js` + serverless webhook forwarder
- **Cloudflare Workers & Supabase Edge** (`/plugins/cloudflare-workers`, `/plugins/supabase`): Web Crypto API `crypto.subtle.verify` HMAC-SHA256 & ES256 JWKS (`/.well-known/jwks.json`)
- **MedusaJS 2.0, Ghost, Bubble, Make, Zapier, n8n, Next.js, Laravel, Python FastAPI, Discord & Telegram**: Full blueprints at `https://xpayr.com/plugins`

## Canonical Create Payload

```json
{
  "amount": "49.90",
  "currency": "USDC",
  "network": "base-mainnet",
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
