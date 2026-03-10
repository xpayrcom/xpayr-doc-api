# Endpoints Index

## Health
- `GET /health`: service health check.

## Payments
- `POST /payments`: create payment session.
- `GET /payments`: list sessions with filters and pagination.
- `GET /payments/{id}`: fetch one session.
- `POST /payments/{id}/complete`: confirm payment with on-chain tx details.

## Merchant
- `GET /me`: merchant profile and key mode information.
- `GET /me/balance`: confirmed totals by token/network.
- `POST /me/keys/regenerate`: rotate API key for test/live mode.
- `GET /me/networks`: token and network catalog for current key mode.

## AI Agent Commerce
- `POST /agents`: create agent identity and one-time agent secret.
- `PUT /agents/{agent_public_id}/policy`: set policy rules and limits.
- `POST /agent-intents`: submit agent transaction intent (`ag_test_*` / `ag_live_*`).
- `GET /agent-intents`: list intents.
- `GET /agent-intents/{intent_id}`: fetch intent detail.
- `POST /agent-approvals/{intent_id}/approve`: approve pending intent.
- `POST /agent-approvals/{intent_id}/reject`: reject pending intent.
- `POST /agent-intents/{intent_id}/bridge`: bridge approved intent to payment session.
- `GET /agent-intents/summary`: intent and approval metrics.
- `GET /agent-approvals/summary`: alias summary endpoint.

## Webhooks
- `POST /webhooks`: register webhook URL and generate secret.
- `GET /webhooks`: fetch current webhook config.
- `POST /webhooks/test`: send test callback.
- `DELETE /webhooks`: remove URL and secret.
