<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grapari GTG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center ">Grapari GTG</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Name1</th>
        <th>Name3</th>
        <th>Jenis Grapari</th>
        <th>Area</th>
        <th>Regional</th>
        <th>Type Grapari</th>
        <th>Jam Operasional</th>
        <th>Alamat Lengkap</th>
        <th>Longtitude</th>
        <th>Latitude</th>
        <th>Class</th>
        <th>Provinsi</th>
        <th>Kode Pos</th>
        <th>Kota / Kabupaten</th>
        <th>Ketersedian Mygrapari</th>
        <th>Interaksi Mygrapari Agustus</th>
        <th>Dealer</th>
        <th>Visit</th>
        <th>Respon SMS</th>
        <th>Respon Web</th>
        <th>Ces</th>
        <th>Tnps</th>
        <th>Online Booking</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($graparigtgall as $gpgtg) { ?>
            <tr>
                <td><?= $gpgtg ->name1 ?></td>
                <td><?= $gpgtg ->name3 ?></td>
                <td><?= $gpgtg ->jenis_grapari ?></td>
                <td><?= $gpgtg ->area ?></td>
                <td><?= $gpgtg ->regional ?></td>
                <td><?= $gpgtg ->type_grapari ?></td>
                <td><?= $gpgtg ->jam_operasional ?></td>
                <td><?= $gpgtg ->alamat_lengkap ?></td>
                <td><?= $gpgtg ->longtitude ?></td>
                <td><?= $gpgtg ->latitude ?></td>
                <td><?= $gpgtg ->class ?></td>
                <td><?= $gpgtg ->provinsi ?></td>
                <td><?= $gpgtg ->kodepos ?></td>
                <td><?= $gpgtg ->kota ?></td>
                <td><?= $gpgtg ->persedian_mygrapari ?></td>
                <td><?= $gpgtg ->interaksi_mygrapari ?></td>
                <td><?= $gpgtg ->dealer ?></td>
                <td><?= $gpgtg ->visit ?></td>
                <td><?= $gpgtg ->respon_sms ?></td>
                <td><?= $gpgtg ->respon_web ?></td>
                <td><?= $gpgtg ->ces ?></td>
                <td><?= $gpgtg ->tnps ?></td>
                <td><?= $gpgtg ->online_booking ?></td>
            </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

</body>
</html>