<html>
<head>
    <title>Persewaan Mobil</title>
</head>
<body>
    <h2>Form Persewaan Mobil</h2>
    <form method="post">
        <label>Nama Penyewa:</label>
        <input type="text" name="nama" required><br><br>
        <label>Jenis Mobil:</label>
        <input type="text" name="mobil" placeholder="Avanza/Xenia/Innova/Alphard/Fortuner" required><br><br>
        <label>Lama Sewa (hari):</label>
        <input type="number" name="lama" min="1" required><br><br>
        <button type="submit">Proses</button>
    </form>
    <hr>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST["nama"]);
        $mobil = strtolower(trim($_POST["mobil"]));
        $lama = intval($_POST["lama"]);
        $biaya_sewa = 0;
        $biaya_asuransi = 0;
        $error = "";

        switch ($mobil) {
            case "avanza":
            case "xenia":
                $biaya_sewa = 300000;
                $biaya_asuransi = 15000;
                break;
            case "innova":
                $biaya_sewa = 500000;
                $biaya_asuransi = 25000;
                break;
            case "alphard":
                $biaya_sewa = 750000;
                $biaya_asuransi = 30000;
                break;
            case "fortuner":
                $biaya_sewa = 700000;
                $biaya_asuransi = 25000;
                break;
            default:
                $error = "Jenis mobil tidak tersedia!";
        }

        if ($error) {
            echo "<span style='color:red'>$error</span>";
        } elseif ($lama < 1 || !is_numeric($_POST["lama"]) || $_POST["lama"] != $lama) {
            echo "<span style='color:red'>Lama sewa tidak valid!</span>";
        } else {
            $total_sewa = $biaya_sewa * $lama;
            $total_asuransi = $biaya_asuransi * $lama;
            $total_bayar = $total_sewa + $total_asuransi;
            echo "<h3>Rincian Persewaan Mobil</h3>";
            echo "<p>Nama Penyewa: $nama</p>";
            echo "<p>Jenis Mobil: ".ucfirst($mobil)."</p>";
            echo "<p>Lama Sewa: $lama hari</p>";
            echo "<p>Biaya Sewa per Hari: Rp ".number_format($biaya_sewa,0,',','.')."</p>";
            echo "<p>Total Sewa: Rp ".number_format($total_sewa,0,',','.')."</p>";
            echo "<p>Biaya Asuransi per Hari: Rp ".number_format($biaya_asuransi,0,',','.')."</p>";
            echo "<p>Total Asuransi: Rp ".number_format($total_asuransi,0,',','.')."</p>";
            echo "<p><b>Total Bayar: Rp ".number_format($total_bayar,0,',','.')."</b></p>";
        }
    }
    ?>
</body>
</html>