<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Camera Capture Demo</title>
        <script src="<?php echo base_url() ?>/assets/templates/bower_components/jquery/dist/jquery.js"></script>
        <script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/swfobject.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/canvas-to-blob.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/jpeg_camera/vendor/assets/javascripts/jpeg_camera/jpeg_camera.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/jpeg_camera/demo/demo.js') ?>" type="text/javascript"></script>
        <link href="<?= base_url('assets/jpeg_camera/demo/demo.css') ?>" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <?php var_dump($test1); ?>


        <div id="camera_info"></div>
        <div id="stream_stats"></div>

        <div id="camera">
            <div class="placeholder">
                Your browser does not support camera access.<br>
                We recommend
                <a href="https://www.google.com/chrome/" target="_blank">Chrome</a>
                &mdash; modern, secure, fast browser from Google.<br>
                It's free.
            </div>
        </div><br>

        <button id="take_snapshots">Take more snapshots</button>
        <button id="show_stream">Show stream</button><br>

        <div id="snapshots"></div>

        <button id="discard_snapshot">Discard snapshot</button>
        <button id="upload_snapshot">Upload to URL</button><br>

        <input type="text" id="api_url" placeholder="https://example.com/upload"><br>

        <img src="loader.gif" id="loader">
        <div id="upload_status"></div>
        <div id="upload_result"></div>
    </body>

</html>