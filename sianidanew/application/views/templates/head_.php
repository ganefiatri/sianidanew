<head>
<title><?php echo $title;?></title>
<link rel="shortcut icon" href='favicon.ico'>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS ie8 harus via non-cdn-->
    <link href="<?php echo base_url()?>bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?php echo base_url()?>/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">    
	<!--link href="<?php echo base_url()?>/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet">-->
	<link href="<?php echo base_url()?>/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>ie/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>ie/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>ie/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<meta charset="utf-8">
	<style type="text/css">

	/*mencegah navbar kolaps*/
	.navbar-default .navbar-toggle {
    display: none;}
.navbar-collapse.collapse {
  display: block!important;
}

.navbar-nav>li, .navbar-nav {
  float: left !important;
}

.navbar-nav.navbar-right:last-child {
  margin-right: -15px !important;
}

.navbar-right {
  float: right!important;
}
/* end*/

.navbar-inverse .navbar-nav>li>a {
    color: #fff;
}

.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #000;
    background-color: #eee;
    }	
	.dropdown:hover .dropdown-byhover {
    	display: block;
    	margin-top: 0; // remove the gap so it doesn't close
 	}

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.pagefooter {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 0px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		padding: 10px;
	}

	/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 80px;
  background-color: #000;
}


/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

body > .container {
  padding: 60px 15px 0;
      /*padding-top: 110px;*/
}
.container .text-muted {
  margin: 20px 0;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

code {
  font-size: 80%;
}

	</style>

	<script src="<?php echo base_url()?>jquery/jquery-1.12.4.js"></script>
	<script src="<?php echo base_url()?>ie/jquery-placeholder-gh-pages/jquery.placeholder.min.js"></script>
	<script src="<?php echo base_url()?>ie/es5-shim.min.js"></script>	
 	<script>
			$(function() {
				$('input, textarea').placeholder({customClass:'my-placeholder'});
			});
	</script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!--script src="<?php echo base_url()?>bootstrap-markdown/js/bootstrap-markdown.js"></script>-->
    <script src="<?php echo base_url()?>ckeditor-nightly/ckeditor.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</head>