<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>View</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="#">Starla</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">

            <h2 style="text-align:center">STARLA (STANDART LAYANAN) GRAPARI TELKOM GROUP</h2><br><br>
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
            <?php //var_dump($starla); ?>
            <div>
                <?php
                $total = null;?>

                <table>
                    <tr>
                        <td>Nama Petugas</td>
                        <td>: <?php echo sprintf('<small>%s</small>', $this->ion_auth->user()->row()->full_name) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penilaian</td>
                        <td>: <?php echo date("Y-m-d",$row->date); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Sample</td>
                        <td>: <?php echo $row->tanggal ?></td>
                    </tr>
                    <tr>
                        <td>Topik Layanan</td>
                        <td>: <?php echo $row->topik ?></td>
                    </tr>
                    <tr>
                        <td>Nama Customer Service</td>
                        <td>: <?php echo $this->ion_auth->user($row->author)->row()->full_name ?></td>
                    </tr>

                </table>
            <!--        <ul>-->
            <!--            <li>Nama Petugas : --><?php //echo sprintf('<small>%s</small>', $this->ion_auth->user()->row()->full_name) ?><!--</li>-->
            <!--            <li>Tanggal Penilaian : --><?php //echo date("d-m-Y"); ?><!--</li>-->
            <!--            <li>Topik Layanan : --><?php //echo $row->topik ?><!--</li>-->
            <!--            <li>Nama CS : --><?php //echo $this->ion_auth->user($row->author)->row()->full_name ?><!--</li>-->
            <!--        </ul>-->

                <table class="" border=1px>
                    <thead class="bg-primary">
                    <tr class="text-center">
                        <th style="padding:20px;">PARAMETER</th>
                        <th style="padding:20px;">DETAILS</th>
                        <th style="padding:20px;">SERVICE INDICATOR</th>
                        <th style="padding:20px;">SCORE</th>
                    </tr>
                    </thead>
                        <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                        <tbody>
                        <tr>
                            <td rowspan="5">RELIABILITY</td>
                            <td>Information & Solution Accuracy</td>
                            <td>Petugas mampu memberikan informasi dan solusi dengan tepat sesuai dengan deskripsi  product dan SOP yang berlaku</td>
                            <td><?php echo $row->info ?></td>
                        </tr>
                        <tr>
                            <td>Customers Data Validation</td>
                            <td>Petugas melakukan validasi data kepemilikan MSISDN.</td>
                            <td><?php echo $row->validasi ?></td>
                        </tr>
                        <tr>
                            <td>Identifying Customer Needs</td>
                            <td>Petugas melakukan identifikasi, verifikasi serta konfirmasi kebutuhan pelanggan dengan tepat.</td>
                            <td><?php echo $row->identifikasi ?></td>
                        </tr>
                        <tr>
                            <td>Escalating Customer Complaints</td>
                            <td>Petugas membuat laporan keluhan pelanggan dengan mematuhi ketentuan standard pembuatan dan pengiriman laporan yang berlaku serta menyampaikan SLA penyelesaian keluhan pelanggan.</td>
                            <td><?php echo $row->eskalasi ?></td>
                        </tr>
                        <tr>
                            <td>Customer Documentation</td>
                            <td>Membuat resume atau ringkasan layanan yang telah diberikan dan memilih kategory sesuai dengan topik layanan pada media yang telah ditentukan.</td>
                            <td><?php echo $row->dokumentasi ?></td>
                        </tr>
                        <tr>
                            <td rowspan="3">SALES SKILLS MASTERY</td>
                            <td>Cross And Upselling, Crossover Service, </td>
                            <td>Petugas wajib menjual/menawarkan product Telkom/Telkomsel dan menjelaskan benefit product yang dijual/ditawarkan. Pada poin ini petugas  juga wajib melakukan  kegiatan lintas layanan (pelanggan Telkomsel di tawarkan layanan/produk Telkom dan begitu pula sebaliknya).</td>
                            <td><?php echo $row->selling ?></td>
                        </tr>
                        <tr>
                            <td>Digital Sales And Service Sollution</td>
                            <td>Melakukan penawaran, sosialisasi serta edukasi layanan layanan digital Telkom/Telkomsel kepada pelanggan, yang bertujuan untuk peningkatan pengetahuan dan penjualan layanan digital Telkom/Telkomsel tersebut.</td>
                            <td><?php echo $row->digital ?></td>
                        </tr>
                        <tr>
                            <td>Negotiation Skills</td>
                            <td>Melakukan proses negosiasi penawaran produk secara maksimal kepada pelanggan, serta kemampuan negosiasi antara petugas dengan pelanggan yang  ingin berhenti berlangganan.</td>
                            <td><?php echo $row->nego ?></td>
                        </tr>
                        <tr>
                            <td rowspan="2">PERSONAL APPEARANCE</td>
                            <td>Grooming</td>
                            <td>Untuk wanita menggunakan make up, lipstick yang serasi. Tatanan rambut/hijab rapi. Untuk wanita tidak menggunakan pewarna rambut dengan warna yang berlebihan.  Rambut pria menggunakan  gel, dan penampilan rapi secara keseluruhan. Menjaga kesegaran aroma tubuh dan mulut.</td>
                            <td><?php echo $row->gromming ?></td>
                        </tr>
                        <tr>
                            <td>Uniform /Shoes/Device/Name Tag</td>
                            <td>Seragam rapi, bersih dan tidak kusut. Sepatu bersih dan menggunakan kaos kaki.  Layar laptop tampak bersih dan petugas wajib menggunakan name tag.</td>
                            <td><?php echo $row->uniform ?></td>
                        </tr>

                        <tr>
                            <td rowspan="4">SERVICE DELIVERY</td>
                            <td>Open/Close Greeting And  Etiquette Of Picking Up Customers </td>
                            <td>Petugas mengucapkan Selamat (Pagi/Siang/Sore). Pada saat menghampiri pelanggan, petugas wajib memperkenalkan diri kemudian memilih tempat duduk yang pas dan nyaman untuk proses layanan.  Contoh "Selamat Pagi Bapak, Nomor Antrian A123..? Dengan Saya Ariska Dibantu Sebelah Sana Ya Pak" | Ketika mengucapkan kalimat Open Greeting posisi kedua belah telapak tangan petugas saling menutup. Pada saat berjalan menuju tempat duduk, petugas wajib jalan bersamaan dengan pelanggan dan jarak ideal antara pelanggan dan petugas adalah 1 meter, kemudian memastikan pelanggan duduk terlebih dahulu disusul oleh petugas, begitu juga sebaliknya setelah selesai layanan.</td>
                            <td><?php echo $row->greeting ?></td>
                        </tr>
                        <tr>
                            <td>Customer Intimacy, Attitude & Empathy </td>
                            <td>Membuat suasana layanan menjadi lebih akrab dan tidak kaku. Petugas wajib menanyakan nama dan menyebut nama pelanggan minimal 3 kali, serta kontak mata dengan pelanggan yang sedang di layani, bahasa tubuh petugas tegak, tidak menopang dagu, tidak menyilangkan kaki pada saat duduk, Selama proses layanan berlangsung petugas menunjukkan ekpresi empati (khususnya untuk pelanggan komplain).  Untuk keperluan ijin interupsi meninggalkan pelanggan, petugas menyebutkan durasi ijin menunggu dan mengucapkan mohon ijin menunggu serta terimakasih karena telah menunggu.</td>
                            <td><?php echo $row->intimasi ?></td>
                        </tr>
                        <tr>
                            <td>Communication Skills</td>
                            <td>Petugas mampu berkomunikasi dengan baik dan efektif, menggunakan pilihan bahasa yang formal. Gaya komunikasi meyakinkan serta percaya diri. Intonasi suara normal dan artikulasi yang jelas.</td>
                            <td><?php echo $row->komunikasi ?></td>
                        </tr>
                        <tr>
                            <td>Customer Experience Survey</td>
                            <td>Melakukan konfirmasi kepada pelanggan bahwa  seluruh layanan telah terselesaikan dengan baik dan jelas, kamudian petugas meng-edukasi "Customer Experience Survey"  terhadap layanan yang telah diberikan.</td>
                            <td><?php echo $row->survey ?></td>
                        </tr>
                    <form method="POST" action="<?php echo base_url('Starla_controller/total_nilai'); ?>">
                        <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                        <tr class="bg-primary">
                            <th>Total</th>
                            <td></td>
                            <td></td>
                            <td>
                                <input class="bg-primary" style="pointer-events:none; color: black; font-weight: bold" type="text" name="total" value="<?php echo $total = $total + $row->info + $row->validasi + $row->identifikasi + $row->eskalasi + $row->dokumentasi + $row->selling + $row->digital + $row->nego
                                    + $row->gromming + $row->uniform + $row->greeting + $row->intimasi + $row->komunikasi + $row->survey ?>">
                            </td>

                        </tr>
                        </tbody>
                </table>
            <!--    <div>-->
            <!--        <a href="--><?php //echo site_url('Starla_controller/insert_view'.$row->id); ?><!--">View</a>-->
            <!--    </div>-->
                    <button style="float:right; margin-top: 10px" class="btn btn-primary" type="submit">Kirim Nilai</button>
                    </form>
            <!--        <a style="float:left; margin-top: 10px" class="btn btn-primary" href="--><?php //echo base_url('Starla_controller/plcsr_list'); ?><!--">Back</a>-->

            </div>

        </div>
    </section>
</div>