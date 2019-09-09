<body>

    <!-- Fixed navbar -->
    <!--
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background: #24292e; font-size: 16px; border-bottom: 3px #ccc solid;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $title;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()?>">Logbook</a></li>
            <li><a href="#">Pencarian</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="margin: 5px;"><a href="#" class="btn btn-success btn-sm" role="button" style="  padding: 7px;
    color: #fff; /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#499bea+0">New Logbook</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/.nav-collapse -->

    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>index.php">Home</a></li>
          <?php if(!empty($this->uri->segment(1, 0)))
          {
            echo sprintf('<li><a href="%sindex.php?/%s">%s</a></li>',base_url(),$this->uri->segment(1, 0),$this->uri->segment(1, 0));
          }
          ?>
          <?php if(!empty($this->uri->segment(2, 0)))
          {

            echo sprintf('<li><a href="%sindex.php?/%s/%s">%s</a></li>',base_url(),$this->uri->segment(1, 0),$this->uri->segment(2, 0),$this->uri->segment(2, 0));
          }
          ?>
      </ol>
        <?php $this->load->view($v); ?>
	</div>
</body>
