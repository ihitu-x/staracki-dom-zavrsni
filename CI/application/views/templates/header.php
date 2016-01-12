<!doctype html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<title> Tutorial </title>	
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	
    	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-clockpicker.min.css">
    	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-clockpicker.min.js"></script>
	
		<style type="text/css">
	
		.kalendar {
			text-align: center;
		}
		
		.izabrani {
			background-color: red;
		}
		
		.sidebar {
			background-color: #f5f5f5;
		}
		
		.red-cell {
			background: #F00; /* Or some other color */
		}
		
		html, body, .container-fluid, .row {
			height: 100%;
		}

		body { padding-top: 70px; }

		@media (min-width: 992px) {
  		.sidebar {
    		position: fixed;
    		top: 52px;
    		left: 0;
    		bottom: 0;
    		z-index: 1000;
    		display: block;
    		background-color: #f5f5f5;
  		}
		}
		
		</style>
		
				
		<script>
			$(function() {
        		$(".dropdown").hover(
            		function(){ $(this).addClass('open') },
            		function(){ $(this).removeClass('open') }
        		);
        		
        		
        	});
        		
        	
		</script>
		
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LOGO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li><a href="<?php echo site_url('kalendar/prikaz'); ?>">Kalendar</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upis <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('korisnik/upisKorisnika'); ?>">Korisnika</a></li>
            <li><a href="<?php echo site_url('Operacije/upisOperacije'); ?>">Operacije</a></li>
          </ul>
        </li>
        <li><a href="<?php echo site_url(); ?>">Prikaz</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('login'); ?>">ADMIN</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		
		
		
		
		
		
		
		