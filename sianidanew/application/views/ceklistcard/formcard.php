<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<style>
/* table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}*/
th, td {
  padding: 15px;
  text-align: left;    
} 
ul li {
    list-style:none;
    padding:10px;
    font-weight:bold;
}

.test{
    width: 167px;
    padding: 5px;
    height:30px;
}

</style>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Ceklist GK Mbanking</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Form Ceklist GK Mbanking</div>
                </div>
            </div>

            <div class="section-body">
                <div>

                <form method="POST" action="<?php echo site_url('mbanking_controller') ?>">
                    <input type="hidden" name="tipe1" value="1">
                    <table class="">
                        <tr>
                            <th>Nama CSR</th>
                            <td><?php echo sprintf('<small>%s</small>', $this->ion_auth->user()->row()->full_name) ?></td>
                        </tr>
                        <tr>
                            <th>NAMA CUSTOMER</th>
                            <td><input class="form-control" name="nama_customer" type="text" placeholder="Nama Customer" required = "required"></td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td><input class="form-control" name="nik" type="number" placeholder="Nomor NIK KTP Customer" required = "required"></td>
                        </tr>
                        <tr>
                            <th>MSISDN</th>
                            <td><input class="form-control" type = "number" name = "msisdn_name" placeholder="Nomor Telepon Customer" required = "required"></td>
                        </tr>
                        <!-- <tr>
                            <th>SIGN BY</th>
                            <td>
                                <select class="form-control" name="author_sign" id="author_sign">
                                    <option value="4">HENRIQUES</option>
                                    <option value="5">LAMBOK BUDIMAN HUTAGALUNG</option>
                                    <option value="2">MEDI HAFIZ</option>
                                    <option value="10">FABER HOTMAN SITANGGANG</option>
                                    <option value="26">RAHMAT RAHARJO</option>
                                </select>
                            </td>
                        </tr> -->
                        <tr>
                            <th>DATE</th>
                            <td><?php echo date("d-m-Y") ?></td>
                        </tr>
                    </table>

                    <table class="" border=1px>
                        <thead class="bg-primary">
                            <tr class="text-center">
                                <th style="padding:20px;">ACTIVITY</th>
                                <th style="padding:20px;">KETERANGAN</th>
                                <th style="padding:20px;">SYARAT</th>
                                <th style="padding:20px;">CHECKLIST</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="8">ID (KTP PELANGGAN)</td>
                                <td>a. CSR memastikan dengan seksama kesesuaian antara foto ID KTP Pelanggan dengan Wajah Pelanggan</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck1" id="">
                                        <option value="Harus Sesuai">Harus Sesuai</option>
                                        <option value="Tidak sesuai">Tidak sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Data alamat pelanggan</td>
                                <td></td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>- Alamat Dalam Kota</td>
                                <td></td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td style="color:red; font-weight:bold">- Alamat Luar Kota (Harap lebih waspada)</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck2" id="">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>c. CSR memastikan kesesuaian tanda tangan di KTP dengan tanda tangan basah di awal proses layanan</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck3" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>d. CSR memastikan Kesesuaian NIK dengan data CRM</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck4" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>e. CSR memastikan kesesuaian kode di NIK dengan tanggal lahir</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck5" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>f. CSR memastikan bentuk cetakan huruf pada KTP sama dengan cetakan huruf pada KTP pembanding yang asli</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck6" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- next row -->
                            <tr>
                                <td rowspan="5">Test Call</td>
                                <td>a. CSR Melakukan minimal 2x panggilan (dengan jeda waktu berbeda) atau SMS ke MSISDN yang akan Ganti Kartu, Test Call dilakukan:</td>
                                <td>
                                Wajib
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1. Saat proses validasi awal</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck7" id="">
                                        <option value="Tersambung">Tersambung</option>
                                        <option value="Tidak Tersambung">Tidak Tersambung</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2. Saat sebelum perso dilakukan</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck8" id="">
                                        <option value="Tersambung">Tersambung</option>
                                        <option value="Tidak Tersambung">Tidak Tersambung</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>b. CSR melakukan Test Call harus mencapai suara voice mail atau diterima oleh nomor tersebut (MSISDN Ganti Kartu M-Banking)</td>
                                <td>Wajib</td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>1. Jika test call diterima oleh pelanggan, CSR harus berkoordinasi dengan SPV/Team Back Office untuk eksekusi selanjutnya</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck9" id="">
                                        <option value="Sesuai">Jika Tersambung</option>
                                        <option value="Tidak Sesuai">Jika Tidak Tersambung</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- new row -->
                            <tr>
                                <td rowspan="2">Validasi 3 Nomor Yang Sering Dihubungi</td>
                                <td>a. CSR Meminta minimal 3 Nomor yang sering dihubungi oleh pelanggan dan harus dilengkapi dengan nama pemiliknya</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck10" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>b. CSR Menanyakan hubungan antara pelanggan yang datang Ganti Kartu dengan 3 Nomor yang sering dihubungi</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck11" id="">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- next row -->
                            <tr>
                                <td rowspan="2">LOG History INDIRA</td>
                                <td>a. CSR memeriksa apakah ada perubahan IMEI untuk Msisdn</td>
                                <td>Tidak Wajib</td>
                                <td>
                                    <select class="test" name="ck12" id="">
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>b. CSR memeriksa apakah ada perubahan di registrasi kartu</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck13" id="">
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </td>
                            </tr>
            <!--                <tr>-->
            <!--                    <td>Buku Tabungan</td>-->
            <!--                    <td>a. Pelanggan diminta membawa buku tabungan asli atau rekening koran dengan cap basah dari Bank</td>-->
            <!--                    <td>Wajib</td>-->
            <!--                    <td>-->
            <!--                        <select class="test" name="ck14" id="">-->
            <!--                            <option value="Ada">Ada</option>-->
            <!--                            <option value="Tidak Ada">Tidak Ada</option>-->
            <!--                        </select>-->
            <!--                    </td>-->
            <!--                </tr>-->
                            <tr>
                                <td>Dokumentasi</td>
                                <td>a. CSR mengambil foto close up wajah pelanggan untuk kelengkapan dokumen GK Banking</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck15" id="">
                                        <option value="Ya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>GK yang diwakilkan</td>
                                <td>Validasi KTP/KK, buku tabungan dari penerima kuasa</td>
                                <td>Wajib</td>
                                <td>
                                    <select class="test" name="ck16" id="">
                                        <option value="Ya">Iya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="syarat">
                        <h3>Syarat & Ketentuan:</h3>
                        <p>Baca disini <a href="<?= base_url('Mbanking_controller/syarat') ?>" target="_blank">Syarat & Ketentuan</a></p>
                        <p>Terkait
                            <a class="" data-toggle="collapse" href="#sp" role="button" aria-expanded="false" aria-controls="gk">
                                <u>Surat Pernyataan GK</u>
                            </a>

                            <div class="collapse" id="sp">
                                <div class="card card-body">
                                    <p></p>
                                    <ul>
                                        <li>apabila pelanggan tidak menggunakan layanan banking silahkan klik link berikut <a href="<?php echo base_url('Mbanking_Controller/sp'); ?>" style="" target="_blank"><u>Surat Pernyataan</u></a></li>
                                    </ul>
                                </div>
                            </div>
                        </p>
                    </div>

                    <div class="komitmen">
                        <h3>Komitment:</h3>
                        <p style="font-style:italic">Dengan menandatangani form check list ini kami menyatakan bahwa proses di atas sudah dilakukan dengan seksama dan sebenar-benarnya. Form ini difoto dan dimasukkan sebagai lampiran e-form</p>

                    </div>
                    <div class="catatan">
                        <h3>Catatan:</h3>
                        <p style="font-style:italic">Jika kolom check list kosong, silahkan dipilih dengan tanda √, jika ada pilihan pada kolom check list, silahkan coret yang tidak perlu</p>
                        <p style="font-style:italic">Check List ini berlaku untuk seluruh pelanggan proses Ganti Kartu M-Banking (tanpa melihat relasi sosial antara CSR dgn pelanggan)</p>
                    </div>

                    <!-- signature -->

                    <!-- signature -->

                    <div align="right" style="padding:10px">
                        <button class="btn btn-information btn-lg" type="submit" onClick="jumlah()">Kirim</button>
                    </div>
                    </form>
                </div>
</div>
</section>
</div>


<?php $this->load->view('dist/_partials/footer'); ?>