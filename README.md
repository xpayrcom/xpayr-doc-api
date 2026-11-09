<div align="center">
  <a href="https://xpayr.com">
    <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://xpayr.com/public/images/xpayr-logo-white.png" />
      <source media="(prefers-color-scheme: light)" srcset="https://xpayr.com/public/images/xpayr-logo-black.png" />
      <img src="https://xpayr.com/public/images/xpayr-logo-white.png" alt="XPayr Official Logo" width="220" />
    </picture>
  </a>
  <p>
    <a href="https://xpayr.com"><img src="https://xpayr.com/partner-badge.php?type=powered_by&theme=dark" alt="Powered by XPayr" height="28" /></a>
    <a href="https://mcp.xpayr.com"><img src="https://img.shields.io/badge/MCP_Portal-mcp.xpayr.com-029bfd?style=for-the-badge" alt="XPayr MCP Portal" height="28" /></a>
    <a href="https://docs.xpayr.com"><img src="https://img.shields.io/badge/Docs-docs.xpayr.com-10b981?style=for-the-badge" alt="XPayr Docs" height="28" /></a>
    <a href="https://www.npmjs.com/package/@xpayr/mcp-server"><img src="https://img.shields.io/npm/v/@xpayr/mcp-server?style=for-the-badge&color=cb3837&label=MCP%20NPM" alt="NPM @xpayr/mcp-server" height="28" /></a>
  </p>
  <p>
    <a href="https://xpayr.com"><b>Official Website</b></a> •
    <a href="https://mcp.xpayr.com"><b>AI &amp; MCP Portal (21 Tools)</b></a> •
    <a href="https://docs.xpayr.com"><b>Developer Docs</b></a> •
    <a href="https://xpayr.com/developers"><b>Developer Hub</b></a> •
    <a href="https://xpayr.com/tools/crypto-payment-fee-calculator"><b>0.5% Fee Calculator</b></a>
  </p>
</div>

---

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
