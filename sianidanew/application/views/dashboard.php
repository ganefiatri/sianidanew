
<div class="row" style="margin-top: -50px;    padding: 0px 15px;">
    <style>
        .info-box{
            background: rgba(13,28,45,.6);
            color: #fff;}
        </style>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <h1 style="color:#fff;font: 4rem/4.7rem helveticaneue-thin,Arial,sans-serif;font-size: 2.5em;">Welcome <b><?php echo $this->ion_auth->user()->row()->full_name ?></b></h1>
        <h4 style="color:#fff;"><?php echo $this->ion_auth->user()->row()->username ?></h4>
        <h4 style="color:#fff;"><?php echo date('jS F Y', time()) ?></h4>

    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 animated zoomInUp">
        <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="ion ion-pricetags"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Daily Revenue</span>
                <span class="info-box-number"><small>Rp.</small> <?php echo number_format($daily_revenue, 0, ",", ".") ?></span>
                <?php
                ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-6 col-sm-12 col-xs-12 animated zoomInUp">
        <div class="info-box">
            <span class="info-box-icon bg-navy"><i class="ion ion-pricetags"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Monthly Revenue</span>
                <span class="info-box-number"><small>Rp.</small> <?php echo number_format($monthly_revenue, 0, ",", ".") ?></span>
                <?php
                ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 animated zoomInUp">
        <div class="info-box">
            <span class="info-box-icon bg-teal"><i class="ion ion-pricetags"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Year to Year Revenue</span>
                <span class="info-box-number"><small>Rp.</small> <?php echo number_format($year_revenue, 0, ",", ".") ?></span>
                <?php
                ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 animated zoomInUp">
        <div class="info-box">
            <span class="info-box-icon bg-light-blue"><i class="ion ion-pricetags"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Revenue</span>
                <span class="info-box-number"><small>Rp.</small> <?php echo number_format($total_revenue, 0, ",", ".") ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

</div>
