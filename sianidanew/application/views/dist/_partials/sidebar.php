<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php

if ($this->ion_auth->user()->row() == null) {
    redirect(site_url('user/login'));
    exit();
}

?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">SIA 2.0</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">SA</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
              <a href="<?php echo base_url(''); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">View</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'layout_default' || $this->uri->segment(2) == 'layout_transparent' || $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>View</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url(); ?>registrasi">Unreg Prepaid</a></li>
                <li><a class="nav-link" href="<?php echo base_url(); ?>regprepaid">Registrasi Prepaid</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/telkom2">Workbook Telkom</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/telkomsel2">Workbook Telkomsel</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/psbtelkomsel">PSB Telkomsel</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/listbast">Bast</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>rast_controler">Restitusi/Claim/Ticketing</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>ReaktivasiKartuHalo">Reaktivasi Kartu Halo</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Mbanking_Controller/mbanking_list">List GK M-banking</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Restitusi_controller/restitusi_list">List Rest / Lap</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Starla_controller/plcsr_list">List Starla</a></li>
              </ul>
            </li>
            <li class="menu-header">Form</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url(); ?>registrasi/create">Unreg Prepaid</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>regprepaid/create">Registrasi Prepaid</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/create?telkom=true">Workbook Telkom</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>logbook/create">Workbook Telkomsel</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>rast/new">Restitusi/Claim/Ticketing</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>ReaktivasiKartuHalo/create">Reaktivasi Kartu Halo</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Mbanking_Controller/mbanking">Ceklist GK M-banking</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Restitusi_controller/restitusi">Restitusi / Laporan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>Starla_controller/plcsr">Starla</a></li>
              </ul>
            </li>

            <li class="menu-header">Laporan</li>
              <li class="dropdown <?php echo $this->uri->segment(2) == 'components_article' || $this->uri->segment(2) == 'components_avatar' || $this->uri->segment(2) == 'components_chat_box' || $this->uri->segment(2) == 'components_empty_state' || $this->uri->segment(2) == 'components_gallery' || $this->uri->segment(2) == 'components_hero' || $this->uri->segment(2) == 'components_multiple_upload' || $this->uri->segment(2) == 'components_pricing' || $this->uri->segment(2) == 'components_statistic' || $this->uri->segment(2) == 'components_tab' || $this->uri->segment(2) == 'components_table' || $this->uri->segment(2) == 'components_user' || $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Laporan</span></a>
                  <ul class="dropdown-menu">
                      <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>laporan">All Laporan</a></li>
                     <li class="<?php echo $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>/Starla_controller/report_starla">Laporan Starla</a></li>
                      <li class="<?php echo $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>/laporan/resttimer">Laporan Aimer</a></li>
                  </ul>
              </li>
              <li class="menu-header">Data Grapari</li>
              <li class="dropdown <?php echo $this->uri->segment(2) == 'utilities_invoice' ? 'active' : ''; ?>">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Data All Grapari</span></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url(); ?>dist/utilities_contact">Grapari Own</a></li>
                      <li><a href="<?php echo base_url(); ?>dist/utilities_subscribe">Grapari Mitra</a></li>
                      <li><a href="<?php echo base_url(); ?>dist/utilities_subscribe">Grapari Loop</a></li>
                      <li><a href="<?php echo base_url(); ?>dist/utilities_subscribe">Grapari GTG</a></li>
                  </ul>
              </li>

              <li class="menu-header">Auth</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>dist/auth_forgot_password">Forgot Password</a></li>
                <li><a href="<?php echo base_url(); ?>dist/auth_login">Login</a></li>
                <li><a href="<?php echo base_url(); ?>dist/auth_register">Register</a></li>
                <li><a href="<?php echo base_url(); ?>dist/auth_reset_password">Reset Password</a></li>
              </ul>
            </li>
           </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?php echo base_url('test/timer'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-clock"></i>Rest Timer
            </a>
          </div>
        </aside>
      </div>
