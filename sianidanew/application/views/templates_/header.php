<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
<script src="<?= base_url('assets/jquery.vticker.min.js') ?>"></script>
<style>

    #SearchTable{
        position: absolute;
        right: 20px;
        width: 220px;
        top: 15px;
        box-shadow: 0px 0px 12px 0px #ccc;
    }
    div#timer > span {
        padding: 15px;
        color: #000;
        font-size: 24px;
        width:50px;
        border-radius: 100px;
        background: green;
        color: #fff;
    }</style>
    <?php
    $user_pic = base_url() . 'assets/user.png';
    if ($this->ion_auth->user()->row() == null) {
        redirect(site_url('user/login'));
        exit();
    }
    $user = $this->ion_auth->user()->row();

    $user_name = $user->username;
    $full_name = $user->full_name;
    $group = $this->ion_auth->get_users_groups()->row();

    $menu = array(
        'Dashboard' => array('icon' => 'fa fa-tachometer', 'link' => site_url('dashboard'), 'c' => 'dashboard', 'group' => array('2'),),
        /*
          'Visit Cashier' => array('icon' => 'glyphicon glyphicon-road', 'link' => site_url('VisitCashier'), 'c' => 'VisitCashier', 'group' => array('3'), 'submenu' => array(
          'Form' => array('link' => site_url('VisitCashier')),
          'Statistik' => array('link' => site_url('VisitCashier/stats'))
          )),

         */
        'Form' => array('icon' => 'fa fa-plus-circle', 'link' => base_url(), 'c' => '', 'group' => array('2'), 'submenu' => array(
                'UnReg Prepaid' => array('link' => site_url('registrasi/create')),
                'Registrasi Prepaid' => array('link' => site_url('regprepaid/create'), 'group' => array(1, 2, 3)),
                'Disclaimer' => array('link' => site_url('home/NewForm')),
                'Workbook Telkom' => array('link' => site_url('/logbook/create?telkom=true')),
                'Workbook Telkomsel' => array('link' => site_url('/logbook/create')),
                'RESTITUSI & TICKETING' => array('link' => site_url('/rast/new')),
                'Reaktivasi Kartu Halo' => array('link' => site_url('/ReaktivasiKartuHalo/create'))
            )),
        'View' => array('icon' => 'fa fa-book', 'link' => '#', 'c' => '', 'group' => array('2'), 'submenu' => array(
                'UnReg Prepaid' => array('link' => site_url('registrasi'), 'group' => array(1, 2, 3)),
                'Registrasi Prepaid' => array('link' => site_url('regprepaid'), 'group' => array(1, 2, 3)),
                'Disclaimer' => array('link' => site_url('home')),
                'Workbook Telkom' => array('link' => site_url('/logbook/telkom2')),
                'Workbook Telkomsel' => array('link' => site_url('/logbook/telkomsel2')),
                'PSB TSEL' => array('link' => site_url('/logbook/psbtelkomsel')),
                // 'GANTI PAKET TSEL' => array('link' => site_url('logbook/gantipakettelkomsel')),
                'BAST' => array('link' => site_url('/logbook/listbast')),
                'RESTITUSI & TICKETING' => array('link' => site_url('rast_controler')),
                'Reaktivasi Kartu Halo' => array('link' => site_url('/ReaktivasiKartuHalo')),
                // 'Revenue Prepaid & Postpaid' =>  array('link' => site_url('laporan')),
                //'Croselling Telkom (underwere)' => array('link' => site_url('/logbook/croselling')),
            )),

        'Laporan' => array('icon' => 'fa fa-columns', 'link' => site_url('laporan'), 'c' => 'laporan'),
        'User Management' => array('icon' => 'fa fa-user', 'c' => 'user', 'link' => site_url('user/ulist'), 'group' => array('1'), 'submenu' => array(
                'User' => array('link' => site_url('user/ulist')),
                'Group' => array('link' => site_url('user/glist')))
        ),
        'PLCSR' => array('icon' => 'fa fa-book', 'c' => 'user', 'link' => site_url('/logbook/plcsr')),
        'E-form & E-sign' => array('icon' => 'fa fa-book', 'c' => 'user', 'link' => site_url('/logbook/esign')),
        // 'Edit Prepaid & Postpaid' => array('icon' => 'fa fa-book', 'c' => 'user', 'link' => site_url('laporan/laporan_admin'), 'group' => array('1')),

        'Sign Out' => array('icon' => 'fa fa-power-off', 'link' => site_url('user/logout'), 'c' => '')
    );

    if (!empty($this->session->userdata('item'))) {
        $user_pic = $this->session->userdata('item');
    }
    ?>
<style>
    .info-box-icon,
    .info-box,
    .btn,
    .daterangepicker,
    input[type=button].btn-block, input[type=reset].btn-block, input[type=submit].btn-block,
    .box{
        border-radius: 16px !important;
    }
    .daterangepicker{box-shadow: rgb(204, 204, 204) 1px 1px 10px 2px};
    .skin-red .main-header .navbar .nav>li>a{
        color:#000 !important;
    }
    .a:hover{transition:all 1.5s;}
    .skin-red .main-header .navbar {
        background-color: $primary_color;
    }
    .box.box-primary {
        border-top-color: <?php echo $primary_color ?>;
    }
    .modal-header.modal-primary {
        background:<?php echo $primary_color ?>;
        color:#fff;
    }
    .skin-red .main-header .logo {
        background-color: <?php echo $primary_color ?>;
        color: #fff;
        border-bottom: 1px solid <?php echo $primary_color ?>;
        border-right: 1px solid <?php echo $primary_color ?>;
    }
    .skin-red .wrapper, .skin-red .main-sidebar, .skin-red .left-side {
        background-color: #fff;
        border-right: 1px solid #ccc;
    }
    .skin-red .sidebar-menu>li:hover>a, .skin-red .sidebar-menu>li.active>a, .skin-red .sidebar-menu>li.menu-open>a {
        color: <?php echo $primary_color ?>;
        background:#fff;
    }
    .skin-red .sidebar-menu>li>.treeview-menu {
        margin: 0 15px;
        background: #fff;
    }

    .skin-red .sidebar-menu .treeview-menu>li.active>a, .skin-red .sidebar-menu .treeview-menu>li>a:hover,
    .skin-red .user-panel>.info, .skin-red .user-panel>.info>a {
        color: <?php echo $primary_color ?>;
    }
    .skin-red .sidebar-menu>li.header {
        color: <?php echo $accent_color ?>;
        background: #ccc;
    }
    .skin-red .sidebar a {
        color: <?php echo $accent_color ?>;
        font-weight:bold;
    }
    .skin-red .sidebar-menu>li.active>a {
        border-left-color: <?php echo $accent_color ?>;
    }
</style>
<body class="sidebar-mini skin-red hold-transition">
    <div class="wrapper">

        <header class="main-header animated fadeInDownBig" style="">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CC</b><Br>MDN</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg animated rubberBand infinite"><?php echo $title; ?></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <script type='text/javascript' src='https://cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js'></script>
                <script>
                    $(function() {
                        $mq = $('.marquee').marquee({
                            //speed in milliseconds of the marquee
                            duration: 40000,
                            //gap in pixels between the tickers
                            gap: 50,
                            //time in milliseconds before the marquee will start animating
                            delayBeforeStart: 0,
                            //'left' or 'right'
                            direction: 'left',
                            //true or false - should the marquee be duplicated to show an effect of continues flow
                            duplicated: true,
                            startVisible: true
                        });
                        //on hover start
                        $mq.hover(function() {
                            $mq.marquee('pause');
                        }, function() {
                            $mq.marquee('resume');

                        })
                    });


                </script>
                <Style>
                    .marquee {
                        width: 100%;
                        height: 50px;
                        overflow: hidden;
                        color: #fff;
                        line-height: 50px;
                        font-size: 20px;
                        font-weight: normal;
                    }
                </Style>
                <div class="col-md-12">

                    <div class="marquee">
                        SEBELUM DAN SESUDAH ISTIRAHAT WAJIB MELAKUKAN LOGIN DAN LOGOUT ISTIRAHAT. UNTUK HASIL CROSS AND UP SELLING SILAKAN DI ENTRY SECARA REAL TIME. KEPADA SELURUH CA AGAR SELALU KONSISTEN MELAKUKAN ENTRY DATA PADA WORKBOOK SIANIDA DAN MEMILIH KATEGORI SESUAI DENGAN PERMASALAHAN PELANGGAN. KEPATUHAN CA DALAM MENGENTRY DATA PADA APLIKASI SIANIDA MERUPAKAN SALAH SATU BAGIAN DARI PENILAIAN KUALITAS PEKERJAAN  CUSTOMER ADVISOR.
                    </div>

                </div>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu" style="display: none;">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img style="background:#fff;" src="<?php echo $user_pic; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $full_name ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $user_pic; ?>" class="img-circle" alt="User Image" style="background:#fff;">

                                    <p>
                                        <?php echo $user_name ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('user/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar animated fadeInLeftBig">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel" style="    height: 100px;">
                    <div class="pull-left image">
                        <img src="<?php echo $user_pic; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p style="color:#000"><?php echo sprintf('<small>%s</small>', $user_name) ?> </p>
                        <p style="color:#000"><?php echo 'Rp ' . number_format($this->Logbook_model->get_my_total_revenues($this->ion_auth->user()->row()->id, '', '', '.')) ?></p>
                        <a href="#" style="color:#000"><?php echo $group->name; ?></a>

                    </div>
                </div>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">

                    <?php
                    foreach ($menu as $filename => $value):

                        $attr_current = $menu_icon = $menu_sub_class = $treeview_class = null;
                        $pageTitle = is_array($value) ? $filename : $value;


                        if (array_key_exists('c', $value)) {
                            if (strtoupper($this->router->fetch_class()) == strtoupper($value['c'])) {
                                $attr_current = "active";
                            }
                        }
                        if (array_key_exists('group', $value)) {
                            if (!(in_array($group->id, $value['group'])) AND $group->id != 1) {
                                $attr_current .= 'hide';
                            }
                        }
                        $withsubmenu = array_key_exists("submenu", $value);
                        if (array_key_exists('icon', $value)) {
                            $menu_icon = sprintf('<i class="%s"></i>', $value['icon']);
                        }
                        if ($withsubmenu == TRUE) {
                            $treeview_class = 'treeview';
                            $menu_sub_class = '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>';
                        }

                        echo sprintf('<li class="%s %s">
          <a href="%s">
          %s <span>%s</span> %s
          </a>
          ', $attr_current, $treeview_class, $value['link'], $menu_icon, $filename, $menu_sub_class);

                        if ($withsubmenu == TRUE) {
                            echo '<ul class="treeview-menu">';

                            foreach ($value['submenu'] as $subfilename => $subpageTitle):
                                $attr_current_submenu = null;
                                if (array_key_exists('group', $subpageTitle)) {
                                    if (!(in_array($group->id, $subpageTitle['group'])) AND $group->id != 1) {
                                        $attr_current_submenu .= 'hide';
                                    }
                                }
                                $label_addition = null;
                                $sub_icon = '<i class="fa fa-chevron-right"></i>';
                                if (array_key_exists('icon', $subpageTitle)) {
                                    $sub_icon = sprintf('<i class="%s"></i>', $subpageTitle['icon']);
                                }
                                echo sprintf('<li class="%s"><a href="%s">%s %s <span class="pull-right-container">
              %s
            </span></a></li>', $attr_current_submenu, $subpageTitle['link'], $sub_icon, $subfilename, $label_addition);
                            endforeach;
                            echo '</ul>';
                        }

                        echo '</li>';

                    endforeach;
                    ?>
                </ul>
            </section>
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
                    $('#timer').html(('<span class>' + zeroFill(d.getHours(), 2) + '</span>' + ':' + '<span class>' + zeroFill(d.getMinutes(), 2) + '</span>' + ':' + '<span class>' + zeroFill(d.getSeconds(), 2) + '</span>'));
                }, 1000);
            </script>
            <div id="timer" class="well"></div>


            <div class="panel panel-default">
                <div class="panel-heading" style="text-al   ign: center;background-color: #f5f5f5;text-transform: uppercase;padding-bottom: 0px;border: none !important;font-family: 'Faster One', cursive;font-size: 26px;">Aimer</div>
                <div class="panel-body" style="background: #f5f5f5;padding-top:  0px;">
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
                    <a class="btn btn-default btn-sm col-md-6" id="start-time" <?= $startbtn ?> href="<?= site_url('breaktime/start') ?>" style="border-radius: 0px !important;background: orange;
                       border-radius: 0px !important;
                       color: #fff;">START</a>

                    <a style="border-radius: 0px !important;background:#ff0000;" class="btn btn-danger btn-sm col-md-6" href="<?= site_url('breaktime/stop') ?>">STOP</a>

                </div>
            </div>
            <i align="center">by Medi Hafiz</i>
            <!-- /.sidebar -->
        </aside>

        <style>
            .box{
                box-shadow: 0px 0px 12px 0px #ccc;
            }
            #SearchTable.form-control:focus {
                border-color: #3c8dbc;
                /* box-shadow: none; */
                box-shadow: 0px 0px 40px 0px #777;
            }
        </style>