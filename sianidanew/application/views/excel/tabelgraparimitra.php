<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grapari Mitra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center ">Grapari Mitra</h2>          
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
        <th>Dealer</th>
        <th>Visit</th>
        <th>Respon SMS</th>
        <th>Respon Web</th>
        <th>Ces</th>
        <th>Tnps</th>
        <th>Online Booking</th>
        <th>Visit Class</th>
        <th>Ces CLass</th>
        <th>Tnps Class</th>
        <th>Sampling</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($graparimitraall as $gpmitra) { ?>
            <tr>
                <td><?= $gpmitra ->name1 ?></td>
                <td><?= $gpmitra ->name3 ?></td>
                <td><?= $gpmitra ->jenis_grapari ?></td>
                <td><?= $gpmitra ->kategori_grapari ?></td>
                <td><?= $gpmitra ->area ?></td>
                <td><?= $gpmitra ->regional ?></td>
                <td><?= $gpmitra ->type_grapari ?></td>
                <td><?= $gpmitra ->jam_operasional ?></td>
                <td><?= $gpmitra ->alamat_lengkap ?></td>
                <td><?= $gpmitra ->longtitude ?></td>
                <td><?= $gpmitra ->latitude ?></td>
                <td><?= $gpmitra ->class ?></td>
                <td><?= $gpmitra ->kelurahan ?></td>
                <td><?= $gpmitra ->kecamatan ?></td>
                <td><?= $gpmitra ->provinsi ?></td>
                <td><?= $gpmitra ->kodepos ?></td>
                <td><?= $gpmitra ->kota ?></td>
                <td><?= $gpmitra ->persedian_mygrapari ?></td>
                <td><?= $gpmitra ->interaksi_mygrapari ?></td>

                <td><?= $gpmitra ->dealer ?></td>
                <td><?= $gpmitra ->visit ?></td>
                <td><?= $gpmitra ->respon_sms ?></td>
                <td><?= $gpmitra ->respon_web ?></td>
                <td><?= $gpmitra ->ces ?></td>
                <td><?= $gpmitra ->tnps ?></td>
                <td><?= $gpmitra ->online_booking ?></td>
                <td><?= $gpmitra ->visit_class ?></td>
                <td><?= $gpmitra ->ces_class ?></td>
                <td><?= $gpmitra ->tnps_class ?></td>
                <td><?= $gpmitra ->sampling ?></td>
            </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

</body>
</html>