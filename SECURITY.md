# Security Policy

## Reporting a vulnerability

Do not disclose suspected vulnerabilities in a public issue.

Use the [XPayr contact form](https://xpayr.com/contact) and include the repository name, affected document, version or commit, reproduction steps, and impact. Do not include private keys, seed phrases, live API keys, customer data, or unredacted production logs.

## Secret handling

- Use redacted placeholders in examples and screenshots.
- Never commit API keys (`sk_*`, `pk_*`), webhook secrets, tokens, cookies, session identifiers, or real customer, order, or payment data.
- Keep production-only implementation details out of public documentation issues.

This repository contains public documentation and sample assets. It does not authorize production access, hold merchant funds, or replace server-side webhook verification and payment-state checks.
