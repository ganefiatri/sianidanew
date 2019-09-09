<?php
if ($penutupan == null) {
    ?>
    <form action="<?php echo site_url('logbook/penutupan_simpan') ?>" method="post">
        <div class="form-group">
            <label for="msisdn_number">Merk Perangkat</label>
            <select class="form-control" name="jenis_modem" required>
                <option value="ZTE">ZTE</option>
                <option value="HUAWEI">HUAWEI</option>
                <option value="TP-LINK">TP-LINK</option>
                <option value="WIFI-ID">WIFI-ID CISCO</option>
            </select>
        </div>
        <div class="form-group">
            <label for="msisdn_number">Serial Number</label>
            <input type="text" name = "serial_number" class = "form-control" id = "seria_number" required>
        </div>
<!-- 
        <div class="checkbox">
            <label><input name="merk_stb" type="checkbox">STB</label>
        </div> -->

        <div class="form-group">
            <label for="merk_stb">STB</label>
            <select class="form-control" name="merk_stb" id="merk_stb" required>
                <option value="STB ADA">Ada</option>
                <option value="STB TIDAK ADA">Tidak Ada</option>   
            </select>
        </div>

<!-- 
        <div class="form-group">
            <label for="msisdn_number">Merk STB</label>
            <input type="text" name="merk_stb" class = "form-control" id = "seria_number">
        </div> -->
        <Script>
            $(document).ready(function() {
                var selstatus = $("[name='halo']");
                var selccase = $("[name='merk_stb']");
                function syncstatus() {

                    if (jQuery.inArray(selccase.val(), ["STB ADA"]) >= 0) {
                        selstatus.prop('disabled', false);
                        $('#stbdiv').prop('disabled', true);
                        $('#stbdiv').show();
                        $('#seria_number').prop('required', true);
                    } else {
                        selstatus.prop('disabled', false);
                        $("#pakethalo").val("");
                        $('#stbdiv').hide();
                        $('#seria_number').removeAttr('required');
                    }
                    console.log(jQuery.inArray(selccase.val(), ["PSB HALO"]));
                }
                syncstatus();
                selccase.change(function() {
                    syncstatus();
                })
            });
        </Script>

        <div class="form-group" id="stbdiv">
            <label for="msisdn_number">Serial Number STB</label>
            <input type="text" name="stb_serial_number" class = "form-control" id ="seria_number" minlength="14" maxlength="30">
        </div>

        <div class="form-group">
            <label for="msisdn_number">Alamat Rumah</label>
            <input type="text" name = "alamat" class = "form-control" id = "alamat">
        </div>


        <div class="checkbox">
            <label><input name="adaptor" type="checkbox"> Adaptor</label>
        </div>
        <div class="checkbox">
            <label><input name="remote" type="checkbox"> Remote</label>
        </div>
        <input type="hidden" name="workbook_id" value="<?php echo $this->uri->segment(3, 0) ?>">
        <div class="checkbox">
            <label><input name="kabel" type="checkbox"> Kabel HDMI / RCA</label>
        </div>
        <div class="checkbox">
            <label><input name="kabel_lan" type="checkbox"> Kabel LAN</label>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
<?php } else {
    ?>
    <table class="table table-condensed">
        <thead>
        <th>Nama Perangkat</th>
        <th>Merk Perangkat</th>
        <th>S/N</th>
    </thead>
    <tr>
        <td>MODEM</td>
        <td><?php echo $penutupan->jenis_modem ?></td>
        <td><?php echo $penutupan->serial_number ?></td>
    </tr>
    <tr>
        <td>STB</td>
        <td><?php echo $penutupan->merk_stb ?></td>
        <td><?php echo $penutupan->sn_stb ?></td>
    </tr>
    </table>


    <table class="table table-condensed">
        <thead>
        <th>Adaptor</th>
        <th>Remote</th>
        <th>Kabel HDMI/RCA</th>
    </thead>
    <tr>
        <td><?php echo $at[$penutupan->adaptor] ?></td>
        <td><?php echo $at[$penutupan->remote] ?></td>
        <td><?php echo $at[$penutupan->kabel] ?></td>
    </tr>
    </table>
<?php }
?>