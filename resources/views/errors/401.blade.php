<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .container h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Unauthorized Access</h1>
    <p>Sorry, you do not have permission to access this page.</p>
    <img src="https://i.ibb.co.com/GQM875Q/435721191-464842252537674-3792560383423134531-n.jpg" alt="Unauthorized Access Image">
    <br>
    <a href="{{ url('/') }}" class="btn">Go to Homepage</a>
</div>
</body>
</html>
