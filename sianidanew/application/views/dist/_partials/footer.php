<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php

if ($this->ion_auth->user()->row() == null) {
    redirect(site_url('user/login'));
    exit();
}

?>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="#">DUKTEK</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

<?php $this->load->view('dist/_partials/js'); ?>