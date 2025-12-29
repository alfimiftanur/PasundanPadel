<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Detail - Pasundan Padel</title>
    <style>
        .page {
            max-width: 794px;
            min-height: 1123px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px;
            box-sizing: border-box;
        }


        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #1f2937;
            margin: 0;
            padding: 0;
            background: #eef2f3;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: #ffffff;
            padding: 22mm;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #0f766e;
            padding-bottom: 16px;
            margin-bottom: 28px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            color: #0f766e;
            letter-spacing: .5px;
        }

        .meta {
            text-align: right;
            font-size: 10px;
            color: #64748b;
            line-height: 1.4;
        }

        .status {
            display: inline-block;
            margin-top: 8px;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 600;
        }

        .status.upcoming {
            background: #fde68a;
            color: #92400e;
        }

        .status.confirmed {
            background: #bbf7d0;
            color: #166534;
        }

        .status.completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .status.cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .section {
            margin-bottom: 26px;
        }

        .section h2 {
            margin: 0 0 12px;
            font-size: 14px;
            color: #0f766e;
        }

        .card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
            background: #f9fafb;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .label {
            font-size: 10px;
            color: #6b7280;
        }

        .value {
            font-weight: 600;
        }

        .grid {
            display: flex;
            gap: 18px;
        }

        .grid .card {
            flex: 1;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 11px;
        }

        .divider {
            border-top: 1px dashed #d1d5db;
            margin: 14px 0;
        }

        .total {
            font-size: 15px;
            font-weight: 700;
            color: #2563eb;
        }

        .badge {
            display: inline-block;
            padding: 5px 14px;
            font-size: 10px;
            border-radius: 999px;
            font-weight: 600;
        }

        .badge.unpaid {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge.paid {
            background: #bbf7d0;
            color: #166534;
        }

        .badge.pending {
            background: #fde68a;
            color: #92400e;
        }

        .footer {
            margin-top: 30px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9px;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="header">
            <div>
                <h1>Booking Detail</h1>
                <div class="status completed">Completed</div>
            </div>
            <div class="meta"> Booking #002<br> Printed on December 29, 2025 · 11:03 </div>
        </div>
        <div class="section">
            <h2>Customer Information</h2>
            <div class="card">
                <div class="row">
                    <div class="label">Name</div>
                    <div class="value">menbehave</div>
                </div>
                <div class="row">
                    <div class="label">Email</div>
                    <div class="value">jay@mail.com</div>
                </div>
                <div class="row">
                    <div class="label">Phone</div>
                    <div class="value">087705991787</div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="grid">
                <div class="card">
                    <h2>Court</h2>
                    <div class="row">
                        <div class="label">Court Name</div>
                        <div class="value">Philanthropy</div>
                    </div>
                    <div class="row">
                        <div class="label">Notes</div>
                        <div class="value">cj</div>
                    </div>
                </div>
                <div class="card">
                    <h2>Schedule</h2>
                    <div class="row">
                        <div class="label">Date</div>
                        <div class="value">29 December 2025</div>
                    </div>
                    <div class="row">
                        <div class="label">Time</div>
                        <div class="value">18:00 – 19:00 WIB</div>
                    </div>
                    <div class="row">
                        <div class="label">Duration</div>
                        <div class="value">1 Hour</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <h2>Payment Summary</h2>
            <div class="card">
                <div class="payment-row"> <span>Price / Hour</span> <strong>Rp 10,000</strong> </div>
                <div class="payment-row"> <span>Duration</span> <strong>1 Hour</strong> </div>
                <div class="divider"></div>
                <div class="payment-row total"> <span>Total</span> <span>Rp 10,000</span> </div>
                <div class="payment-row" style="margin-top:10px;"> <span>Payment Status</span> <span
                        class="badge paid">Paid</span> </div>
            </div>
        </div>
        <div class="footer"> This booking detail was generated automatically by Pasundan Padel Management System<br>
            © 2025 Pasundan Padel </div>
    </div>
</body>

</html>
