<link href="<?= base_url('/assets/footable/css/footable.bootstrap.min.css') ?>" rel="stylesheet"/>
<script src="<?= base_url('/assets/footable/js/footable.min.js') ?>"></script>
<script>$(function() {
        $('.footable').footable();
    });</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="col-md-12" style="padding-top:10px;">
    <div class="form-group col-md-12" style="background-color:#ddd; margin:auto;padding:10px">
    
        <form method="post" action="">
        <label for ="">Customer Service</label>
        <select name="csnameform" class="form-control">
            <?php 
                foreach ($starla->result() as $row) {
                    echo sprintf('<option value="%s">%s</option>',
                    $this->ion_auth->user($row->author)->row()->full_name, $this->ion_auth->user($row->author)->row()->full_name);
                }
            ?>
        </select>
            <!-- <div class="form-group">
                <label for="tanggal">Tanggal Penilaian</label>
                <input name="tanggal" type="text" id="tanggal" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="topik">Topik Layanan</label>
                <input class="form-control" type="text" name="topik" placeholder="Masukkan Topik Layanan">
            </div>
            <div style="padding-top:10px">
                <button id="#" type="submit" class="btn btn-primary btn-sm">Kirim</button>
            </div>
        </form>
    </div>


<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "logbook/plcsr2";
    };
</script>

</div>
<?php //var_dump($starla) ?> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>