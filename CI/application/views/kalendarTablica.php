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

