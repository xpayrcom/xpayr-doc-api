# Authentication

XPayr API v1 uses Bearer authentication for protected endpoints.

## Header

```http
Authorization: Bearer sk_test_redacted
```

## Key Types
- `pk_test_...`: test mode public key.
- `sk_test_...`: test mode server-side secret.
- `pk_live_...`: live mode public key.
- `sk_live_...`: live mode server-side secret.
- `ag_test_...` / `ag_live_...`: agent runtime keys for `POST /agent-intents`.

## Basic Call

```bash
curl -X GET "https://xpayr.com/api/v1/me" \
  -H "Authorization: Bearer $XPAYR_SECRET_KEY"
```

## Practices
- Keep secret keys server-side only.
- Use separate test/live keys.
- Rotate keys periodically with `POST /me/keys/regenerate`.
- Never commit keys to repositories.
