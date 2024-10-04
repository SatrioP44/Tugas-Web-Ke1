<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS DISKON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .highlight {
            font-weight: bold;
            color: green;
        }
        .result {
            border: 1px solid green;
            padding: 15px;
        }
    </style>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Masukkan Data Yang Dibutuhkan</h2>
    <form method="post">
        <div class="form-group">
            <label for="totalbelanja">Total Belanjaan</label>
            <input type="number" class="form-control" id="totalbelanja" name="totalbelanja" required min="1">    
        </div>
        <div class="form-group">
            <label for="namapelanggan">Nama Pelanggan</label>
            <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Hitung</button>
        </div>
        
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $totalbelanja = $_POST["totalbelanja"];
            $namapelanggan = $_POST["namapelanggan"];
            $member = array("Tono", "Anto", "Gea", "Rani"); // nama - nama yang memiliki member toko
            $kmember = false;
            foreach ($member as $tmember) {
                if ($namapelanggan === $tmember) {
                    $kmember = true;
                    break;
                }
            }

            echo "<h4>Hasil Perhitungan:</h4>";
            echo "<p>Total Belanja : Rp" . number_format($totalbelanja, 2, ',', '.') . "</p>";
            if ($kmember) {
                echo "<p class='highlight'>Pembeli adalah member, mendapatkan diskon 10%.</p>";
                $diskon = 0.10;

                if ($totalbelanja >= 500000) {
                    echo "<p class='highlight'>Total pembelian lebih dari atau sama dengan Rp. 500.000, mendapatkan tambahan diskon 10%.</p>";
                    $diskon += 0.10; // Diskon tambahan 10% jika pembelian >= Rp500.000
                } elseif ($totalbelanja >= 300000) {
                    echo "<p class='highlight'>Total pembelian lebih dari atau sama dengan Rp. 300.000, mendapatkan potongan 5%.</p>";
                    $diskon += 0.05; // Diskon tambahan 5% jika pembelian >= Rp300.000
                }

                $totaldiskon = $totalbelanja * $diskon;
                $totalbelanjaakhir = $totalbelanja - $totaldiskon;

                echo "<div class='result'>";
                echo "<p>Total belanja sebelum diskon: <span class='highlight'>Rp. " . number_format($totalbelanja, 2, ',', '.') . "</span></p>";
                echo "<p>Total diskon: <span class='highlight'>Rp. " . number_format($totaldiskon, 2, ',', '.') . "</span></p>";
                echo "<p>Total belanja setelah diskon: <span class='highlight'>Rp. " . number_format($totalbelanjaakhir, 2, ',', '.') . "</span></p>";
                echo "</div>";
            } else {
                if ($totalbelanja >= 300000) {
                    echo "<p class='highlight'>Total pembelian lebih dari atau sama dengan Rp. 300.000, mendapatkan potongan 5%.</p>";
                    $diskon = 0.05; // Diskon 5% jika pembelian >= Rp300.000

                    $totaldiskon = $totalbelanja * $diskon;
                    $totalbelanjaakhir = $totalbelanja - $totaldiskon;

                    echo "<div class='result'>";
                    echo "<p>Total belanja sebelum diskon: <span class='highlight'>Rp. " . number_format($totalbelanja, 2, ',', '.') . "</span></p>";
                    echo "<p>Total diskon: <span class='highlight'>Rp. " . number_format($totaldiskon, 2, ',', '.') . "</span></p>";
                    echo "<p>Total belanja setelah diskon: <span class='highlight'>Rp. " . number_format($totalbelanjaakhir, 2, ',', '.') . "</span></p>";
                    echo "</div>";
                }
            }
        }
    ?>
</body>
</html>
