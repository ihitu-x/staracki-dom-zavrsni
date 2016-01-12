<div class="container-fluid">
<div class="row">

<div class="col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          	<li><a href="<?php echo site_url('kalendar/prikaz'); ?>">Kalendar Operacija</a></li>
            <li><a href="<?php echo site_url('operacije/upisOperacijeUKalendar/zahvat'); ?>">Novi Zahvat</a></li>
            <li><a href="<?php echo site_url('operacije/upisOperacijeUKalendar/pregled'); ?>">Novi Pregled</a></li>
          </ul>
</div>

<div class="col-md-10 col-md-offset-2 main">
<h1 class="page-header text-center">Admin</h1>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 main text-center">
		<?php
		
			echo form_open('login/validateCredentials');
			
			echo '<div class ="form-group">';
				echo form_input('username','Username', 'class="form-control"');
			echo '</div>';
			
			echo '<div class ="form-group">';
				echo form_password('password', 'Password', 'class="form-control"');
			echo '</div>';
			
			echo form_submit('submit', 'Prijavi se', 'class="btn btn-primary center"');
		
		?>
		</div>
	</div>
</div>

</div>
</div>	