<?php
session_start();
require_once '../koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['admin'] = $data['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #fddde6, #cce5ff);
            margin: 0;
            padding: 0;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .logo {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #3399ff;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            color: #f89abf;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #f89abf;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #e07ba6;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .back-link a {
            color: #3399ff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">🧠 SP Gaya Belajar</div>
        <h2>Login Admin</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>
        <div class="back-link">
            <a href="../index.php">⬅ Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
