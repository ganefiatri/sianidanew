 <style>
    .blink_me {
        animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
        50% { opacity: 0; }
    }
</style>

<?php
if (!isset($content_wrapper_css)) {
    $content_wrapper_css = null;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeIn" style="background-color: hsla(0,0%,93.3%,0.7); <?php echo $content_wrapper_css ?>">
    <section class="content-header">
        <h1><?php
            if (!empty($page_title)) {
                echo $page_title;
            }
            ?></h1>
    </section>

    <section class="content">
        <div class="row">
            <?php $this->load->view($v); ?>
        </div>
    </section>
</div>

