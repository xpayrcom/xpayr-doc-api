const baseUrl = process.env.XPAYR_API_BASE_URL || 'https://xpayr.com/api/v1';
const secretKey = process.env.XPAYR_SECRET_KEY;

if (!secretKey) {
  throw new Error('Missing XPAYR_SECRET_KEY');
}

const payload = {
  amount: '19.99',
  currency: 'USDC',
  network: 'bsc-testnet',
  metadata: { order_id: 'ORDER-2026-001' },
};

const run = async () => {
  const res = await fetch(`${baseUrl}/payments`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      Authorization: `Bearer ${secretKey}`,
    },
    body: JSON.stringify(payload),
  });

  const json = await res.json();
  console.log(JSON.stringify(json, null, 2));
};

run().catch((err) => {
  console.error(err.message || err);
  process.exit(1);
});
