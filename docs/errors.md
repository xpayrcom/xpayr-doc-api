# Errors

## Standard Error Object

```json
{
  "error": {
    "code": "validation_error",
    "message": "Missing required field: amount"
  }
}
```

## Common HTTP Codes
- `400`: `validation_error` (invalid or missing payload field)
- `401`: `authentication_required`, `invalid_api_key`
- `404`: `not_found`
- `422`: business operation failure (for example webhook delivery failures)
- `500`: `database_error`, `server_error`
