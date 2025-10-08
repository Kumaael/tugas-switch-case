<html>
<head>
    <title>Pendaftaran Ulang SMK "Pasti Bisa"</title>
</head>
<body>
    <h2>Form Pendaftaran Ulang Siswa</h2>
    <form method="post">
        <label>Nama Siswa:</label>
        <input type="text" name="nama" required><br><br>
        <label>Nomor Induk:</label>
        <input type="text" name="nis" required><br><br>
        <label>Kelas (1/2/3):</label>
        <input type="number" name="kelas" min="1" max="3" required><br><br>
        <button type="submit">Proses</button>
    </form>
    <hr>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST["nama"]);
        $nis = htmlspecialchars($_POST["nis"]);
        $kelas = intval($_POST["kelas"]);
        $uang_gedung = $spp = $seragam = 0;
        $error = "";

        switch ($kelas) {
            case 1:
                $uang_gedung = 800000;
                $spp = 90000;
                $seragam = 125000;
                break;
            case 2:
            case 3:
                $uang_gedung = 500000;
                $spp = 75000;
                $seragam = 100000;
                break;
            default:
                $error = "Kelas tidak valid! Masukkan 1, 2, atau 3.";
        }

        if ($error) {
            echo "<span style='color:red'>$error</span>";
        } else {
            $total = $uang_gedung + $spp + $seragam;
            echo "<h3>Rincian Biaya Pendaftaran Ulang</h3>";
            echo "<p>Nama Siswa: $nama</p>";
            echo "<p>Nomor Induk: $nis</p>";
            echo "<p>Kelas: $kelas</p>";
            echo "<p>Uang Gedung: Rp " . number_format($uang_gedung,0,',','.') . "</p>";
            echo "<p>SPP Bulan Juli: Rp " . number_format($spp,0,',','.') . "</p>";
            echo "<p>Seragam: Rp " . number_format($seragam,0,',','.') . "</p>";
            echo "<p><b>Total: Rp " . number_format($total,0,',','.') . "</b></p>";
        }
    }
    ?>
</body>
</html>