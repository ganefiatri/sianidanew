<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">INFORMASI PELANGGAN</label>
            <hr>
            <div class="form-group">
                <label for="msisdn">MSISDN</label>
                <input name="msisdn" type="text" id="msisdn" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input name="nama" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="ktp">Kartu Identitas</label>
                <input name="ktp" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="ktp">Nomor Kartu Identitas</label>
                <input name="ktp" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="" class="form-control">
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Domisili</label>
                <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="notlp">Nomor Telepon</label>
                <input name="notlp" type="number" class="form-control" placeholder="+62">
            </div>
            <div class="form-group">
                <label for="lahir">Tempat Lahir</label>
                <input name="lahir" type="text" class="form-control">
            </div>
            <div class="form-group" style="">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input name="tgl_lahir" type="date" id="tanggal" class="form-control">
            </div>
            <div class="form-group">
                <label for="warganegara">Kewarganegaraan</label>
                <input name="warganegara" type="text" class="form-control">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">PERMINTAAN LAYANAN</label>
            <hr>
            <div class="form-group">
                <label for="layanan">Layanan</label>
                <select name="layanan" id="" class="form-control">
                    <option value="Berlangganan">Berlangganan</option>
                    <option value="Tidak Berlangganan">Tidak Berlangganan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">RESTITUSI</label>
            <hr>
            <div class="form-group">
                <label for="alasan">Alasan</label>
                <input name="alasan" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Restitusi</label>
                <input name="jumlah" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="terbilang">Terbilang</label>
                <input name="terbilanga" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="penyelesaian">Penyelesaian</label>
                <select name="penyelesaian" id="" class="form-control">
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer">Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kelengkapan">Kelengkapan</label>
                <select name="kelengkapan" id="" class="form-control">
                    <option value="Salinan Kartu Identitas">Salinan Kartu Identitas</option>
                    <option value="Bukti Bayar">Bukti Bayar</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">PETUGAS</label>
            <hr>
            <div class="form-group">
                <label for="petugas">Petugas</label>
                <input name="petugas" type="text" class="form-control" value="<?php echo $this->ion_auth->user()->row()->full_name ?>">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">LOKASI</label>
            <hr>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input name="lokasi" type="text" class="form-control" value="Grapari Telkom Group MEDAN">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">PENGADUAN</label>
            <hr>
            <div class="form-group">
                <label for="pengaduan">Layanan</label>
                <input name="pengaduan" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="uraian">Uraian Pelanggan</label>
                <textarea class="form-control" name="uraian" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <label style="color:salmon; font-weight: bolder; font-size: 15px;">EMAIL PELANGGAN</label>
            <hr>
            <div class="form-group">
                <label for="email">Email Pelanggan</label>
                <input name="email" type="email" class="form-control">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <button style="float: right" type="submit" class="btn btn-lg btn-primary">Kirim</button>
        </div>
    </div>
</div>