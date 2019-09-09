<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <form role="form" class="box-body" action="" method="POST" enctype="text">
                <div class = "form-group">
                    <label for = "msisdn_name">Nama Pelanggan</label>
                    <input type = "name" name = "nama" class = "form-control" id = "nama" placeholder = "Enter Name" required = "required">
                </div>

                <div class = "form-group">
                    <label for = "msisdn_name">NIK KTP</label>
                    <input type = "name" readonly="readonly" name = "ktp" class = "form-control" id = "ktp" required = "required" value="<?= $val ?>">
                </div>
                <div class = "form-group">
                    <label for = "msisdn_name">Nomor KK</label>
                    <input type = "name" name = "kk" class = "form-control" id = "kk" required = "required">
                </div>
                <div class = "form-group">
                    <label for = "msisdn_name">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Save">
            </form>
        </div>
    </div>
</div>