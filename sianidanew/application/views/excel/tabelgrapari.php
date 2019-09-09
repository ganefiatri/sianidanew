<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grapari Own</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center ">Grapari Own</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Name1</th>
        <th>Name3</th>
        <th>Jenis Grapari</th>
        <th>Kategori Grapari</th>
        <th>Area</th>
        <th>Regional</th>
        <th>Type Grapari</th>
        <th>Jam Operasional</th>
        <th>Alamat Lengkap</th>
        <th>Longtitude</th>
        <th>Latitude</th>
        <th>Class</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Provinsi</th>
        <th>Kode Pos</th>
        <th>Kota / Kabupaten</th>
        <th>Ketersedian Mygrapari</th>
        <th>Interaksi Mygrapari Agustus</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($grapariall as $gp) { ?>
            <tr>
                <td><?= $gp ->name1 ?></td>
                <td><?= $gp ->name3 ?></td>
                <td><?= $gp ->jenis_grapari ?></td>
                <td><?= $gp ->kategori_grapari ?></td>
                <td><?= $gp ->area ?></td>
                <td><?= $gp ->regional ?></td>
                <td><?= $gp ->type_grapari ?></td>
                <td><?= $gp ->jam_operasional ?></td>
                <td><?= $gp ->alamat_lengkap ?></td>
                <td><?= $gp ->longtitude ?></td>
                <td><?= $gp ->latitude ?></td>
                <td><?= $gp ->class ?></td>
                <td><?= $gp ->kelurahan ?></td>
                <td><?= $gp ->kecamatan ?></td>
                <td><?= $gp ->provinsi ?></td>
                <td><?= $gp ->kodepos ?></td>
                <td><?= $gp ->kota ?></td>
                <td><?= $gp ->persedian_mygrapari ?></td>
                <td><?= $gp ->interaksi_mygrapari ?></td>
            </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

</body>
</html>