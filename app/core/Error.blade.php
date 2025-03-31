<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error {{ $code }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #2c3e50;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }


        .error-code {
            font-size: 10rem;
            font-weight: 600;
            animation: pulse 1.5s infinite alternate;
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 0;
            line-height: 1;
            color: #e74c3c;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .error-message {
            font-size: 1.5rem;
            margin: 1.5rem 0;
            color: #ecf0f1;
        }

        .btn-custom {
            background: #3498db;
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 50px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background: #2980b9;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

        .particle:nth-child(1) {
            width: 25px;
            height: 25px;
            left: 10%;
            top: 70%;
            animation-delay: 0s;
            animation-duration: 20s;
        }

        .particle:nth-child(2) {
            width: 15px;
            height: 15px;
            left: 20%;
            top: 20%;
            animation-delay: 2s;
            animation-duration: 18s;
        }

        .particle:nth-child(3) {
            width: 35px;
            height: 35px;
            left: 50%;
            top: 30%;
            animation-delay: 5s;
            animation-duration: 25s;
        }

        .particle:nth-child(4) {
            width: 20px;
            height: 20px;
            left: 80%;
            top: 60%;
            animation-delay: 1s;
            animation-duration: 15s;
        }

        .particle:nth-child(5) {
            width: 30px;
            height: 30px;
            left: 30%;
            top: 80%;
            animation-delay: 3s;
            animation-duration: 22s;
        }

        .particle:nth-child(6) {
            width: 10px;
            height: 10px;
            left: 60%;
            top: 10%;
            animation-delay: 0.5s;
            animation-duration: 19s;
        }

        .particle:nth-child(7) {
            width: 18px;
            height: 18px;
            left: 40%;
            top: 50%;
            animation-delay: 4s;
            animation-duration: 21s;
        }

        .particle:nth-child(8) {
            width: 22px;
            height: 22px;
            left: 70%;
            top: 40%;
            animation-delay: 1.5s;
            animation-duration: 17s;
        }

        .particle:nth-child(9) {
            width: 28px;
            height: 28px;
            left: 90%;
            top: 90%;
            animation-delay: 2.5s;
            animation-duration: 16s;
        }

        .particle:nth-child(10) {
            width: 12px;
            height: 12px;
            left: 15%;
            top: 45%;
            animation-delay: 3.5s;
            animation-duration: 23s;
        }
    </style>
</head>

<body>

    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

<div class="error-container" style="padding: 100px 0;">
    <div class="text-center">
        <div class="error-code" style="font-size: 6rem; font-weight: 600;">{{ $code }}</div>
        <h2 class="fw-bold">
            @if ($code == 404)
                Oops! Page Not Found
            @else
                Oops! Something Went Wrong
            @endif
        </h2>
        <p class="lead error-message" style="font-size: 1.25rem; margin: 20px 0;">
            @if ($code == 404)
                The page you are looking for doesn't exist or has been moved.
            @else
                {{ $message ?? 'Internal Server Error' }} <!-- Display the error message -->
            @endif
        </p>
        <a href="/" class="btn btn-custom">Go Back Home</a>
    </div>
</div>

</body>

</html>