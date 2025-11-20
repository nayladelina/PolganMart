<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$kode_barang  = ["BRG01","BRG02","BRG03","BRG04","BRG05"];
$nama_barang  = ["Pensil","Buku Tulis","Penghapus","Penggaris","Bolpoin"];
$harga_barang = [3000,5000,2000,4000,3500];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard POLGAN MART</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f3f4f6; margin:0; }
        .navbar {
            background: #2563eb;
            padding: 15px;
            color: white;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .navbar a {
            color:white;
            background:#dc2626;
            padding:8px 15px;
            border-radius:6px;
            text-decoration:none;
        }
        .navbar a:hover { background:#b91c1c; }
        .container {
            margin:30px auto;
            width:90%;
            max-width:900px;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="navbar">
    <div>-- POLGAN MART --</div>
    <div>
        Login sebagai: <b><?php echo $_SESSION['username']; ?></b> | 
        <a href="logout.php">Logout</a>
    </div>
</div>
<div class="container">
    <h2>Selamat datang di Dashboard</h2>
    <p>Di commit berikutnya akan ditambahkan daftar penjualan.</p>
</div>
</body>
</html>
