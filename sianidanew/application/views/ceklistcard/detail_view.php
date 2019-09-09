<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Script to print the content of a div -->
<script> 
        function printDiv() { 
            var divContents = document.getElementById("dvContainer").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body >'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>View</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="#">GK M-banking</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">
            <div id="dvContainer">
                <h2 style="text-align:center">FORM CEKLIST GANTI KARTU M-BANKING</h2><br><br>
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
                </style>

                <?php //var_dump($mbanking); ?>
                <?php //foreach ($mbanking as $row) { ?>
                <div>
                    <table class="">
                        <tr>
                            <th>Nama CSR</th>
                            <td>: <?php echo sprintf('<small>%s</small>', $this->ion_auth->user($mbanking->author)->row()->full_name) ?></td>
                        </tr>
                        <tr>
                            <th>NAMA CUSTOMER</th>
                            <td>: <?= $mbanking->nama_customer ?></td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>: <?= $mbanking->nik ?></td>
                        </tr>
                        <tr>
                            <th>MSISDN</th>
                            <td>: <?= $mbanking->msisdn ?></td>
                        </tr>
                        <tr>
                            <th>DATE</th>
                            <td>: <?php echo date("d-m-Y", $mbanking->date) ?></td>
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
                            <td><?= $mbanking->ck1 ?></td>
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
                                <?= $mbanking->ck2 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>c. CSR memastikan kesesuaian tanda tangan di KTP dengan tanda tangan basah di awal proses layanan</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck3 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>d. CSR memastikan Kesesuaian NIK dengan data CRM</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck4 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>e. CSR memastikan kesesuaian kode di NIK dengan tanggal lahir</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck5 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>f. CSR memastikan bentuk cetakan huruf pada KTP sama dengan cetakan huruf pada KTP pembanding yang asli</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck6 ?>
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
                                <?= $mbanking->ck7 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2. Saat sebelum perso dilakukan</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck8 ?>
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
                                <?= $mbanking->ck9 ?>
                            </td>
                        </tr>

                        <!-- new row -->
                        <tr>
                            <td rowspan="2">Validasi 3 Nomor Yang Sering Dihubungi</td>
                            <td>a. CSR Meminta minimal 3 Nomor yang sering dihubungi oleh pelanggan dan harus dilengkapi dengan nama pemiliknya</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck10 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>b. CSR Menanyakan hubungan antara pelanggan yang datang Ganti Kartu dengan 3 Nomor yang sering dihubungi</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck11 ?>
                            </td>
                        </tr>
                        <!-- next row -->
                        <tr>
                            <td rowspan="2">LOG History INDIRA</td>
                            <td>a. CSR memeriksa apakah ada perubahan IMEI untuk Msisdn</td>
                            <td>Tidak Wajib</td>
                            <td>
                                <?= $mbanking->ck12 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>b. CSR memeriksa apakah ada perubahan di registrasi kartu</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck13 ?>
                            </td>
                        </tr>
                        <!--                <tr>-->
                        <!--                    <td>Buku Tabungan</td>-->
                        <!--                    <td>a. Pelanggan diminta membawa buku tabungan asli atau rekening koran dengan cap basah dari Bank</td>-->
                        <!--                    <td>Wajib</td>-->
                        <!--                    <td>-->
                        <!--                        --><?//= $mbanking ?>
                        <!--                    </td>-->
                        <!--                </tr>-->
                        <tr>
                            <td>Dokumentasi</td>
                            <td>a. CSR mengambil foto close up wajah pelanggan untuk kelengkapan dokumen GK Banking</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck15 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>GK yang diwakilkan</td>
                            <td>Validasi KTP/KK, buku tabungan dari penerima kuasa</td>
                            <td>Wajib</td>
                            <td>
                                <?= $mbanking->ck16 ?>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="syarat">
                        <h3>Syarat & Ketentuan:</h3>
                        <p>Baca disini <a href="<?= base_url('Mbanking_controller/syarat') ?>" target="_blank">Syarat & Ketentuan</a></p>
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

                    <table style="width:100%;">
                        <td style="width: 50%">
                            <p>CS</p>
                            <p><?php echo sprintf('( %s )', $this->ion_auth->user($mbanking->author)->row()->full_name) ?></p>
                            <img src="<?php echo base_url('sign/cs/' . $this->ion_auth->user($mbanking->author)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
                        </td>

                        <form method="POST" action="<?php echo site_url('Mbanking_Controller/mbanking_sign') ?>">
                            <input style="display:none" name="author_sign" type="text" value="<?php echo $this->ion_auth->user()->row()->id ?>">
                            <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                            <td style="width: 50%;float:right;">
                                <p>SPV, TL, FOS</p>
                                <p><?php echo sprintf('( %s )', $this->ion_auth->user($mbanking->author_sign)->row()->full_name) ?></p>
                                <img src="<?php echo base_url('sign/' . $this->ion_auth->user($mbanking->author_sign)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
                            </td>
                            <?php if($mbanking->cek == 0 ) { ?>
                                <?php
                                $user = $this->session->userdata('username');
                                if($user == "henriques" || $user == "admin" || $user == "13009332" || $user == "medihafiz" || $user == "15009624" || $user == "18009334") { ?>
                                    <td style="float: right">
                                        <select style="padding:10px" class="" name="cek" id="cek">
                                            <option value="0">NOT APPROVE</option>
                                            <option value="1">APPROVE</option>
                                        </select>
                                    </td>

                                <?php } ?>
                            <?php } ?>

                    </table>

                    <!-- signature -->

                </div>
            </div>

            <div align="right" style="padding:10px">
                <button style="" class="btn btn-primary" type="submit">KIRIM</button>
                </form>
                <!-- <button class="btn btn-information btn-lg" type="submit" >Kirim</button> -->
                <a class="btn btn-primary   " href="<?php echo base_url('Mbanking_Controller/mbanking_list'); ?>">Back to list</a>
            </div>
            <div>
                <input style="margin-left:10px" type="button" value="Print" onclick="printDiv()">
                <!-- <a style="padding-left:10px" class="" onclick="window.print();"><u>Print Pdf</u></a> -->
            </div>
        </div>
    </section>
</div>
