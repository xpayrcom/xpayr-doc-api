#!/usr/bin/env bash
set -euo pipefail

# Basic local guardrail for accidental secret commits in docs/examples.
patterns=(
  "sk_(live|test)_[A-Za-z0-9]{24,}"
  "pk_(live|test)_[A-Za-z0-9]{24,}"
  "BEGIN (RSA|EC|OPENSSH) PRIVATE KEY"
  "AKIA[0-9A-Z]{16}"
)

fail=0
for p in "${patterns[@]}"; do
  if rg -n --hidden -g '!.git' -g '!scripts/scan-sensitive.sh' -e "$p" . >/dev/null 2>&1; then
    echo "Potential sensitive pattern found: $p"
    rg -n --hidden -g '!.git' -g '!scripts/scan-sensitive.sh' -e "$p" . || true
    fail=1
  fi
done

if [[ $fail -ne 0 ]]; then
  echo "Sensitive scan failed. Remove or redact findings."
  exit 1
fi

echo "Sensitive scan passed."
