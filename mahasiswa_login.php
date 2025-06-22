<?php
$nim = isset($_GET['nim']) ? htmlspecialchars($_GET['nim']) : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fddde6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #3399ff;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .checkbox-container input {
            margin-right: 8px;
        }
        button {
            width: 100%;
            background-color: #f89abf;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e07ba6;
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .register-link a {
            color: #3399ff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Login Mahasiswa</h2>
    <form action="cek_login.php" method="POST">
        <input type="text" name="nim" placeholder="NIM" required value="<?= $nim ?>">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <div class="checkbox-container">
            <input type="checkbox" id="show-password">
            <label for="show-password">Tampilkan Password</label>
        </div>
        <button type="submit">Login</button>
    </form>
    <div class="register-link">
        Belum punya akun? <a href="mahasiswa_register.php">Daftar di sini</a>
    </div>
</div>

<script>
    const showPasswordCheckbox = document.getElementById('show-password');
    const passwordInput = document.getElementById('password');

    showPasswordCheckbox.addEventListener('change', function () {
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>
</body>
</html>
