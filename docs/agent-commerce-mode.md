# Agent Commerce Mode (Phase 2)

## 1. Run Migration
Open once in browser (or run with curl):
- `/merchant/migrate_agent_commerce.php`

## 2. Create Agent
`POST /api/v1/agents`

Headers:
- `Authorization: Bearer sk_test_xxx`
- `Content-Type: application/json`

Body example:
```json
{
  "name": "Auto Buyer Bot",
  "description": "Top-up automation",
  "mode": "test"
}
```

## 3. Set Policy
`PUT /api/v1/agents/{agent_public_id}/policy`

Body example:
```json
{
  "allowed_tokens": ["USDC", "USDT"],
  "allowed_networks": ["polygon", "base"],
  "max_tx_amount": 50,
  "daily_limit_amount": 300,
  "approval_threshold_amount": 40,
  "min_interval_seconds": 60,
  "timezone": "UTC",
  "rule_set": [
    {
      "id": "high_risk_category",
      "priority": 10,
      "action": "manual_review",
      "categories": ["high_risk"],
      "reason_code": "category_manual_review"
    },
    {
      "id": "block_large_usdt_on_tron",
      "priority": 20,
      "action": "reject",
      "tokens": ["USDT"],
      "networks": ["tron"],
      "min_amount": 500,
      "reason_code": "rule_block_large_usdt_tron"
    }
  ]
}
```

`rule_set` supports:
- `action`: `allow`, `reject`, `manual_review`
- `conditions`: `tokens`, `networks`, `categories`, `target_refs`, `target_prefixes`, `min_amount`, `max_amount`
- `overrides`: `max_tx_amount`, `daily_limit_amount`, `min_interval_seconds`, `approval_threshold_amount`

## 4. Submit Agent Intent
`POST /api/v1/agent-intents`

Headers:
- `Authorization: Bearer ag_test_xxx`
- `Content-Type: application/json`

Body example:
```json
{
  "amount": 25,
  "token": "USDC",
  "network": "polygon",
  "target_ref": "merchant_product_123",
  "category": "subscriptions"
}
```

## 5. Decision States
- `approved`
- `pending_approval`
- `rejected`

`reason_code` is returned for every blocked/pending case.

## 6. Merchant Intent Logs
`GET /api/v1/agent-intents?status=pending_approval&page=1&limit=25`

Headers:
- `Authorization: Bearer sk_test_xxx`

## 7. Intent Detail
`GET /api/v1/agent-intents/{intent_id}`

## 8. Approval Queue List
`GET /api/v1/agent-approvals?status=pending&page=1&limit=25`

## 9. Approve Pending Intent (Auto Bridge)
`POST /api/v1/agent-approvals/{intent_id}/approve`

Body example:
```json
{
  "notes": "Looks valid",
  "auto_bridge": true,
  "bridge_overrides": {
    "success_url": "https://example.com/success",
    "cancel_url": "https://example.com/cancel"
  }
}
```

If `auto_bridge=true`, response includes created `payment_session_id` and `payment_url`.

## 10. Reject Pending Intent
`POST /api/v1/agent-approvals/{intent_id}/reject`

Body example:
```json
{
  "notes": "Amount not acceptable for this vendor"
}
```

## 11. Manual Bridge for Approved Intent
`POST /api/v1/agent-intents/{intent_id}/bridge`

Use this if intent is already `approved` and you want to create payment session later.

## 12. Summary Metrics
`GET /api/v1/agent-intents/summary`

Alternative alias:
- `GET /api/v1/agent-approvals/summary`

Returns:
- agent totals (active/paused/revoked)
- intent totals and execution rate
- approval queue totals and average approval seconds
