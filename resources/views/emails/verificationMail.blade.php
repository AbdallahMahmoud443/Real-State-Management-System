<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Mail</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 50vw;
            height: 30vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            background-color: #f5f6fa;
            border-radius: 10px;
            margin-top: 100px;


        }

        .container a {
            text-decoration: none;
            background-color: #2d3436;
            padding: 20px 10px;
            color: #dfe6e9;

        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verification Email</h2>
        <p>{{ $body['message'] }}</p>
        <a href="{{ $body['link'] }}" class="btn btn-lg btn-dark">Complete Verification</a>
    </div>
</body>

</html>
