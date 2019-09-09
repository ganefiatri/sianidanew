<style>

    #camera {
        display: inline-block;

        height: 300px;

    }

    #camera .placeholder {
        padding: 0.5em;
    }

    #snapshots {
        height: 150px;
        margin: 0.5em 0;
        padding: 3px;

        border: 1px solid #aaa;

        white-space: nowrap;
        overflow-x: auto;
        overflow-y: hidden;
    }

    #snapshots canvas, #snapshots img {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;

        height: 100%;
        margin-left: 3px;
        border: 3px solid transparent;
    }

    #snapshots .selected {
        border: 3px solid #000;
    }

    #upload_status, #upload_result, #loader {
        margin: 0.5em;
    }
</style>
<script src="<?php echo base_url() ?>/assets/templates/bower_components/jquery/dist/jquery.js"></script>
<script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/swfobject.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/canvas-to-blob.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/jpeg_camera.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/jpeg_camera/demo/demo.js') ?>" type="text/javascript"></script>
<div class="panel panel-danger" style="padding:0px;">
    <div class="panel-heading">Attachment</div>
    <div class="panel-body">
        <div class="info" style="display:none">
            <div id="camera_info"></div>
            <div id="stream_stats"></div>
        </div>
        <div class="row">
            <div id="camera" class="col-md-9">
                <div class="placeholder">
                    Your browser does not support camera access.<br>
                    We recommend
                    <a href="https://www.google.com/chrome/" target="_blank">Chrome</a>
                    &mdash; modern, secure, fast browser from Google.<br>
                    It's free.
                </div>
            </div>
            <div class="col-md-3">
                <button id="take_snapshots" class="btn btn-success" style="width:100%">Cheese</button>
                <button id="show_stream" class="btn btn-danger" style="width:100%;display: none;">Webcam ON</button><br>
                <button id="discard_snapshot" class="btn btn-danger" style="width:100%;display: none;">Discard snapshot</button>
                <button id="upload_snapshot" class="btn btn-success" style="width:100%;display: none;">Upload to URL</button>
            </div>
        </div>
        <div id="snapshots"></div>
        <input type="hidden" id="api_url" value="<?= site_url('gallery/capture') ?>"><br>
        <div id="upload_status"></div>
        <div id="upload_result"></div>
    </div>
</div>