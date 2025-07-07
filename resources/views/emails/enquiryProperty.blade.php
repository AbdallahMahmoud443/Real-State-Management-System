<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }

        .content h2 {
            color: #007bff;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table th,
        .info-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .info-table th {
            background-color: #f2f2f2;
            width: 30%;
        }

        .message {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin-top: 20px;
            font-style: italic;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Property Enquiry</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>You have received a new enquiry for the property <strong>{{ $property->title }}</strong>. Please find the
                details of the interested party below.</p>

            <h2>Enquiry Details</h2>
            <table class="info-table">
                <tr>
                    <th>Property</th>
                    <td><a href="{{ route('property.details', $property->slug) }}">{{ $property->title }}</a></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $data['phone'] }}</td>
                </tr>
            </table>

            <h2>Message</h2>
            <div class="message">
                <p>{{ $data['message'] }}</p>
            </div>

            <p>Please respond to the enquiry at your earliest convenience.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Real-state-Management. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
