<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagihan Telkom</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border: 1px solid #e0e0e0;
        }

        .header {
            background: linear-gradient(135deg, #e60012 0%, #b30010 100%);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .company-tagline {
            font-size: 12px;
            opacity: 0.9;
        }

        .invoice-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 8px;
            text-transform: uppercase;
        }

        .invoice-body {
            padding: 15px;
        }

        .contract-info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border-left: 3px solid #e60012;
            font-size: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .info-value {
            color: #333;
        }

        .package-section {
            background: #fff;
            border: 1px solid #e60012;
            border-radius: 4px;
            padding: 12px;
            margin-bottom: 15px;
        }

        .package-name {
            font-size: 14px;
            font-weight: bold;
            color: #e60012;
            margin-bottom: 5px;
        }

        .package-details {
            font-size: 11px;
            color: #666;
            margin-bottom: 10px;
        }

        .cost-table {
            width: 100%;
            font-size: 12px;
        }

        .cost-row {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
            border-bottom: 1px solid #eee;
        }

        .cost-row:last-child {
            border-bottom: none;
        }

        .discount-row {
            color: #28a745;
        }

        .total-payment {
            background: #e60012;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            margin-top: 10px;
        }

        .total-label {
            font-size: 12px;
            margin-bottom: 3px;
        }

        .total-amount {
            font-size: 18px;
            font-weight: bold;
        }

        .sender-info {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 11px;
        }

        .sender-title {
            font-size: 12px;
            font-weight: bold;
            color: #e60012;
            margin-bottom: 8px;
            text-align: center;
        }

        .contact-info {
            text-align: center;
            color: #666;
            line-height: 1.4;
        }

        @media screen and (max-width: 600px) {
            .invoice-container {
                width: 100% !important;
                margin: 0 !important;
            }
            
            .invoice-body {
                padding: 12px !important;
            }
            
            .header {
                padding: 12px !important;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <div class="company-name">TELKOM INDONESIA</div>
            <div class="company-tagline">The World in Your Hand</div>
            <div class="invoice-title">Tagihan Pembuatan Kontrak</div>
        </div>

        <div class="invoice-body">
            <div class="contract-info">
                <div class="info-row">
                    <span class="info-label">No. Contract:</span>
                    <span class="info-value">{{ $contract->number }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal Kontrak:</span>
                    <span class="info-value">{{ $contract->start_date }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Selesai Kontrak:</span>
                    <span class="info-value"> {{ $contract->end_date }} </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Company :</span>
                    <span class="info-value">{{ $contract->company->company_name }}</span>
                </div>
            </div>

            <div class="package-section">
                <div class="package-name">{{ $contract->produk->name }}</div>
                <div class="package-details">
                    {{ $contract->produk->description }}
                </div>

                <div class="cost-table">
                    <div class="cost-row">
                        <span>Biaya</span>
                        <span>Rp {{ $contract->produk->price }}</span>
                    </div>
                </div>

                <div class="total-payment">
                    <div class="total-label">TOTAL PEMBAYARAN</div>
                    <div class="total-amount">Rp {{ $contract->produk->price }}</div>
                </div>
            </div>

            <div class="sender-info">
                <div class="sender-title">INFORMASI PENGIRIM</div>
                <div class="contact-info">
                    <strong>PT Telkom Indonesia (Persero) Tbk</strong><br>
                    Divisi Regional VII Makassar<br>
                    Jl. A.P. Pettarani No. 1, Makassar 90222<br>
                    Telp: (0411) 123-4567 | Email: cs.makassar@telkom.co.id<br>
                    Call Center: 147 | WhatsApp: 0811-1000-147
                </div>
            </div>
        </div>
    </div>
</body>
</html>