# XPayr Merchant API Docs

Official API reference and integration assets for XPayr Merchant API v1.

## Scope
This repository is documentation-only and excludes production backend code, merchant panel internals, and any secret material.

## Base URL
- Production: `https://xpayr.com/api/v1`

## Included
- `docs/` endpoint references, auth, errors, webhook and plugin integration notes
- `postman/` official Postman collection and environment
- `examples/` language-specific integration snippets
- `web/doc-api/index.php` live `/doc-api` source snapshot

## Quick Start
1. Import Postman files:
   - `postman/xpayr_gateway_v1.postman_collection.json`
   - `postman/xpayr_gateway_v1.postman_environment.json`
2. Set environment variable `bearer_token` (`sk_test_...` or `sk_live_...`).
3. Call `GET /health` then `POST /payments`.
4. Configure webhook endpoint with `POST /webhooks`.

## Endpoint Groups
- Health: `GET /health`
- Payments: `POST /payments`, `GET /payments`, `GET /payments/{id}`, `POST /payments/{id}/complete`
- Merchant: `GET /me`, `GET /me/balance`, `POST /me/keys/regenerate`, `GET /me/networks`
- Agent Commerce: `POST /agents`, `PUT /agents/{agent_public_id}/policy`, `POST /agent-intents`, approval routes
- Webhooks: `POST /webhooks`, `GET /webhooks`, `POST /webhooks/test`, `DELETE /webhooks`

## Read in Order
- `docs/authentication.md`
- `docs/endpoints-index.md`
- `docs/payments.md`
- `docs/webhooks.md`
- `docs/plugins-integration.md`
- `docs/agent-commerce-mode.md`

## Security Check
Before publishing updates, run:

```bash
./scripts/scan-sensitive.sh
```

## License
All rights reserved unless a separate license file is added.
