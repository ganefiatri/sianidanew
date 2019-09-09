<!--<div>-->
<!--    <h2>BERITA ACARA RESTITUSI</h2>-->
<!--    <p>Pada hari ini tanggal bulan tahun bertempat di plasa telkom Group Medan Menunjukkan laporan keluhan pelanggan nomor telah disetujui untuk diberikan non tunai-->
<!--    sebanyak Rp. (Terbilang..)</p><br>-->
<!--    <p>Demikian berita acara ini dibuat dengan sebenar-benarnya dan untuk digunakan sebagai dasar penyelesaian keluhan pelanggan yang dimaksud</p>-->
<!--</div>-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Restitusi / Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Restitusi / Laporan</div>
            </div>
        </div>

        <div class="section-body">
            <div style="padding: 20px;">
                <h2 style="text-align: center; margin-bottom: 20px">BERITA ACARA RESTITUSI TAGIHAN PELANGGAN INDIHOME</h2><br>
                <hr>
                <form method="POST" action="<?php echo base_url('Restitusi_controller'); ?>">
                    <table class="table table-wrapper-scroll-y my-custom-scrollbar">
                        <tr>
                            <td>Jenis Laporan</td>
                            <td>
                                <select class="form-control" name="jenis_lap" id="">
                                    <option value="INTERNET">INTERNET</option>
                                    <option value="TELPON">TELPOM</option>
                                    <option value="IPTV">IPTV</option>
                                </select>
                            </td>
                        </tr>
                        <!--        <tr>-->
                        <!--            <td>Nomor Pelapor</td>-->
                        <!--            <td><input class="form-control" type="number" name="nomor_pelapor"></td>-->
                        <!--        </tr>-->

                        <tr>
                            <td>Nomor Pelanggan</td>
                            <td><input class="form-control" type="number" name="nomor_pelanggan"></td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td><input class="form-control" type="text" name="nama_pelanggan"></td>
                        </tr>
                        <tr>
                            <td>Nama Pelapor</td>
                            <td><input class="form-control" type="text" name="nama_pelapor"></td>
                        </tr>
                        <tr>
                            <td>Relasi</td>
                            <td>
                                <select class="form-control" name="relasi" id="">
                                    <option value="Pemilik">PEMILIK</option>
                                    <option value="Suami/Istri">SUAMI/ISTRI</option>
                                    <option value="Bapak/ibu">BAPAK/IBU</option>
                                    <option value="Anak">ANAK</option>
                                    <option value="Anggota Keluarga">ANGGOTA KELUARGA</option>
                                    <option value="Kontrak/Sewa/Kost">KONTRAK/SEWA/KOST</option>
                                    <option value="Karyawan">KARYAWAN</option>
                                    <option value="Teman">TEMAN</option>
                                    <option value="Tetangga">TETANGGA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nominal Restitusi</td>
                            <td><input class="form-control" type="number" name="nominal"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="form-control" type="text" name="nominal_text" placeholder="Terbilang"></td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu Restitusi</td>
                            <td>
                                <select class="form-control" name="jangka_waktu" id="">
                                    <option value="1 Bulan">1 Bulan</option>
                                    <option value="2 Bulan">2 Bulan</option>
                                    <option value="3 Bulan">3 Bulan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Permasalahan</td>
                            <td>
                                <select class="form-control" name="jenis_masalah" id="">
                                    <option value="Klaim Tagihan">KLAIM TAGIHAN</option>
                                    <option value="Klaim Gangguan">KLAIM GANGGUAN</option>
                                    <option value="Klaim PSB">KLAIM PSB</option>
                                    <option value="Klaim Retensi">KLAIM RETENSI</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alasan</td>
                            <td>
                                <select class="form-control" name="alasan" id="">
                                    <option value="ISO (Isolir APS namun masih muncul tagihan)">ISO (Isolir APS namun masih muncul tagihan)</option>
                                    <option value="PRO (Tagihan Protata tidak sesuai pemakaian)">PRO (Tagihan Protata tidak sesuai pemakaian)</option>
                                    <option value="GMG (Tidak mendapatkan glmmick karena kesalahan sistem)">GMG (Tidak mendapatkan glmmick karena kesalahan sistem)</option>
                                    <option value="LTS (Layanan tidak sesuai dengan yang diminta)">LTS (Layanan tidak sesuai dengan yang diminta)</option>
                                    <option value="GGT (Produk mengalami gangguan teknis)">GGT (Produk mengalami gangguan teknis)</option>
                                    <option value="TMP (Tidak merasa pasang namun tidak muncul tagihan)">TMP (Tidak merasa pasang namun tidak muncul tagihan)</option>
                                    <option value="BAF (Produk belum aktif, namun muncul tagihan)">BAF (Produk belum aktif, namun muncul tagihan)</option>
                                    <option value="GMK (Glmmick tidak sesuai dengan periode yang dijanjikan)">GMK (Glmmick tidak sesuai dengan periode yang dijanjikan)</option>
                                    <option value="TCA Pelanggan">TCA Pelanggan</option>
                                    <option value="RET (Retensi)">RET (Retensi)</option>
                                    <option value="DBT (Tunggakan)">DBT (Tunggakan)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Uraian Pelapor</td>
                            <td><textarea class="form-control" name="uraian" id="" cols="30" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary" style="float: right" type="submit" value="Kirim"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
</div>


<?php $this->load->view('dist/_partials/footer'); ?>