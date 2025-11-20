<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Data Barang
$kode_barang  = ["BRG01","BRG02","BRG03","BRG04","BRG05"];
$nama_barang  = ["Pensil","Buku Tulis","Penghapus","Penggaris","Bolpoin"];
$harga_barang = [3000,5000,2000,4000,3500];

// Logika Penjualan Random
$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

// Pilih barang dan jumlah acak
for($i=0; $i<5; $i++){
    $beli[$i] = rand(0,4);     
    $jumlah[$i] = rand(1,5);   
}

// Hitung total per item menggunakan foreach
foreach($beli as $i => $index){
    $total[$i] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}
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
        table { width:100%; border-collapse:collapse; margin-top:20px; }
        table th, table td { border:1px solid #ddd; padding:12px; text-align:center; }
        table thead { background:#2563eb; color:white; }
        .total { text-align:right; font-size:18px; margin-top:15px; }
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
    <h2>Daftar Penjualan Random</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($beli as $i => $index){
                echo "<tr>";
                echo "<td>{$kode_barang[$index]}</td>";
                echo "<td>{$nama_barang[$index]}</td>";
                echo "<td>Rp ".number_format($harga_barang[$index])."</td>";
                echo "<td>{$jumlah[$i]}</td>";
                echo "<td>Rp ".number_format($total[$i])."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Commit 8: Total Belanja -->
    <div class="total"><b>Total Belanja: Rp <?php echo number_format($grandtotal); ?></b></div>
</div>
</body>
</html>
