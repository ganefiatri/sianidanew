<?php
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
?>
<script>
    $(document).ready(function() {

        $('.tanggal').daterangepicker({
            "singleDatePicker": true,
            "alwaysShowCalendars": true,
            "drops": "up",
            startDate: moment().subtract(20, 'years'),
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
        var ktpalamat = $("textarea[name=ktpalamat]");
        var ktpzip = $("input[name=ktpzip]");
        var ktpkota = $("input[name=ktpkota]");
        var ktpprovinsi = $("input[name=ktpprovinsi]");

        var alamat = $("textarea[name=alamat]");
        var zip = $("input[name=zip]");
        var kota = $("input[name=kota]");
        var provinsi = $("input[name=provinsi]");
        $("#test").click(function() {
            alamat.val(ktpalamat.val());
            zip.val(ktpzip.val());
            kota.val(ktpkota.val());
            provinsi.val(ktpprovinsi.val());
        });
    });
</script>
<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <form role="form" class="box-body" action="" method="POST" enctype="text">
                <div class = "form-group">
                    <label for = "msisdn_name">Nama Pelanggan</label>
                    <input type = "name" name = "nama" class = "form-control" id = "nama" placeholder = "Enter Name" required = "required">
                </div>

                <div class = "form-group">
                    <label for = "msisdn_name">NIK KTP</label>
                    <input type = "name" readonly="readonly" name = "ktp" class = "form-control" id = "ktp" required = "required" value="<?= $val ?>">
                    <input type = "name" readonly="readonly" name = "lifetime" class = "form-control" id = "lifetime" required = "required" value="<?= $val_lifetime ?>">
                </div>
                <div class = "form-group">
                    <label for = "msisdn_name">Nomor KK</label>
                    <input type = "name" name = "kk" class = "form-control" id = "kk" required = "required">
                </div>
                <div class = "form-group">
                    <label for = "msisdn_name">Alamat sesuai Identitas</label>
                    <textarea name="ktpalamat" class="form-control"></textarea>
                    <input type="name" name="ktpzip" class="form-control" id="ktpzip" required = "required" placeholder="Kode Pos">
                    <input type="name" name="ktpkota" class="form-control" id="ktpkota" required = "required" placeholder="Kota">
                    <input type="name" name="ktpprovinsi" class="form-control" id="ktpprovinsi" required = "required" placeholder="Provinsi">
                </div>
                <button class="btn btn-primary" type="button" id="test">Alamat sesuai Identitas == Alamat domisili</button>
                <div class = "form-group">
                    <label for = "msisdn_name">Alamat domisili</label>
                    <textarea name="alamat" class="form-control"></textarea>
                    <input type="name" name="zip" class="form-control" id="ktpzip" required = "required" placeholder="Kode Pos">
                    <input type="name" name="kota" class="form-control" id="ktpkota" required = "required" placeholder="Kota">
                    <input type="name" name="provinsi" class="form-control" id="ktpprovinsi" required = "required" placeholder="Provinsi">
                </div>



                <div class="form-group">
                    <label for = "msisdn_name">Tempat Lahir / Tanggal Lahir</label>
                    <input type="name" name="tempatlahir" class="form-control" id="tempatlahir" required = "required" placeholder="Tempat Lahir">
                    <input type="name" name="tanggallahir" class="form-control tanggal" id="tanggallahir" required = "required" >
                </div>

                <div class="form-group">
                    <select name="nationality" class="form-control">
                        <?php
                        $default = null;
                        foreach ($countries as $r) {
                            if (strtoupper($r) == 'INDONESIA') {
                                $default = 'selected';
                            }
                            ?>
                            <option value="<?= strtoupper($r) ?>" <?= $default ?>><?= strtoupper($r) ?></option>
                            <?php $default = null; ?>
                            <?php
                        }
                        ?>

                    </select>
                </div>


                <div class="form-group">
                    <label for = "msisdn_name">TIPE : </label>
                    <label><input type="checkbox" name="type" value="1">M2M</label>
                    <label><input type="checkbox" name="type" value="2">Corporate</label>
                    <label><input type="checkbox" name="type" value="3">Community</label>
                </div>

                <div class="form-group">
                    <label for = "msisdn_name">STATEMENT : </label>
                    <textarea name="statement" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Save">
            </form>
        </div>
    </div>
</div>