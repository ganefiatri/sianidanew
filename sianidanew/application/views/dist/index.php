<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-chart">
                      <canvas id="balance-chart" height="80"></canvas>
                  </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Daily Revenue</h4>
                  </div>
                  <div class="card-body">
                      <?php echo number_format($daily_revenue, 0, ",", ".") ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-chart">
                      <canvas id="balance-chart" height="80"></canvas>
                  </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Monthly Revenue</h4>
                  </div>
                  <div class="card-body">
                      <?php echo number_format($monthly_revenue, 0, ",", ".") ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-chart">
                      <canvas id="balance-chart" height="80"></canvas>
                  </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Year to Year Revenue</h4>
                  </div>
                  <div class="card-body">
                      <?php echo number_format($year_revenue, 0, ",", ".") ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-chart">
                      <canvas id="balance-chart" height="80"></canvas>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Total Revenue</h4>
                      </div>
                      <div class="card-body">
                          <?php echo number_format($total_revenue, 0, ",", ".") ?>
                      </div>
                  </div>
              </div>
          </div>
                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Budget vs Sales</h4>
                          </div>
                          <div class="card-body">
                              <canvas id="myChart" height="128"></canvas>
                          </div>
                      </div>
                  </div>
          </div>
        </section>
      </div>

<?php $this->load->view('dist/_partials/footer'); ?>