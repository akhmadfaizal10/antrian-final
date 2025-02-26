<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Antrian Sekarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        h1 {
            font-size: 6rem;
            color: green;
            margin: 10px 0;
        }
        p {
            font-weight: bold;
            font-size: 2rem;
        }
        @media (min-width: 768px) {
            h1 {
                font-size: 8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container bg-white">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="feature-icon-3 me-4">
                                <p style="font-size: 3rem;"> Antrian Sekarang</p>
                                <h1 id="nomor-antrian" style="font-size: 6rem;">0</h1>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script>
        function updateAntrian() {
            $.get('get_antrian_sekarang.php', function(data) {
                let antrianSekarang = data.trim();
                if (antrianSekarang !== $("#nomor-antrian").text()) {
                    $("#nomor-antrian").text(antrianSekarang);
                }
            });
        }
        setInterval(updateAntrian, 1000);
        updateAntrian();
    </script>
</body>
</html>

