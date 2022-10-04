<?php

$m1 = ['nim' => '1921500001', 'nama' => 'Ucup.', 'nilai' => 80];
$m2 = ['nim' => '1921500002', 'nama' => 'Mamat', 'nilai' => 75];
$m3 = ['nim' => '1921500003', 'nama' => 'Otong', 'nilai' => 60];
$m4 = ['nim' => '1921500004', 'nama' => 'Kumar', 'nilai' => 88];
$m5 = ['nim' => '1921500005', 'nama' => 'Agus', 'nilai' => 85];
$m6 = ['nim' => '1921500006', 'nama' => 'Dadang', 'nilai' => 99];
$m7 = ['nim' => '1921500007', 'nama' => 'Usman', 'nilai' => 87];
$m8 = ['nim' => '1921500008', 'nama' => 'Dudung', 'nilai' => 90];
$m9 = ['nim' => '1921500009', 'nama' => 'Kasmin', 'nilai' => 95];
$m10 = ['nim' => '1921500010', 'nama' => 'Samsul', 'nilai' => 77];

$dftMahasiswa = [$m1, $m2, $m3,  $m4,  $m5,  $m6, $m7, $m8, $m9, $m10];

$title = ['NO', 'NIM', 'NAMA', 'NILAI', 'KETERANGAN', 'GRADE', 'predicate'];

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas 3</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body bgcolor="#3D3C42">
  <h3 class="text-center pt-4">Daftar Nilai Mahasiswa</h3>
  <div class="px-4 pt-3 table-responsive">
    <table class="table table-hover table-bordered table-sm ">
      <thead>
        <tr bgcolor="#e60099">
          <?php
          foreach ($title as $tl) {
          ?>
            <th class="text-center text-light" scope="col"><?= $tl ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $colorBg;
        foreach ($dftMahasiswa as $lm) {
          $result = $lm['nilai'] >= 60 ? 'Lulus' : 'Tidak Lulus';

          $grade = ' ';
          if ($lm['nilai'] > 0 && $lm['nilai'] < 59) $grade = 'E';
          elseif ($lm['nilai'] >= 60 && $lm['nilai'] < 69) $grade = 'D';
          elseif ($lm['nilai'] >= 70 && $lm['nilai'] < 79) $grade = 'C';
          elseif ($lm['nilai'] >= 80 && $lm['nilai'] < 89) $grade = 'B';
          elseif ($lm['nilai'] >= 90 && $lm['nilai'] < 100) $grade = 'A';

          $predicate = ' ';
          switch ($grade) {
            case 'A':
              $predicate = 'Excellent';
              break;
            case 'B':
              $predicate = 'Very Good';
              break;
            case 'C':
              $predicate = 'Good';
              break;
            case 'D':
              $predicate = 'Pass';
              break;
            case 'E':
              $predicate = 'Weak';
              break;
            default:
              $predicate = 'Very Week';
              break;
          }

          $colorBg = $no % 2 == 1 ? '#ff0000' : '#e6e600';

        ?>
          <tr class="text-center" bgcolor="<?= $colorBg ?>">
            <th scope="row"><?= $no++ ?></th>
            <td><?= $lm['nim'] ?></td>
            <td><?= $lm['nama'] ?></td>
            <td><?= $lm['nilai'] ?></td>
            <td><?= $result ?></td>
            <td><?= $grade ?></td>
            <td><?= $predicate ?></td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php
        $jumlahMahasiswa = count($dftMahasiswa);
        $kumpulanNilai = array_column($dftMahasiswa, 'nilai');
        $nilaiTertinggi = max($kumpulanNilai);
        $nilaiTerkecil = min($kumpulanNilai);
        $totalNilai = array_sum($kumpulanNilai);
        $rata2 = $totalNilai / $jumlahMahasiswa;

        $tfoot = [
          'Nilai tertinggi' => $nilaiTertinggi,
          'Nilai terkecil' => $nilaiTerkecil,
          'Rata-rata' => $rata2,
          'Jumlah Mahasiswa' => $jumlahMahasiswa
        ];

        foreach ($tfoot as $key => $value) { ?>
          <tr>
            <th colspan="4"><?= $key ?></th>
            <th colspan="3"><?= $value ?></th>
          </tr>
        <?php } ?>
      </tfoot>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
