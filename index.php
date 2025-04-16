<?php
if (!empty($_GET['q'])) {
  switch ($_GET['q']) {
    case 'info':
      phpinfo();
      exit;
      break;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azzels Air - Flight Booking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --primary-color: #1a73e8;
        --secondary-color: #f8f9fa;
        --accent-color: #e8f0fe;
        --text-color: #202124;
        --border-color: #dadce0;
        --success-color: #34a853;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
        color: var(--text-color);
        background-color: #f5f5f5;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 0;
        margin-bottom: 30px;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo i {
        color: var(--primary-color);
        font-size: 28px;
        margin-right: 10px;
    }

    .logo-text {
        font-weight: 700;
        font-size: 22px;
        color: var(--primary-color);
    }

    .main-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .booking-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .card-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 25px;
        color: var(--primary-color);
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        color: #5f6368;
    }

    input,
    select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        font-size: 14px;
        transition: border 0.3s;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px var(--accent-color);
    }

    .btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
    }

    .btn:hover {
        background-color: #1557b0;
    }

    .result-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        position: sticky;
        top: 20px;
    }

    .ticket-header {
        background-color: var(--primary-color);
        color: white;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        margin: -30px -30px 20px -30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticket-title {
        font-weight: 600;
        font-size: 18px;
    }

    .ticket-number {
        font-size: 14px;
        opacity: 0.9;
    }

    .ticket-details {
        margin-bottom: 25px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px dashed var(--border-color);
    }

    .detail-label {
        font-weight: 500;
        color: #5f6368;
        font-size: 14px;
    }

    .detail-value {
        font-weight: 600;
        text-align: right;
    }

    .flight-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 25px 0;
        padding: 15px;
        background-color: var(--accent-color);
        border-radius: 8px;
    }

    .airport-code {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
    }

    .airport-name {
        font-size: 12px;
        color: #5f6368;
        margin-top: 5px;
    }

    .flight-arrow {
        font-size: 20px;
        color: #5f6368;
    }

    .price-summary {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-top: 20px;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .total-row {
        border-top: 1px solid var(--border-color);
        padding-top: 10px;
        margin-top: 10px;
        font-weight: 600;
        color: var(--primary-color);
    }

    .airline-logo {
        width: 120px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .main-content {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<?php
$bandaraAsal = [
  ['id' => 1, 'code' => 'CGK', 'nama' => 'Soekarno-Hatta International', 'kota' => 'Jakarta', 'pajak' => 65000],
  ['id' => 2, 'code' => 'BDO', 'nama' => 'Husein Sastranegara International', 'kota' => 'Bandung', 'pajak' => 50000],
  ['id' => 3, 'code' => 'MLG', 'nama' => 'Abdul Rachman Saleh', 'kota' => 'Malang', 'pajak' => 40000],
  ['id' => 4, 'code' => 'SUB', 'nama' => 'Juanda International', 'kota' => 'Surabaya', 'pajak' => 30000],
];

$bandaraTujuan = [
  ['id' => 1, 'code' => 'DPS', 'nama' => 'Ngurah Rai International', 'kota' => 'Denpasar', 'pajak' => 85000],
  ['id' => 2, 'code' => 'UPG', 'nama' => 'Sultan Hasanuddin International', 'kota' => 'Makassar', 'pajak' => 70000],
  ['id' => 3, 'code' => 'INX', 'nama' => 'Inanwatan', 'kota' => 'Inanwatan', 'pajak' => 90000],
  ['id' => 4, 'code' => 'BTJ', 'nama' => 'Sultan Iskandar Muda International', 'kota' => 'Banda Aceh', 'pajak' => 60000],
];

$maskapaiList = [
  'GA' => 'Garuda Indonesia',
  'JT' => 'Lion Air',
  'QG' => 'Citilink',
  'ID' => 'Batik Air',
  'SJ' => 'Sriwijaya Air'
];

function takeBandaraInfo($id, $list) {
  foreach ($list as $item) {
    if ($item['id'] == $id) {
      return $item;
    }
  }
  return null;
}

$tanggal = date('d M Y');
$takeTanggal = date('d');
$takeBulan   = date('m');
$takeTahun   = date('y');

// Generate random flight number
$maskapaiCode = array_rand($maskapaiList);
$flightNumber = $maskapaiCode . rand(100, 999);
$bookingNumber = "KTS-" . strtoupper(uniqid());
?>

<body>
    <div class="header">
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-plane"></i>
                <span class="logo-text">Azzels Air</span>
            </div>
            <div class="date"><?= $tanggal ?></div>
        </div>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="booking-card">
                <h2 class="card-title">Flight Booking</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="nama_maskapai">Airline</label>
                        <select id="nama_maskapai" name="nama_maskapai" required>
                            <option value="">-- Select Airline --</option>
                            <?php foreach ($maskapaiList as $code => $name): ?>
                            <option value="<?= $code ?>"><?= $name ?> (<?= $code ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bandara_asal">Departure Airport</label>
                        <select id="bandara_asal" name="bandara_asal" required>
                            <option value="">-- Select Departure Airport --</option>
                            <?php foreach ($bandaraAsal as $bandara): ?>
                            <option value="<?= $bandara['id'] ?>"><?= $bandara['kota'] ?> - <?= $bandara['nama'] ?>
                                (<?= $bandara['code'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bandara_tujuan">Arrival Airport</label>
                        <select id="bandara_tujuan" name="bandara_tujuan" required>
                            <option value="">-- Select Arrival Airport --</option>
                            <?php foreach ($bandaraTujuan as $bandara): ?>
                            <option value="<?= $bandara['id'] ?>"><?= $bandara['kota'] ?> - <?= $bandara['nama'] ?>
                                (<?= $bandara['code'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga_tiket">Ticket Price (IDR)</label>
                        <input type="number" id="harga_tiket" name="harga_tiket" min="100000" required>
                    </div>

                    <button type="submit" class="btn">Book Flight</button>
                </form>
            </div>

            <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maskapaiCode = $_POST['nama_maskapai'] ?? '';
        $namaMaskapai = $maskapaiList[$maskapaiCode] ?? '';
        $asalId = $_POST['bandara_asal'] ?? '';
        $tujuanId = $_POST['bandara_tujuan'] ?? '';
        $hargaTiket = $_POST['harga_tiket'] ?? '';
        
        if (
          !empty($namaMaskapai) &&
          !empty($asalId) &&
          !empty($tujuanId) &&
          is_numeric($hargaTiket) &&
          $hargaTiket > 0
        ) {
          $asal = takeBandaraInfo($asalId, $bandaraAsal);
          $tujuan = takeBandaraInfo($tujuanId, $bandaraTujuan);

          if ($asal && $tujuan) {
            $pajak = $asal['pajak'] + $tujuan['pajak'];
            $total = $hargaTiket + $pajak;
      ?>
            <div class="result-card">
                <div class="ticket-header">
                    <div class="ticket-title">E-TICKET RECEIPT</div>
                    <div class="ticket-number"><?= $bookingNumber ?></div>
                </div>

                <div class="ticket-details">
                    <div class="detail-row">
                        <span class="detail-label">Flight Number</span>
                        <span class="detail-value"><?= $flightNumber ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Date</span>
                        <span class="detail-value"><?= $tanggal ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Passenger</span>
                        <span class="detail-value">1 Adult</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Airline</span>
                        <span class="detail-value"><?= $namaMaskapai ?></span>
                    </div>
                </div>

                <div class="flight-info">
                    <div class="flight-from">
                        <div class="airport-code"><?= $asal['code'] ?></div>
                        <div class="airport-name"><?= $asal['kota'] ?></div>
                    </div>
                    <div class="flight-arrow">
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                    <div class="flight-to">
                        <div class="airport-code"><?= $tujuan['code'] ?></div>
                        <div class="airport-name"><?= $tujuan['kota'] ?></div>
                    </div>
                </div>

                <div class="price-summary">
                    <div class="price-row">
                        <span>Ticket Price</span>
                        <span>Rp <?= number_format($hargaTiket, 0, ',', '.') ?></span>
                    </div>
                    <div class="price-row">
                        <span>Airport Tax (<?= $asal['code'] ?>)</span>
                        <span>Rp <?= number_format($asal['pajak'], 0, ',', '.') ?></span>
                    </div>
                    <div class="price-row">
                        <span>Airport Tax (<?= $tujuan['code'] ?>)</span>
                        <span>Rp <?= number_format($tujuan['pajak'], 0, ',', '.') ?></span>
                    </div>
                    <div class="price-row total-row">
                        <span>Total Price</span>
                        <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                    </div>
                </div>

                <div style="margin-top: 30px; text-align: center;">
                    <button class="btn" onclick="window.print()">
                        <i class="fas fa-print"></i> Print Ticket
                    </button>
                </div>
            </div>
            <?php
          }
        }
      }
      ?>
        </div>
    </div>
</body>

</html>