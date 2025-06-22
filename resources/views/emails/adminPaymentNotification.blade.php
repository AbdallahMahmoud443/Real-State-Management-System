<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Package Purchase</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #2d3436;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-body {
            padding: 30px;
        }

        .notification-badge {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .message {
            margin-bottom: 25px;
        }

        .agent-details {
            background-color: #f5f6fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .agent-details h2 {
            margin-top: 0;
            font-size: 18px;
            color: #2d3436;
            border-bottom: 1px solid #dfe6e9;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #636e72;
        }

        .detail-value {
            text-align: right;
        }

        .order-details {
            background-color: #f5f6fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .order-details h2 {
            margin-top: 0;
            font-size: 18px;
            color: #2d3436;
            border-bottom: 1px solid #dfe6e9;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .package-details {
            margin-top: 20px;
            border: 1px solid #dfe6e9;
            border-radius: 6px;
            overflow: hidden;
        }

        .package-header {
            background-color: #f5f6fa;
            padding: 10px 15px;
            font-weight: 600;
            border-bottom: 1px solid #dfe6e9;
        }

        .package-body {
            padding: 15px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 18px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #dfe6e9;
        }

        .cta-button {
            display: inline-block;
            background-color: #2d3436;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 10px;
        }

        .email-footer {
            background-color: #f5f6fa;
            padding: 20px;
            text-align: center;
            color: #636e72;
            font-size: 14px;
            border-top: 1px solid #dfe6e9;
        }

        .contact-info {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>New Package Purchase</h1>
        </div>
        <div class="email-body">
            <div class="notification-badge">New Purchase</div>
            <div class="message">
                <p>A new package has been purchased by an agent. Here are the details:</p>
            </div>

            <div class="agent-details">
                <h2>Agent Information</h2>
                <div class="detail-row">
                    <div class="detail-label">Agent Name:</div>
                    <div class="detail-value">{{ $body['agent_name'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Agent Email:</div>
                    <div class="detail-value">{{ $body['agent_email'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Agent ID:</div>
                    <div class="detail-value">{{ $body['agent_id'] }}</div>
                </div>
            </div>

            <div class="order-details">
                <h2>Order Summary</h2>
                <div class="detail-row">
                    <div class="detail-label">Order ID:</div>
                    <div class="detail-value">{{ $body['order_id'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Transaction ID:</div>
                    <div class="detail-value">{{ $body['transaction_id'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Payment Method:</div>
                    <div class="detail-value">{{ $body['payment_method'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Purchase Date:</div>
                    <div class="detail-value">{{ $body['purchase_date'] }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Expiration Date:</div>
                    <div class="detail-value">{{ $body['expire_date'] }}</div>
                </div>

                <div class="package-details">
                    <div class="package-header">Package Details</div>
                    <div class="package-body">
                        <div class="detail-row">
                            <div class="detail-label">Package Name:</div>
                            <div class="detail-value">{{ $body['package_name'] }}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Status:</div>
                            <div class="detail-value">{{ $body['status'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="total-row">
                    <div>Total Amount:</div>
                    <div>${{ $body['paid_amount'] }}</div>
                </div>
            </div>

            <p>You can view all orders and manage packages by clicking the button below:</p>
            <a href="{{ $body['admin_dashboard_link'] }}" class="cta-button">View Admin Dashboard</a>
        </div>
        <div class="email-footer">
            <p>This is an automated notification from the Real Estate Management System.</p>
            <div class="contact-info">
                © {{ date('Y') }} Real Estate Management System. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>
