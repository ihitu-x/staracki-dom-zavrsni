<div class="container-fluid">
<div class="row">

<div class="col-md-2 sidebar">
</div>

<div class="col-md-10 col-md-offset-2 main">
<h1 class="page-header text-center">PRIKAZ KORISNIKA</h1>
<div class="row">
<div class="col-md-8">

<div class="col-md-6">
<div class="row">
	<div class="col-md-3 col-xs-2 text-left">
		<h4><label for="ime">Ime:</label><h4>
	</div>
	<div class="col-md-3 col-xs-2 text-left">
		<h4><?php echo $korisnik->ime; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-2 text-left">
		<h4><label for="prezime">Prezime:</label></h4>
	</div>
	<div class="col-md-3 col-xs-2 text-left">
		<h4><?php echo $korisnik->prezime; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-2 text-left">
		<h4><label for="oib">OIB:</label></h4>
	</div>
	<div class="col-md-3 col-xs-2 text-left">
		<h4><?php echo $korisnik->OIB; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-2 text-left">
		<h4><label for="datum">Datum Rođenja:</label></h4>
	</div>
	<div class="col-md-4 col-xs-4 text-left">
		<h4>
		<?php 
			$date = new DateTime($korisnik->datum_rodjenja);
			echo '<br/>'.date_format($date, 'd.m.Y '); 
		?>
		</h4>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-md-12 col-xs-12 text-left">
		<h4><label for="datum">Dijagnoza</label></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-xs-12 text-right">
		<textarea name="opis" class="form-control" rows="10"><?php echo $korisnik->dijagnoza; ?></textarea><br />
	</div>
</div>

<?php $hidden = array('sifra_korisnika' => $korisnik->sifra_korisnika); ?>
<?php echo form_open('/Korisnik/izmjenaKorisnika', 'id="myForm"', $hidden) ?>

<div class="row">
	<div class="col-md-2 col-xs-2 text-left">
		<h4><label for="soba">Soba:</label></h4>
	</div>
	<div class="col-md-4 col-xs-2 text-left">
		<?php
    	$options = array();
			
			$options['soba'] = $korisnik->naziv_sobe;
		foreach($sobe as $soba_item) {
			$options[$soba_item['sifra_sobe']] = $soba_item['naziv_sobe'];
		}
		echo form_dropdown('soba', $options, array(), 'class="form-control" id="soba" disabled');
    	?></h4>
	</div>
	<div class="col-md-2 col-xs-2 text-left">
		<input type="button" onclick="enable()" value="Promjena Sobe" class="btn btn-primary">
	</div>	
</div>

<?php

		foreach($status as $status_item) {
			
			if($status_item['sifra_statusa'] != 1 ) {
				echo '<div class="radio">';
				echo '<label>';
				echo form_radio('status', $status_item['sifra_statusa']);
				echo ucwords($status_item['opis_statusa']);
				echo '</label>';
				echo '</div>';
			}
			
		}
		
    ?>

<input type="submit" onclick="enable();" name="submit" value="Spremi Promjene" class="btn btn-primary" />
</form>
<button onclick="location.href='<?php echo base_url();?>'" class="btn btn-primary">Izađi</button>

</div> <!-- Col-md-6 -->

<div class="col-md-6">

		<div id="tablicaOperacija">
				<?php if (!empty($onk)) : ?>
	
				<table class="table	table-bordered table-striped">
				<tbody>
					<tr>
						<th>#</th>
						<th>Vrsta</th>
						<th>Naziv</th>
						<th>Datum</th>
						<th>Izvršeno</th>
					</tr>
				<?php $num = 1; ?>
				<?php foreach($onk as $rows) : ?>
					<tr>
						<td><?php echo $num ?></td>
						<td>
						<?php 
							if($rows->vrsta == 1) {
    							echo 'Pregled';
    						} else {
    							echo 'Zahvat';
    						} 
						?>
						</td>
    					<td><?php echo $rows->naziv_operacije; ?></td>
    					<td>
    					<?php
    						$date = new DateTime($rows->datum);
							echo date_format($date, 'd.m.Y '); 
    					?>
    					</td>
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

</div> <!-- Row -->



</div> <!-- Container -->
<script>
function enable() {
    document.getElementById("soba").disabled=false;
}
function submitForm() {
	enable();
	document.getElementById("myForm").submit();
}
</script>





