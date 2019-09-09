<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grapari Loop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center ">Grapari Loop</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Name</th>
        <th>Jenis Grapari</th>
        <th>Area</th>
        <th>Regional</th>
        <th>Type Grapari</th>
        <th>Jam Operasional</th>
        <th>Alamat Lengkap</th>
        <th>Longtitude</th>
        <th>Latitude</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($grapariloopall as $gploop) { ?>
            <tr>
                <td><?= $gploop ->name1 ?></td>
                <td><?= $gploop ->jenis_grapari ?></td>
                <td><?= $gploop ->area ?></td>
                <td><?= $gploop ->regional ?></td>
                <td><?= $gploop ->type_grapari ?></td>
                <td><?= $gploop ->jam_operasional ?></td>
                <td><?= $gploop ->alamat_lengkap ?></td>
                <td><?= $gploop ->longtitude ?></td>
                <td><?= $gploop ->latitude ?></td>
            </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

</body>
</html>