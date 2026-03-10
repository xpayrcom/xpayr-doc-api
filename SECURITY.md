# Security Policy

## Supported Scope
This repository contains public integration documentation and sample API assets.

## Reporting a Vulnerability
If you find a security issue in examples or docs that could mislead secure integration:
- Do not publish exploit details publicly.
- Report privately to: `security@xpayr.com`
- Include reproduction steps and impact summary.

## Secret Handling
Never commit:
- API keys (`sk_*`, `pk_*`)
- webhook secrets
- tokens, cookies, or session identifiers
- real customer/order/payment data
