# Merchant Endpoints

## Get Merchant Profile
`GET /me`

Returns merchant profile, status, wallet, mode, and public key fields.

## Get Balance Summary
`GET /me/balance`

Returns confirmed totals grouped by token/network.

## Regenerate API Key
`POST /me/keys/regenerate`

Example body:

```json
{ "mode": "test" }
```

Response includes the new `secret_key` once. Save immediately.

## Get Dynamic Network Catalog
`GET /me/networks`

Used by plugins and custom checkouts to render allowed network/token dropdowns based on current key mode.

Example response excerpt:

```json
{
  "object": "network_catalog",
  "data": [
    {
      "network_key": "bsc-testnet",
      "currencies": [
        { "symbol": "USDC", "decimals": 18 },
        { "symbol": "USDT", "decimals": 18 }
      ]
    }
  ],
  "livemode": false
}
```
