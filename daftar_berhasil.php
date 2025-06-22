<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
    <meta http-equiv="refresh" content="5;url=mahasiswa_login.php">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #3399ff;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #444;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #f89abf;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        a:hover {
            background: #e07ba6;
        }
    </style>
    <script>
        let detik = 5;
        function countdown() {
            const counter = document.getElementById("countdown");
            if (detik > 0) {
                counter.innerText = detik;
                detik--;
                setTimeout(countdown, 1000);
            }
        }
        window.onload = countdown;
    </script>
</head>
<body>
    <div class="box">
        <h2>✅ Pendaftaran Berhasil!</h2>
        <p>Silakan lanjut ke halaman login untuk mulai menggunakan sistem.</p>
        <a href="mahasiswa_login.php">➡ Lanjut ke Login</a>
        <p style="margin-top:10px;font-size:12px;">(Anda akan dialihkan otomatis dalam <span id="countdown">5</span> detik)</p>
    </div>
</body>
</html>
