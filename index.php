<?php
// Data disimpan sementara dalam array selama request berlangsung.
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    if ($nama !== '' && $kelas !== '' && $alamat !== '') {
        $data[] = [
            'nama' => $nama,
            'kelas' => $kelas,
            'alamat' => $alamat,
        ];
    }
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Array PHP</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }
        .container {
            width: min(900px, calc(100% - 32px));
            margin: 40px auto;
        }
        .card {
            background: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
            margin-bottom: 24px;
        }
        h1, h2 { margin-top: 0; }
        .form-group { margin-bottom: 16px; }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }
        textarea { min-height: 90px; resize: vertical; }
        button {
            border: 0;
            padding: 11px 18px;
            border-radius: 8px;
            background: #2563eb;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover { background: #1d4ed8; }
        .table-wrapper { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #d1d5db;
            text-align: left;
        }
        th { background: #e5e7eb; }
        .empty { color: #6b7280; }
    </style>
</head>
<body>
    <main class="container">
        <section class="card">
            <h1>Form Data Siswa</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                </div>

                <button type="submit">Tampilkan Data</button>
            </form>
        </section>

        <section class="card">
            <h2>Data dalam Array</h2>

            <?php if ($data !== []): ?>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $item): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= e($item['nama']) ?></td>
                                    <td><?= e($item['kelas']) ?></td>
                                    <td><?= e($item['alamat']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="empty">Belum ada data. Isi form terlebih dahulu.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
