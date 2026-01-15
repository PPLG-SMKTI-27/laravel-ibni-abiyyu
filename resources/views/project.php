<?php
// Redirect menggunakan header PHP
header("Location: https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu");
exit(); // Pastikan tidak ada output setelah redirect

// Atau dengan delay
// header("Refresh: 3; url=https://github.com/username");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Redirect ke GitHub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sedang mengalihkan ke GitHub...</h2>
        <p>Harap tunggu sejenak.</p>
    </div>
</body>
</html>