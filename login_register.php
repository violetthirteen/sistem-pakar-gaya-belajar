<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login / Daftar Sistem Pakar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fddde6, #cce5ff);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #3399ff;
        }
        select, input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            background-color: #f89abf;
            color: #fff;
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
        .toggle {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 id="formTitle">Login</h2>
    <form id="loginForm" method="post" action="login.php">
        <select name="role" required>
            <option value="">Pilih Peran</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="admin">Admin</option>
        </select>
        <input type="text" name="username" placeholder="NIM / Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>
    <div class="toggle" onclick="toggleForm()">Belum punya akun? Daftar</div>
</div>

<script>
let isLogin = true;
function toggleForm() {
    const form = document.getElementById("loginForm");
    const title = document.getElementById("formTitle");
    if (isLogin) {
        title.innerText = "Daftar";
        form.innerHTML = `
            <select name="role" required>
                <option value="">Pilih Peran</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="admin">Admin</option>
            </select>
            <input type="text" name="username" placeholder="NIM / Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <button type="submit" formaction="register.php">Daftar</button>
        `;
        document.querySelector('.toggle').innerText = "Sudah punya akun? Login";
    } else {
        location.reload();
    }
    isLogin = !isLogin;
}
</script>
</body>
</html>
