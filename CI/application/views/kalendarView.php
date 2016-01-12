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
<h1 class="page-header text-center">KALENDAR</h1>

	<div class="row">
		<div class="col-md-4">
			<?php echo $kalendar; ?>
		</div>
		
		<div class="col-md-2">

		</div>
	
		<div class="col-md-6 ">
			<div id="tablicaOperacija">
				<?php if (!empty($onk)) : ?>
	
				<table class="table	table-bordered table-striped">
				<tbody>
					<tr>
						<th>#</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Vrsta</th>
						<th>Vrijeme</th>
						<th>Naziv</th>
						<th>Izvrseno</th>
					</tr>
				<?php $num = 1; ?>
				<?php foreach($onk as $rows) : ?>
					<tr>
						<td><?php echo $num ?></td>
						<td><?php echo $rows->ime; ?></td>
    					<td><?php echo $rows->prezime; ?></td>
    					<td>
    					<?php 
    						if($rows->vrsta == 1) {
    							echo 'Pregled';
    						} else {
    							echo 'Zahvat';
    						}
    					?>
    					</td>
    					<td><?php echo $rows->vrijeme; ?></td>
    					<td><?php echo $rows->naziv_operacije; ?></td>
    					<td>
    						<p><a href="<?php echo site_url('Operacije/opisOperacije/'.$rows->sifra_onk); ?>">
    						<?php if($rows->izvrsenost == 0) : ?>
    							<img src="<?php echo base_url();?>img/iks.png" class="img-responsive" alt="Responsive image">
    						<?php endif; ?>
    						<?php if($rows->izvrsenost == 1) : ?>
    							<img src="<?php echo base_url();?>img/kvacica.png" class="img-responsive" alt="Responsive image">
    						<?php endif; ?>
    						 </a></p>
    					</td>
    				</tr>
    			<?php $num++ ?>	
				<?php endforeach; ?>
				</tbody>
				</table>

				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

</div>
</div>	
	<script type="text/javascript">
		$(document).ready(function() {
		
			$( function() {
  				$('.day').click( function() {
  					$('.red-cell').removeClass('red-cell');
    				$(this).addClass("red-cell");
  				} );
			} );

		
			$('.kalendar .day').click(function() {
			
			
				var elem = $(this);
			
				day_num = $(this).find('.day_num').html();
				
				var form_data = {
					year : "<?php echo $year; ?>",
					month : "<?php echo $month; ?>",
					day : day_num
				};
				
				$.ajax({
					url: "http://176.32.230.18/codeigniter.com/CI/index.php/kalendar/prikazPonovo",
         			type: "POST",
         			data: form_data,
         			context: this,
         			success: function(msg){
                			$('#tablicaOperacija').html(msg);
                			
              			}
              		
				});
				
				return false;
			});
		});
	
	</script>