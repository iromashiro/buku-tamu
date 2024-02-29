<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSIA Prima Qonita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgFIfSWliRFhQJhhyxEyZwGpneSaj5pmgJe3EGfvF3-3P4b7vVn8VYvWripwlS0G7_q7Bq7UPLmN25D6tP2TOAaUw1hH-M2Mgh1WBABwdJesHRFzsz7iMi0mCAbfTH-SQBJvxbWOfj9GlIbKcgJ4JNyk2Uv0itXA85MSRhcMc6-KrOxZDD9WlKMlwNw/s715/IMG_20230204_124555.jpg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-container {
            display: flex;
            gap: 50px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 30px 50px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card {
            width: 150px;
            height: 150px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-10px) rotate(-5deg);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
            width: 100%;
            position: relative;
        }

        .icon {
            font-size: 80px;
            cursor: pointer;
            margin-bottom: 10px;
            z-index: 1;
            transition: color 0.3s;
        }

        .icon:hover {
            color: #aaa;
        }

        .kasir {
            color: #4CAF50;
        }

        .rumah-sakit {
            color: #2196F3;
        }

        h2 {
            margin-top: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="icon-container">
        <div class="card">
            <a href="http://127.0.0.1:8000" class="card-link" target="_blank">
                <i class="fas fa-hospital rumah-sakit icon" title="Rumah Sakit"></i>
                <h2>Administrasi</h2>
            </a>
        </div>

        <div class="card">
            <a href="https://rsiaprimaqonita.dealpos.com" class="card-link" target="_blank">
                <i class="fas fa-dolly-flatbed icon"></i>
                <h2>Logistik</h2>
            </a>
        </div>

        <div class="card">
            <a href="https://rsiaprimaqonita.dealpos.com" class="card-link" target="_blank">
                <i class="fas fa-cash-register kasir icon" title="Kasir"></i>
                <h2>Kasir</h2>
            </a>
        </div>
    </div>
</body>

</html>