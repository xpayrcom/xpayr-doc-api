<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XPayr Merchant API v1 Documentation</title>
  <meta name="description"
    content="Official XPayr Merchant API v1 documentation with authentication, endpoints, request/response examples, and webhook signature verification.">
  <link rel="icon" type="image/png" href="/public/uploads/site/favicon_65838f8ff36a58ad.png">
  <link rel="apple-touch-icon" href="/public/uploads/site/favicon_65838f8ff36a58ad.png">
  <style>
    :root {
      --bg: #f5f7fb;
      --card: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --line: #e2e8f0;
      --brand: #029bfd;
      --brand-dark: #0289de;
      --code-bg: #0b1220;
      --code-text: #dbeafe;
      --ok: #16a34a;
      --warn: #d97706;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) {
        --bg: #070d18;
        --card: #0f172a;
        --text: #e5ecff;
        --muted: #94a3b8;
        --line: #1f2a44;
        --brand: #30a8ff;
        --brand-dark: #1697f8;
        --code-bg: #020617;
        --code-text: #dbeafe;
      }
    }

    html[data-theme="dark"] {
      --bg: #070d18;
      --card: #0f172a;
      --text: #e5ecff;
      --muted: #94a3b8;
      --line: #1f2a44;
      --brand: #30a8ff;
      --brand-dark: #1697f8;
      --code-bg: #020617;
      --code-text: #dbeafe;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background: linear-gradient(180deg, #f8fbff 0%, var(--bg) 100%);
      color: var(--text);
      font: 15px/1.55 "Inter", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) body {
        background: linear-gradient(180deg, #040812 0%, var(--bg) 100%);
      }
    }

    html[data-theme="dark"] body {
      background: linear-gradient(180deg, #040812 0%, var(--bg) 100%);
    }

    .wrap {
      max-width: 1120px;
      margin: 0 auto;
      padding: 32px 20px 60px;
    }

    .topbar {
      position: sticky;
      top: 0;
      z-index: 20;
      backdrop-filter: blur(8px);
      background: color-mix(in srgb, var(--card) 88%, transparent);
      border-bottom: 1px solid var(--line);
    }

    .topbar-inner {
      max-width: 1120px;
      margin: 0 auto;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }

    .brand {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      color: inherit;
      min-width: 0;
    }

    .brand-logo-wrap {
      display: inline-flex;
      align-items: center;
    }

    .brand-logo-dark,
    .brand-logo-light {
      height: 28px;
      width: auto;
      display: block;
    }

    .brand-logo-light {
      display: none;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .brand-logo-dark {
        display: none;
      }

      html:not([data-theme]) .brand-logo-light {
        display: block;
      }
    }

    html[data-theme="dark"] .brand-logo-dark {
      display: none;
    }

    html[data-theme="dark"] .brand-logo-light {
      display: block;
    }

    .brand-title {
      font-weight: 700;
      color: var(--text);
      white-space: nowrap;
    }

    .top-actions {
      display: inline-flex;
      gap: 8px;
      flex-wrap: wrap;
      justify-content: flex-end;
    }

    .api-status {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      border: 1px solid var(--line);
      border-radius: 10px;
      padding: 7px 10px;
      background: var(--card);
      font-size: 12px;
      font-weight: 700;
      color: #334155;
    }

    .api-status-dot {
      width: 8px;
      height: 8px;
      border-radius: 999px;
      background: #94a3b8;
      box-shadow: 0 0 0 3px rgba(148, 163, 184, 0.2);
    }

    .api-status.ok .api-status-dot {
      background: #22c55e;
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
    }

    .api-status.warn .api-status-dot {
      background: #f59e0b;
      box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .api-status {
        color: #cbd5e1;
      }
    }

    .top-link {
      display: inline-flex;
      align-items: center;
      border: 1px solid var(--line);
      border-radius: 10px;
      padding: 7px 10px;
      text-decoration: none;
      color: #334155;
      background: var(--card);
      font-size: 13px;
      font-weight: 600;
    }

    .icon-btn {
      width: 38px;
      height: 38px;
      justify-content: center;
      padding: 0;
      border-radius: 10px;
    }

    .icon-btn svg {
      width: 18px;
      height: 18px;
    }

    .top-link.primary {
      border-color: color-mix(in srgb, var(--brand) 55%, var(--line));
      color: #fff;
      background: linear-gradient(180deg, var(--brand) 0%, var(--brand-dark) 100%);
    }

    .theme-toggle {
      border: 1px solid var(--line);
      border-radius: 10px;
      background: var(--card);
      color: #334155;
      width: 38px;
      height: 38px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0;
      cursor: pointer;
    }

    .theme-toggle svg {
      width: 18px;
      height: 18px;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .theme-toggle {
        color: #cbd5e1;
      }
    }

    html[data-theme="dark"] .theme-toggle {
      color: #cbd5e1;
    }

    .top-link:hover {
      filter: brightness(0.98);
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .top-link {
        color: #cbd5e1;
      }

      html:not([data-theme]) .top-link.primary {
        color: #f8fbff;
      }
    }

    html[data-theme="dark"] .top-link {
      color: #cbd5e1;
    }

    html[data-theme="dark"] .top-link.primary {
      color: #f8fbff;
    }

    .hero {
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 16px;
      padding: 28px;
      box-shadow: 0 18px 45px rgba(2, 155, 253, 0.08);
      margin-bottom: 20px;
    }

    h1 {
      margin: 0 0 8px;
      font-size: 34px;
      line-height: 1.1;
    }

    h2 {
      margin: 0 0 10px;
      font-size: 24px;
    }

    h3 {
      margin: 0 0 8px;
      font-size: 18px;
    }

    p {
      margin: 0 0 10px;
      color: #334155;
    }

    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .02em;
      border: 1px solid var(--line);
      background: #f8fafc;
      color: #334155;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .badge {
        background: #0b1224;
        color: #cbd5e1;
      }
    }

    html[data-theme="dark"] .badge {
      background: #0b1224;
      color: #cbd5e1;
    }

    .grid {
      display: grid;
      grid-template-columns: 250px 1fr;
      gap: 16px;
      align-items: start;
    }

    .nav {
      position: sticky;
      top: 14px;
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 14px;
      padding: 12px;
    }

    .nav a {
      display: block;
      text-decoration: none;
      color: #334155;
      padding: 8px 10px;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 2px;
    }

    .nav a:hover {
      background: #eef6ff;
      color: #0f172a;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .nav a {
        color: #cbd5e1;
      }

      html:not([data-theme]) .nav a:hover {
        background: #0b1730;
        color: #e5ecff;
      }
    }

    html[data-theme="dark"] .nav a {
      color: #cbd5e1;
    }

    html[data-theme="dark"] .nav a:hover {
      background: #0b1730;
      color: #e5ecff;
    }

    .section {
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 14px;
      padding: 20px;
      margin-bottom: 14px;
    }

    .endpoint {
      border: 1px solid var(--line);
      border-radius: 12px;
      overflow: hidden;
      margin-top: 12px;
    }

    .endpoint-head {
      display: flex;
      gap: 10px;
      align-items: center;
      padding: 10px 12px;
      border-bottom: 1px solid var(--line);
      background: #f8fbff;
      flex-wrap: wrap;
    }

    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .endpoint-head {
        background: #0d162d;
      }

      html:not([data-theme]) .path {
        color: #e5ecff;
      }

      html:not([data-theme]) p {
        color: #cbd5e1;
      }
    }

    html[data-theme="dark"] .endpoint-head {
      background: #0d162d;
    }

    html[data-theme="dark"] .path {
      color: #e5ecff;
    }

    html[data-theme="dark"] p {
      color: #cbd5e1;
    }

    .method {
      font-size: 12px;
      font-weight: 800;
      border-radius: 8px;
      padding: 4px 8px;
      color: #fff;
    }

    .get {
      background: #0ea5e9;
    }

    .post {
      background: #16a34a;
    }

    .delete {
      background: #dc2626;
    }

    .path {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
      font-size: 13px;
      color: #0f172a;
    }

    .endpoint-body {
      padding: 12px;
    }

    pre {
      margin: 10px 0 0;
      padding: 13px;
      background: var(--code-bg);
      color: var(--code-text);
      border-radius: 10px;
      overflow: auto;
      border: 1px solid #1e293b;
      font-size: 13px;
      line-height: 1.45;
    }

    code {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    }

    .mini {
      font-size: 13px;
      color: var(--muted);
    }

    .pill-row {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 6px;
    }

    .pill {
      padding: 4px 8px;
      border-radius: 999px;
      background: #eff6ff;
      color: #1d4ed8;
      font-size: 12px;
      border: 1px solid #dbeafe;
    }

    .ok {
      color: var(--ok);
      font-weight: 700;
    }

    .warn {
      color: var(--warn);
      font-weight: 700;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid var(--line);
      border-radius: 10px;
      overflow: hidden;
      font-size: 13px;
      margin-top: 8px;
    }

    .table th,
    .table td {
      border-bottom: 1px solid var(--line);
      padding: 8px 10px;
      vertical-align: top;
      text-align: left;
    }

    .table th {
      background: #f8fafc;
      color: #475569;
      font-weight: 700;
    }

    .footer-note {
      margin-top: 18px;
      font-size: 12px;
      color: #64748b;
      text-align: center;
    }

    @media (max-width: 920px) {
      .grid {
        grid-template-columns: 1fr;
      }

      .nav {
        position: static;
      }

      h1 {
        font-size: 28px;
      }

      .topbar-inner {
        padding: 10px 14px;
      }

      .brand-title {
        display: none;
      }
    }
    .note-box {
      background: #f0fae6;
      border-left: 4px solid #84d635;
      padding: 12px 16px;
      margin: 20px 0;
      border-radius: 4px;
      font-size: 14px;
      line-height: 1.6;
      color: #1f2937;
    }
    @media (prefers-color-scheme: dark) {
      html:not([data-theme]) .note-box {
        background: rgba(34, 197, 94, 0.1);
        border-left: 4px solid #22c55e;
        color: #d1d5db;
      }
    }
    html[data-theme="dark"] .note-box {
      background: rgba(34, 197, 94, 0.1);
      border-left: 4px solid #22c55e;
      color: #d1d5db;
    }
  </style>
</head>

<body>
  <header class="topbar">
    <div class="topbar-inner">
      <a class="brand" href="https://xpayr.com/" aria-label="Go to XPayr website">
        <span class="brand-logo-wrap">
          <img class="brand-logo-dark" src="/public/assets/images/xpayr_logo_black.png" alt="XPayr">
          <img class="brand-logo-light" src="/public/assets/images/xpayr_logo_white.png" alt="XPayr">
        </span>
        <span class="brand-title">Merchant API v1</span>
      </a>
      <nav class="top-actions" aria-label="Quick navigation">
        <button id="themeToggle" class="theme-toggle" type="button" aria-label="Toggle dark/light mode"
          title="Toggle theme">
          <svg id="themeIconSun" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path
              d="M12 4V2M12 22v-2M4 12H2m20 0h-2M5.64 5.64 4.22 4.22m15.56 15.56-1.42-1.42M5.64 18.36l-1.42 1.42m15.56-15.56-1.42 1.42M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
              stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
          </svg>
          <svg id="themeIconMoon" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="display:none;">
            <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 1 0 9.79 9.79Z" stroke="currentColor" stroke-width="1.8"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
        <span id="apiStatusBadge" class="api-status" title="Live status from /api/v1/health">
          <span class="api-status-dot"></span>
          <span id="apiStatusText">API: Checking...</span>
        </span>
        <a class="top-link icon-btn" href="https://xpayr.com/" target="_blank" rel="noopener" aria-label="Back to site"
          title="Back to site">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M10 19 3 12l7-7M3 12h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </a>
        <a class="top-link icon-btn" href="https://xpayr.com/merchant/login" target="_blank" rel="noopener"
          aria-label="Merchant login" title="Merchant login">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" stroke="currentColor"
              stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
        <a class="top-link primary icon-btn" href="https://xpayr.com/merchant/register" target="_blank" rel="noopener"
          aria-label="Create merchant" title="Create merchant">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
          </svg>
        </a>
      </nav>
    </div>
  </header>
  <div class="wrap">
    <section class="hero">
      <span class="badge">Official Documentation</span>
      <h1>XPayr Merchant API v1</h1>
      <p>Production-ready reference for merchant integrations: authentication, payment session lifecycle, webhook
        delivery, and balance reporting.</p>
      <div class="pill-row">
        <span class="pill">Base URL: <code>https://xpayr.com/api/v1</code></span>
        <span class="pill">Auth: <code>Bearer sk_test_...</code> / <code>sk_live_...</code></span>
        <span class="pill">Format: JSON</span>
      </div>
    </section>

    <div class="grid">
      <aside class="nav">
        <a href="#quickstart">Quick Start</a>
        <a href="#auth">Authentication</a>
        <a href="#payments">Payments</a>
        <a href="#merchant">Merchant (Me)</a>
        <a href="#agent-commerce">AI Agent Commerce</a>
        <a href="#webhooks">Webhooks</a>
        <a href="#plugins">Plugins Integration</a>
        <a href="#errors">Errors</a>
        <a href="#examples">SDK-Style Examples</a>
      </aside>

      <main>
        <section class="section" id="quickstart">
          <h2>Quick Start</h2>
          <p class="mini">1) Generate keys from merchant panel: <code>/merchant/api-keys</code>. 2) Use
            <code>sk_test_...</code> in Authorization header. 3) Create payment session. 4) Complete session and consume
            webhook.
          </p>
          <pre><code>curl -X GET "https://xpayr.com/api/v1/health"</code></pre>
          <p class="mini"><span class="ok">Expected:</span> <code>{"status":"ok","version":"1.0.0" ...}</code></p>
        </section>

        <section class="section" id="auth">
          <h2>Authentication</h2>
          <p>All protected endpoints require an Authorization header.</p>
          <pre><code>Authorization: Bearer sk_test_redacted</code></pre>
          <table class="table">
            <thead>
              <tr>
                <th>Key</th>
                <th>Usage</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code>pk_test_...</code></td>
                <td>Public integrations</td>
                <td>Safe to expose where intended</td>
              </tr>
              <tr>
                <td><code>sk_test_...</code></td>
                <td>Server-side API</td>
                <td>Never expose on frontend</td>
              </tr>
              <tr>
                <td><code>pk_live_...</code></td>
                <td>Production public</td>
                <td>Generated in Live mode</td>
              </tr>
              <tr>
                <td><code>sk_live_...</code></td>
                <td>Production server-side API</td>
                <td>Store in secret manager</td>
              </tr>
            </tbody>
          </table>
        </section>

        <section class="section" id="payments">
          <h2>Payments</h2>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method post">POST</span><span class="path">/payments</span>
              <span class="mini">Create payment session</span>
            </div>
            <div class="endpoint-body">
              <p class="mini">Required: <code>amount</code>, <code>currency</code>, <code>network</code></p>
              <pre><code>{
  "amount": "9.99",
  "currency": "USDC",
  "network": "bsc-testnet",
  "order_id": "ORDER-1001",
  "description": "Test payment",
  "ipn_callback_url": "https://yourdomain.com/webhook/xpayr",
  "metadata": { "source": "api-doc" }
}</code></pre>
              <pre><code>{
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
}</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method get">GET</span><span class="path">/payments</span>
              <span class="mini">List sessions with pagination</span>
            </div>
            <div class="endpoint-body">
              <pre><code>GET /payments?page=1&limit=25&status=pending&network=bsc-testnet</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method get">GET</span><span class="path">/payments/{id}</span>
              <span class="mini">Fetch session details</span>
            </div>
            <div class="endpoint-body">
              <pre><code>GET /payments/ps_42f492dedc5b665b8511852de5ea0325</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method post">POST</span><span class="path">/payments/{id}/complete</span>
              <span class="mini">Confirm payment after chain tx</span>
            </div>
            <div class="endpoint-body">
              <p class="mini"><span class="warn">Note:</span> currently supports hosted checkout flow; tx fields
                required.</p>
              <pre><code>{
  "tx_hash": "0x1111111111111111111111111111111111111111111111111111111111111111",
  "from_address": "0x2222222222222222222222222222222222222222",
  "chain_id": 97
}</code></pre>
            </div>
          </article>
        </section>

        <section class="section" id="merchant">
          <h2>Merchant (Me)</h2>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method get">GET</span><span class="path">/me</span></div>
            <div class="endpoint-body">
              <p class="mini">Returns merchant profile, public keys, status, plan and wallet.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method get">GET</span><span class="path">/me/balance</span></div>
            <div class="endpoint-body">
              <p class="mini">Returns confirmed totals grouped by currency and network.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method post">POST</span><span
                class="path">/me/keys/regenerate</span></div>
            <div class="endpoint-body">
              <pre><code>{ "mode": "test" }</code></pre>
              <p class="mini">Response includes <code>secret_key</code> once. Save immediately.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method get">GET</span><span class="path">/me/networks</span></div>
            <div class="endpoint-body">
              <p class="mini">Returns network + currency catalog for current key mode. Plugins use this to build dynamic
                Network/Currency dropdowns.</p>
              <pre><code>{
  "object": "network_catalog",
  "data": [
    {
      "network_key": "bsc-testnet",
      "network_name": "BSC Testnet",
      "is_testnet": true,
      "currencies": [
        { "symbol": "USDC", "display_name": "USDC", "decimals": 18 },
        { "symbol": "USDT", "display_name": "USDT", "decimals": 18 }
      ]
    }
  ],
  "livemode": false
}</code></pre>
            </div>
          </article>
        </section>

        <section class="section" id="agent-commerce">
          <h2>AI Agent Commerce</h2>
          <p class="mini">Policy-driven bot payment flow for merchant-controlled agent transactions.</p>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method post">POST</span><span class="path">/agents</span>
              <span class="mini">Create agent identity + one-time secret key</span>
            </div>
            <div class="endpoint-body">
              <pre><code>{
  "name": "Auto Buyer Bot",
  "description": "Top-up automation",
  "mode": "test"
}</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method put">PUT</span><span class="path">/agents/{agent_public_id}/policy</span>
              <span class="mini">Configure limits + dynamic rule_set</span>
            </div>
            <div class="endpoint-body">
              <pre><code>{
  "allowed_tokens": ["USDT"],
  "allowed_networks": ["tron"],
  "max_tx_amount": 100,
  "daily_limit_amount": 500,
  "approval_threshold_amount": 50,
  "rule_set": [
    {
      "id": "block_high_risk",
      "priority": 10,
      "action": "reject",
      "categories": ["high_risk"],
      "reason_code": "blocked_high_risk_category"
    }
  ]
}</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method post">POST</span><span class="path">/agent-intents</span>
              <span class="mini">Runtime endpoint for agent keys (<code>ag_test_*</code>/<code>ag_live_*</code>)</span>
            </div>
            <div class="endpoint-body">
              <pre><code>{
  "amount": 20,
  "token": "USDT",
  "network": "tron",
  "target_ref": "order_123",
  "category": "normal"
}</code></pre>
              <pre><code>{
  "object": "agent_intent_decision",
  "data": {
    "intent_id": "agi_xxx",
    "decision": "pending_approval",
    "reason_code": "manual_approval_required",
    "next_step": "awaiting_merchant_approval"
  }
}</code></pre>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method post">POST</span><span class="path">/agent-approvals/{intent_id}/approve</span>
              <span class="mini">Approve and optionally auto-bridge to payment session</span>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head">
              <span class="method get">GET</span><span class="path">/agent-intents/summary</span>
              <span class="mini">Agent / intent / approval metrics summary</span>
            </div>
          </article>

          <p class="mini">Full reference: <a href="/doc-api/agent-commerce-mode.md" target="_blank" rel="noopener">/doc-api/agent-commerce-mode.md</a></p>
        </section>

        <section class="section" id="webhooks">
          <h2>Webhooks & IPN</h2>
          <p>Use webhooks for real-time payment status updates.</p>

          <div class="note-box">
            <strong style="color:inherit;">🚀 Multi-Store & Dynamic Webhooks (Recommended)</strong><br>
            Instead of using a single global webhook URL, you can send an <code>ipn_callback_url</code> parameter when
            creating a payment session (<code>POST /payments</code>).
            If provided, XPayr will <strong>override</strong> your global webhook URL and send the IPN directly to this
            dynamic callback address.
            This allows a single Merchant Account to be used flawlessly across multiple websites (WooCommerce, Shopware,
            custom sites, etc.) simultaneously without webhook collisions.
          </div>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method post">POST</span><span class="path">/webhooks</span></div>
            <div class="endpoint-body">
              <pre><code>{ "url": "https://yourdomain.com/webhooks/xpayr" }</code></pre>
              <p class="mini">URL must be HTTPS. Returns a webhook secret once.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method get">GET</span><span class="path">/webhooks</span></div>
            <div class="endpoint-body">
              <p class="mini">Returns masked secret and supported event names.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method post">POST</span><span class="path">/webhooks/test</span>
            </div>
            <div class="endpoint-body">
              <p class="mini">Sends test payload to configured URL and stores delivery log.</p>
            </div>
          </article>

          <article class="endpoint">
            <div class="endpoint-head"><span class="method delete">DELETE</span><span class="path">/webhooks</span>
            </div>
            <div class="endpoint-body">
              <p class="mini">Removes webhook URL and secret.</p>
            </div>
          </article>

          <h3 style="margin-top:14px;">Signature Verification (PHP)</h3>
          <pre><code>$payload = file_get_contents('php://input');
$header = $_SERVER['HTTP_X_XPAYR_SIGNATURE'] ?? '';
$secret = getenv('XPAYR_WEBHOOK_SECRET'); // from POST /webhooks response

$expected = 'sha256=' . hash_hmac('sha256', $payload, $secret);
if (!hash_equals($expected, $header)) {
    http_response_code(401);
    exit('Invalid signature');
}

http_response_code(200);
echo 'ok';</code></pre>
        </section>

        <section class="section" id="plugins">
          <h2>Plugins Integration</h2>
          <p>Use these patterns for WooCommerce, PrestaShop, OpenCart, Magento 2, Shopware 6, and Zen Cart modules.</p>

          <h3 style="margin-top:14px;">Plugin Quickstart</h3>
          <p class="mini">1) Generate <code>sk_test_...</code> / <code>sk_live_...</code> key. 2) Pull dynamic catalog
            via <code>GET /me/networks</code>. 3) Create checkout via <code>POST /payments</code>. 4) Register callback
            via <code>POST /webhooks</code>. 5) Verify signature and map event status.</p>

          <h3 style="margin-top:14px;">Recommended Callback URLs</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Platform</th>
                <th>Callback URL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>WooCommerce</td>
                <td><code>https://&lt;domain&gt;/?wc-api=wc_gateway_xpayr</code></td>
              </tr>
              <tr>
                <td>PrestaShop</td>
                <td><code>https://&lt;domain&gt;/module/xpayr/ipn</code></td>
              </tr>
              <tr>
                <td>OpenCart</td>
                <td><code>https://&lt;domain&gt;/index.php?route=extension/payment/xpayr/callback</code></td>
              </tr>
              <tr>
                <td>Magento 2</td>
                <td><code>https://&lt;domain&gt;/rest/V1/xpayr/ipn</code></td>
              </tr>
              <tr>
                <td>Shopware 6</td>
                <td><code>https://&lt;domain&gt;/api/xpayr/payment/notify</code></td>
              </tr>
              <tr>
                <td>Zen Cart</td>
                <td><code>https://&lt;domain&gt;/ipn_xpayr.php</code></td>
              </tr>
            </tbody>
          </table>

          <h3 style="margin-top:14px;">Canonical Create Session Payload</h3>
          <pre><code>{
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
}</code></pre>

          <h3 style="margin-top:14px;">Canonical Webhook Payload</h3>
          <pre><code>{
  "id": "evt_xxxxxxxxxxxxx",
  "type": "payment.completed",
  "created": 1760000000,
  "livemode": false,
  "data": {
    "object": "payment_session",
    "session_id": "ps_42f492dedc5b665b8511852de5ea0325",
    "invoice_id": 6265178012,
    "status": "completed",
    "amount": "49.90",
    "currency": "USDC",
    "network": "bsc-testnet",
    "tx_hash": "0x1111...",
    "from_address": "0x2222...",
    "metadata": {
      "source": "woocommerce",
      "order_id": "WOO-100045"
    }
  }
}</code></pre>

          <h3 style="margin-top:14px;">Signature Verification</h3>
          <pre><code>// Header:
// X-XPayr-Signature: sha256=&lt;hmac&gt;

$raw = file_get_contents('php://input');
$header = $_SERVER['HTTP_X_XPAYR_SIGNATURE'] ?? '';
$header = preg_replace('/^sha256=/', '', $header);
$expected = hash_hmac('sha256', $raw, $webhookSecret);

if (!hash_equals($expected, $header)) {
  http_response_code(401);
  exit('invalid signature');
}</code></pre>

          <h3 style="margin-top:14px;">Event Mapping (Recommended)</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Event</th>
                <th>Target status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code>payment.completed</code>, <code>payment.confirmed</code></td>
                <td>Paid / Processing / Completed</td>
              </tr>
              <tr>
                <td><code>payment.pending</code>, <code>payment.processing</code></td>
                <td>Pending (keep order open)</td>
              </tr>
              <tr>
                <td><code>payment.failed</code></td>
                <td>Failed</td>
              </tr>
              <tr>
                <td><code>payment.expired</code></td>
                <td>Cancelled / Expired</td>
              </tr>
            </tbody>
          </table>

          <h3 style="margin-top:14px;">Fallback Sync & Idempotency</h3>
          <ul class="mini" style="padding-left:18px;">
            <li>If webhook delivery fails, query <code>GET /payments/{id}</code> using stored <code>session_id</code>.
            </li>
            <li>Store <code>session_id</code> and <code>invoice_id</code> on order/invoice meta at create time.</li>
            <li>Before marking paid, check transaction id / session to avoid duplicate settlement.</li>
            <li>Treat webhook callbacks as retryable; always return 2xx only after durable write.</li>
          </ul>
        </section>

        <section class="section" id="errors">
          <h2>Error Format</h2>
          <pre><code>{
  "error": {
    "code": "validation_error",
    "message": "Missing required field: amount"
  }
}</code></pre>
          <table class="table">
            <thead>
              <tr>
                <th>HTTP</th>
                <th>Code</th>
                <th>Meaning</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>400</td>
                <td><code>validation_error</code></td>
                <td>Invalid or missing payload field</td>
              </tr>
              <tr>
                <td>401</td>
                <td><code>authentication_required</code>, <code>invalid_api_key</code></td>
                <td>Auth missing/invalid</td>
              </tr>
              <tr>
                <td>404</td>
                <td><code>not_found</code></td>
                <td>Resource not found</td>
              </tr>
              <tr>
                <td>422</td>
                <td><code>webhook_delivery_failed</code> style</td>
                <td>Business action failed</td>
              </tr>
              <tr>
                <td>500</td>
                <td><code>database_error</code>, <code>server_error</code></td>
                <td>Unhandled server issue</td>
              </tr>
            </tbody>
          </table>
        </section>

        <section class="section" id="examples">
          <h2>SDK-Style Examples</h2>

          <h3>JavaScript (Node / Fetch)</h3>
          <pre><code>const baseUrl = 'https://xpayr.com/api/v1';
const secretKey = process.env.XPAYR_SECRET_KEY; // sk_test_...

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
console.log(data);</code></pre>

          <h3>PHP (cURL)</h3>
          <pre><code>$ch = curl_init('https://xpayr.com/api/v1/payments');
curl_setopt_array($ch, [
  CURLOPT_POST => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $secretKey
  ],
  CURLOPT_POSTFIELDS => json_encode([
    'amount' => '19.99',
    'currency' => 'USDC',
    'network' => 'bsc-testnet'
  ])
]);
$response = curl_exec($ch);
curl_close($ch);
echo $response;</code></pre>
        </section>

        <p class="footer-note">2026 © XPayr • API v1 docs hosted at <code>/doc-api</code></p>
      </main>
    </div>
  </div>
  <script>
    (function () {
      const html = document.documentElement;
      const toggle = document.getElementById('themeToggle');
      const sun = document.getElementById('themeIconSun');
      const moon = document.getElementById('themeIconMoon');
      const getSystemDark = () => window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      const applyTheme = (theme) => {
        if (theme === 'light' || theme === 'dark') {
          html.setAttribute('data-theme', theme);
        } else {
          html.removeAttribute('data-theme');
        }
        const effectiveDark = theme ? theme === 'dark' : getSystemDark();
        if (sun && moon) {
          sun.style.display = effectiveDark ? 'none' : 'block';
          moon.style.display = effectiveDark ? 'block' : 'none';
        }
      };

      const saved = localStorage.getItem('xpayr_doc_theme');
      applyTheme(saved);

      if (toggle) {
        toggle.addEventListener('click', function () {
          const current = html.getAttribute('data-theme');
          const effectiveDark = current ? current === 'dark' : getSystemDark();
          const next = effectiveDark ? 'light' : 'dark';
          localStorage.setItem('xpayr_doc_theme', next);
          applyTheme(next);
        });
      }
    })();

    (async function () {
      const badge = document.getElementById('apiStatusBadge');
      const text = document.getElementById('apiStatusText');
      if (!badge || !text) return;

      try {
        const res = await fetch('/api/v1/health', { method: 'GET', cache: 'no-store' });
        if (!res.ok) {
          throw new Error('Health endpoint failed');
        }
        const data = await res.json();
        if (data && data.status === 'ok') {
          badge.classList.add('ok');
          text.textContent = 'API: Operational';
          return;
        }
        badge.classList.add('warn');
        text.textContent = 'API: Degraded';
      } catch (e) {
        badge.classList.add('warn');
        text.textContent = 'API: Degraded';
      }
    })();
  </script>
</body>

</html>
