<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar Gaya Belajar Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
        }
        nav {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, #fddde6, #cce5ff);
            padding: 12px 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ccc;
            z-index: 1000;
        }
        nav a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        nav a:hover {
            color: #e07ba6;
        }
    </style>
</head>
<body>

<nav>
    <div style="display: flex; flex: 1; gap: 30px;">
        <a href="#beranda">Beranda</a>
        <a href="#fitur">Fitur</a>
        <a href="#statistik">Statistik</a>
        <a href="#testimoni">Testimoni</a>
    </div>
    <div style="margin-left: auto; display: flex; gap: 15px;">
        <a href="mahasiswa/mahasiswa_login.php">🎓 Login Mahasiswa</a>
        <a href="admin/login.php">👤 Login Admin</a>
    </div>
</nav>

    <header style="padding: 60px; text-align: center; background: #fddde6;">
        <h1>Sistem Pakar Gaya Belajar Mahasiswa</h1>
        <p>Cari tahu gaya belajar kamu sekarang!</p>
    </header>
</body>
</html>
