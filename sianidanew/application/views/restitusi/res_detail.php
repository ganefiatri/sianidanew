<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Script to print the content of a div -->
<script>
    function printDiv() {
        var divContents = document.getElementById("restitusiPrint").innerHTML;
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
                <div class="breadcrumb-item"><a href="#">Klaim & Ticketing</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">
            <div id="restitusiPrint" style="padding:50px;">
                <div>
                    <h2 style="text-align: center; margin-bottom: 20px">BERITA ACARA RESTITUSI</h2><br>
                    <p>Pada hari ini tanggal <?php echo date("d", $res->date) ?> bulan <?php echo date("m", $res->date) ?> tahun 20<?php echo date("y", $res->date) ?> bertempat di plasa telkom Group Medan Menunjukkan laporan keluhan pelanggan nomor telah disetujui untuk diberikan non tunai
                        sebanyak Rp.<?php echo $res->nominal ?> (Terbilang .<?php echo $res->nominal_text ?> )</p><br>
                    <p>Demikian berita acara ini dibuat dengan sebenar-benarnya dan untuk digunakan sebagai dasar penyelesaian keluhan pelanggan yang dimaksud.</p>
                    <!-- signature -->

                    <table style="width:100%;">
                        <td style="width: 50%; float:left;">
                            <p>SPV</p>
                            <p>( Henriques )</p>
                            <img src="https://10.33.26.97/formdisclaimer/sign/spv.png" style="min-height: 150px; height: 150px;"/>
                        </td>

                    </table>

                    <!-- signature -->
                </div>
                <br><br>
                <div>
                    <h2 style="text-align: center; margin-bottom: 20px">LAPORAN KELUHAN PELANGGAN</h2><br>
                    <hr>
                    <table class="table-wrapper-scroll-y my-custom-scrollbar">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width:200px;padding:20px">Nomor Pelanggan</td>
                            <td><?php echo $res->nomor_pelanggan ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Nama Pelapor</td>
                            <td><?php echo $res->nama_pelapor ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Nama Pelanggan</td>
                            <td><?php echo $res->nama_pelanggan ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Relasi</td>
                            <td><?php echo $res->relasi ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Nominal Restitusi</td>
                            <td><?php echo $res->nominal ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Jenis Permasalahan</td>
                            <td><?php echo $res->jenis_masalah ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Alasan</td>
                            <td><?php echo $res->alasan ?></td>
                        </tr>
                        <tr>
                            <td style="padding:20px">Uraian Pelapor</td>
                            <td><?php echo $res->uraian ?></td>
                        </tr>
                    </table>

                    <!-- signature -->

                    <table style="width:100%; margin-top: 50px">
                        <td style="width: 50%">
                            <p>CS</p>
                            <p><?php echo sprintf('( %s )', $this->ion_auth->user($res->author)->row()->full_name) ?></p>
                            <img src="<?php echo base_url('sign/cs/' . $this->ion_auth->user($res->author)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
                        </td>
                        <td style="width: 50%; float:right;">
                            <form method="POST" action="<?php echo site_url('Restitusi_controller/restitusi_sign2') ?>">
                                <p>PELAPOR</p>
                                <!--                <input style="display:none" name="author_sign" type="text" value="--><?php //echo $this->ion_auth->user()->row()->id ?><!--">-->
                                <p>( <?php echo $res->nama_pelapor ?> )</p>
                                <?php if ($res->author_sign2 != null OR $res->signature2 != null) { ?>

                                    <?php if($res->signature_true2 == 0){ ?>
                                    <div class="sigPad signed" style="margin-left:-100px;">
                                        <div class="sigWrapper">
                                            <canvas class="pad" width="220px"></canvas>
                                        </div>
                                    </div>

                                    <script>
                                        var sig = <?php echo $res->author_sign ?>;
                                        $(document).ready(function() {
                                            $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                                            const data = $('.sigPad').signaturePad.toDataURL();
                                            signaturePad.clear();
                                            signaturePad.fromDataURL(data);
                                        });
                                    </script>
                                <?php }else{ $res->signature2 ?>
                                <img class="pad" width="220px" src="<?= $res->author_sign2?>" />
                                <?php }?>
                                <?php } else { ?>
                                    <div id="signature-pad2" class="signature-pad">
                                        <div class="signature-pad--body">
                                            <canvas width="220px" style="padding: 10px;border:1px dotted;    height: 171.98px;"></canvas>
                                        </div>
                                        <div class="signature-pad--footer">
                                            <div class="signature-pad--actions">
                                                <div>
                                                    <button type="button" class="button clear btn btn-sm btn-danger" data-action="clear">Clear</button>
                                                    <input type="submit" id="signaturestore2" value="Ok" class="btn btn-sm btn-success pull-right" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
                                    <script>
                                        var wrapper = document.getElementById("signature-pad2");
                                        var clearButton = wrapper.querySelector("[data-action=clear]");
                                        var canvas = wrapper.querySelector("canvas");
                                        var signaturePad = new SignaturePad(canvas, {
                                            // It's Necessary to use an opaque color when saving image as JPEG;
                                            // this option can be omitted if only saving as PNG or SVG
                                            backgroundColor: 'rgb(255, 255, 255)',
                                            penColor: 'blue',
                                            onEnd: function () {
                                                console.log(dataURL = signaturePad.toDataURL());
                                                if (signaturePad.isEmpty()) {

                                                }else{
                                                    $("#signaturestore2").prop("disabled", false);
                                                    $("#output").val(dataURL = signaturePad.toDataURL());
                                                }

                                            }
                                        });
                                        $("#signaturestore2").prop('disabled', true);
                                        // Adjust canvas coordinate space taking into account pixel ratio,
                                        // to make it look crisp on mobile devices.
                                        // This also causes canvas to be cleared.
                                        function resizeCanvas() {
                                            // When zoomed out to less than 100%, for some very strange reason,
                                            // some browsers report devicePixelRatio as less than 1
                                            // and only part of the canvas is cleared then.
                                            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

                                            // This part causes the canvas to be cleared
                                            canvas.width = canvas.offsetWidth * ratio;
                                            canvas.height = canvas.offsetHeight * ratio;
                                            canvas.getContext("2d").scale(ratio, ratio);

                                            // This library does not listen for canvas changes, so after the canvas is automatically
                                            // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
                                            // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
                                            // that the state of this library is consistent with visual state of the canvas, you
                                            // have to clear it manually.
                                            signaturePad.clear();
                                        }

                                        // On mobile devices it might make more sense to listen to orientation change,
                                        // rather than window resize events.
                                        window.onresize = resizeCanvas;
                                        resizeCanvas();


                                        clearButton.addEventListener("click", function (event) {
                                            signaturePad.clear();
                                            $("#signaturestore2").prop('disabled', true);
                                        });


                                    </script>
                                <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">

                                <input type="hidden" id="output" name="output" class="output" value="" required="required">

                                <?php } ?>
                            </form>
                        </td>
                    </table>

                    <!-- signature -->
                </div>
            </div>
            <input style="float:right; margin-right:30px" type="submit" value="Print" onClick="printDiv()">
            <a class="btn btn-primary" href="<?php echo base_url('Restitusi_controller/restitusi_list'); ?>" style="float:left; margin-left:50px">Back</a>
        </div>
    </section>
</div>


<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>
