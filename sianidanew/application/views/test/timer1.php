<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rest Timer</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Rest Timer</div>
            </div>
        </div>

        <div class="section-body">
            <?php $today = getdate(); ?>
            <script>

                function zeroFill(number, width)
                {
                    width -= number.toString().length;
                    if (width > 0)
                    {
                        return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
                    }
                    return number + ""; // always return a string
                }
                var d = new Date(Date(<?php echo $today['year'] . "," . $today['mon'] . "," . $today['mday'] . "," . $today['hours'] . "," . $today['minutes'] . "," . $today['seconds']; ?>));
                setInterval(function() {
                    d.setSeconds(d.getSeconds() + 1);
                    $('#timer').html(('<span class="btn btn-warning" style="font-size: 25px;margin-right: 5px">' + zeroFill(d.getHours(), 2) + '</span>' + ':' + '<span class="btn btn-warning" style="font-size: 25px;margin-right: 5px;margin-left: 5px;">' + zeroFill(d.getMinutes(), 2) + '</span>' + ':' + '<span class="btn btn-warning" style="font-size: 25px;margin-left: 5px">' + zeroFill(d.getSeconds(), 2) + '</span>'));
                }, 1000);
            </script>
            <div id="timer" class="well" style="text-align: center"></div>


            <div class="panel panel-default" style="text-align: center">
                <div class="panel-heading">
                    <img style="width:400px; heigth:200px;" src="<?= base_url('/gambar/tenor.gif') ?>" alt="">
                </div>
                <!-- <div class="panel-heading" style="text-align: center;background-color: #f5f5f5;text-transform: uppercase;padding-bottom: 0px;border: none !important;font-family: 'Faster One', cursive;font-size: 26px;">Aimer</div> -->
                <div class="panel-body" style="">
                    <?php
                    $clockattr = $stopbtn = $startbtn = null;
                    $clockattr = 'data-autostart="false"';
                    $today = date('Y-m-d 00:00:00', time());
                    $todaytimestamp = DateTime::createFromFormat('Y-m-d H:i:s', $today);
                    $todaytimestamp = $todaytimestamp->getTimestamp();
                    $x = $this->db->get_where('breaktime', array('time' => $todaytimestamp, 'author' => $this->ion_auth->user()->row()->id));
                    if ($x->row() != null) {
                        $clockattr = 'data-autostart="true" data-starttime="' . $x->row()->start . '"';
                        $startbtn = 'disabled onclick="return false;"';
//                        $clockattr = $x->row()->start();
                    } else {
                        $stopbtn = 'disabled onclick="return false;"';
                    }
                    ?>
                    <script src="https://10.33.26.97/apptimercsr/bootstrap-datetimepicker/js/moment-with-locales.js"></script>
                    <script src="https://10.33.26.97/apptimercsr/jquery.tinytimer.js"></script>

                    <script>
                        /* test javascript */
                        var idText = "jt-t";
                        var i = 1;

                        function instantiateTimer(id, options) {
                            <?php
                            $sxstart = null;
                            if ($x->row() != null) {
                                if ($x->row()->start > 0) {
                                    $sxstart = $x->row()->start;
                                }
                            }
                            ?>
                            var options2;
                            // instantiate timer
                            var options = {
                                timerCounter: 1000 * <?= time() - $sxstart ?>
                            };

                            var timer = $("#counter").timer($.extend({}, options));
                            var timer_break = $("#counter-break").timer($.extend({}, options2));
                            var btn_start = $("#start-time");
                            var desc = $("#desc");
                            var desc_break = $("#desc-break");
                            var btn_stop = $("#stop-time");
                            var btn_break = $("#break");
                            var panel_counter = $("#panel-counter");
                            var txt_summary = $("#summary");
                            var btn_test = $("#btn-test");

                            btn_break.attr("disabled", true);
                            timer_break.css({display: 'none'});


                            // buttons
                            btn_start.click(function(event) {
                                timer.start();
                                btn_start.attr("disabled", true);

                                $.get("<?= site_url('breaktime/start') ?>", function(data, status) {
                                    console.log("Ekseskusi startcountert " + data + "\nStatus: " + status);
                                });
                            });




                            btn_break.click(function(event) {
                                if (btn_break.text() == 'BREAK')
                                {
                                    //timer_break.css({display:'block'});
                                    //timer_break.start();

                                    /*desc_break.text('Break');
                                     desc_break.css({ color:"yellow" });
                                     (function pulse(){
                                     desc_break.delay(100).animate({'opacity':1}).delay(100).animate({'opacity':0},pulse);
                                     })();
                                     btn_break.html('End Break');
                                     $.get("", function(data, status){
                                     console.log("Eksekusi startbreak " + data + "\nStatus: " + status);
                                     });
                                     btn_stop.attr("disabled", true);
                                     */
                                } else
                                {
                                }
                                console.log();


                            });
                            <?php
                            if ($x->row() != null) {
                            if ($x->row()->end == 0) {
                            ?>
                            btn_start.click();
                            <?php } else { ?>
                            btn_stop.click
                            <?php
                            }
                            }
                            ?>
                            btn_stop.click(function(event) {
                                $.get("<?= site_url('breaktime/stop') ?>", function(data, status) {
                                    //console.log("Ekseskusi startcountert " + data + "\nStatus: " + status);
                                });
                                timer.stop();

                            });

                        }

                        $().ready(function() {
                            instantiateTimer(idText + (i++), {refreshInterval: 1000});
                        });

                    </script>
                    <?php
                    ?>
                    <?php
                    if ($x->row() != null) {
                        if ($x->row()->end > 0) {
                            ?>
                            <span style="    font-size: 32px;
                                  text-align: center !important;
                                  display: block;"><?php
                                echo gmdate('H:i:s', $x->row()->end - $x->row()->start)
                                ?></span>
                        <?php } else {
                            ?>
                            <span id="counter" style="font-size: 32px;text-align: center !important;display: block;"></span>
                            <?php
                        }
                    }
                    ?>

                    <a class="btn btn-success" id="start-time" <?= $startbtn ?> href="<?= site_url('breaktime/start') ?>">START</a>
                    <a class="btn btn-danger" href="<?= site_url('breaktime/stop') ?>">STOP</a>

                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>
