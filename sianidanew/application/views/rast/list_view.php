<?php $model = $this->Disclaimer_model ?>
<!--print to excel-->
<div class="div1 box-body" style="display:none">
    <table class="table">
        <thead>
        <th>Tanggal</th>
        <th>No tiket</th>
        <th>Customer Name</th>
        <th>No Fastel</th>
        <th>Alamat</th>
        <th>Dasar Rekomendasi</th>
        <th>Permasalahan Pelanggan</th>
        <th>Kesimpulan</th>
        <th>Jumlah</th>
        </thead>
        <?php
        foreach ($logbook[0]->result() as $row) {?>
            <tbody>
                <td class="col-md-6"><?php echo date("d-m-Y", $row->date) ?></td>
                <td class="col-md-6"><?php echo $row->no_tiket ?></td>
                <td class="col-md-6"><?php echo $row->namaplgn ?></td>
                <td class="col-md-6"><?php echo $row->nofastel ?></td>
                <td class="col-md-6"><?php echo $row->alamat ?></td>
                <td class="col-md-6"><?php echo $row->rekomendasi ?></td>
                <td class="col-md-6"><?php echo $row->permasalahan ?></td>
                <td class="col-md-6"><?php echo $row->kesimpulan ?></td>
                <td class="col-md-6"><?php echo $row->adjustmentval ?></td>
            </tbody>
        <?php } ?>
    </table>
</div>

<!--print to excel-->


<!-- <script type="text/javascript">
    function confirm() {
    var msg;
    msg= "Apakah Mang Kamu Yakin Akan Menghapus Data ? " ;
    var agree=confirm(msg);
    if (agree){
     return true ;   
    else
     return false ;    
    }
    
 }
</script> -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!--    test-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Klaim & Ticketing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">Klaim & Ticketing</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Klaim & Ticketing</h4>
                        <a href="<?php echo site_url('rast/new') ?>" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="New Form">
                            <h5 style="color: white;">Tambah</h5></a>
                        <a href="" id="klaim" class="btn btn-primary" onClick="">Print To Excel</a>
                    </div>
                    <!--print to excel-->
                    <script>
                        $("#klaim").click(function(e) {
                            let file = new Blob([$('.div1').html()], {type:"application/vnd.ms-excel"});
                            let url = URL.createObjectURL(file);
                            let a = $("<a />", {
                                href: url,
                                download: "klaim&ticketing.xls"}).appendTo("body").get(0).click();
                            e.preventDefault();
                        });
                    </script>
                    <!--print to excel-->
                    <div id="example2_wrapper" class="card-body">
                        <table id="example2" class="table">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Phone Number / Internet</th>
                                <th>CSR</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php
                            foreach ($logbook[0]->result() as $row) {?>
                            <tbody>
                            <td><?php echo $row->namaplgn ?></td>
                            <td><?php echo $row->nofastel ?></td>
                            <td><?php echo $this->ion_auth->user($row->author)->row()->full_name ?></td>
                            <td><?php echo date("d-m-Y", $row->date) ?></td>

                            <td style="">
                                <?php
                                if ($row->cek == 0){
                                    echo '<a href="#" class="btn btn-danger">NOT APPROVED</a>';
                                }else {
                                    echo '<a href="#" class="btn btn-success">NOT APPROVED</a>';
                                }
                                ?>
                            </td>

                            <td>
                                <a class="btn btn-primary" href="<?php echo site_url('rast_controler/detail/'. $row->id); ?>">View</a>
                                <?php $user = $this->session->userdata('username');
                                if($user == "henriques" || $user == "admin" || $user == "13009332" || $user == "medihafiz" || $user == "15009624" || $user == "18009334") { ?>
                                    <a class="btn btn-danger" onClick="return doconfirm();" href="<?php echo site_url('rast_controler/hapus/'. $row->id); ?>">Hapus</a>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <p><i>DELETE NYA MASIH DI KERJAIN</i><p/> -->
    <script>
        function doconfirm()
        {
            job=confirm("Are you sure to delete permanently?");
            if(job!=true)
            {
                return false;
            }
        }
    </script>

</div>

<!-- --><?php //echo $this->pagination->create_links(); ?>
<?php $this->load->view('dist/_partials/js'); ?>
