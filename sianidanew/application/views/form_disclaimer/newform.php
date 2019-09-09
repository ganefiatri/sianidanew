<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <p style="text-transform: capitalize;">* seluruh kolom diisi menggunakan huruf kapital</p>
            <form role="form" class="box-body" action="<?php echo site_url('home/FormSign') ?>" method="get" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label for="msisdn_number">MSISDN</label>
                    <input type="number" name="msisdn_number" class="form-control" id="msisdn_number" placeholder="Enter MSISDN Number" value="62">
                </div>
                <div class="form-group">
                    <label for="msisdn_name">MSISDN Name</label>
                    <input type="name" name="msisdn_name" class="form-control" id="msisdn_name" placeholder="Enter Name" required="required">
                </div>
                <div class="form-group">
                    <label for="nomor_induk">Nomor Induk KTP</label>
                    <input type="number" name="nomor_induk" class="form-control" id="nomor_induk" placeholder="Enter NIK" required="required">
                </div>
                <div class="form-group">
                    <label for="nkk">Nomor Kartu Keluarga</label>
                    <input type="number" name="nkk" class="form-control" id="nkk" placeholder="" required="required">
                </div>
                <label for="tempat_lahir">Tempat / Tanggal Lahir</label>
                <div class="form-group">
                    <input type="text" name="tempat_lahir" class="form-control col-md-6" id="tempat_lahir" placeholder="Tempat lahir" required="required" style="width: 50%;">
                    <input type="text" name="tanggal_lahir" class="form-control col-md-6" id="tanggal_lahir" placeholder="DD-MM-YYYY" required="required" style="width: 50%;">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Nama Jalan dan Kelurahan" required="required">
                    <input type="text" name="alamat2" class="form-control" placeholder="Nama Kecamatan / Nama Kota atau Nama Kabupaten" required="readonly">
                    <input type="text" name="alamat3" class="form-control" placeholder="Provinsi" required="readonly">
                </div>

                <input type="submit" class="btn btn-primary btn-block" value="e-Sign">
            </form>
        </div>
    </div>