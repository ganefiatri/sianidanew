<?php
if (!isset($template_head)) {
    $template_head = true;
}
if (!isset($template_header)) {
    $template_header = true;
}
if (!isset($template_body)) {
    $template_body = true;
}
if (!isset($template_footer)) {
    $template_footer = true;
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php if ($template_head == TRUE) $this->load->view('templates/head'); ?>
    <?php if ($template_header == TRUE) $this->load->view('templates/header'); ?>
    <?php
    if ($template_body == TRUE) {
        $this->load->view('templates/body');
    } else {
        $this->load->view($v);
    };
    ?>
<?php if ($template_footer == TRUE) $this->load->view('templates/footer'); ?>
</div><!-- ./wrapper -->
</body>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>/assets/templates/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/templates/dist/js/adminlte.js"></script>

</html>