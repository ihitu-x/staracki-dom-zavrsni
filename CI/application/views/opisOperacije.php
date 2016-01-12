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
	<div class="col-md-3 col-xs-3 text-left">
		<h4><label for="ime">Ime:</label></h4>
	</div>
	<div class="col-md-3 col-xs-3 text-left">
		<h4><?php echo $operacija->ime; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-3 text-left">
		<h4><label for="prezime">Prezime:</label></h4>
	</div>
	<div class="col-md-3 col-xs-3 text-left">
		<h4><?php echo $operacija->prezime; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-3 text-left">
		<h4><label for="oib">Operacija:</label></h4>
	</div>
	<div class="col-md-3 col-xs-3 text-left">
		<h4><?php echo $operacija->naziv_operacije; ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-xs-3 text-left">
		<h4><label for="datum">Datum Operacije:</label></h4>
	</div>
	<div class="col-md-4 col-xs-4 text-left">
		<h4>
		<?php
			$date = new DateTime($operacija->datum);
			echo '<br/>'.date_format($date, 'd.m.Y '); 
		?>
		</h4>
	</div>
</div>

<?php if($operacija->vrsta == 2) : ?>

<div class="row">
	<div class="col-md-3 col-xs-3 text-left">
		<h4><label for="datum">Operaciju Izvršio: </label></h4>
	</div>
	<div class="col-md-4 col-xs-4 text-left">
		
		<?php
    	$options = array();

		foreach($djelatnici as $djelatnik) {
			$options[$djelatnik['sifra_djelatnika']] = $djelatnik['ime_djelatnika'].' '.$djelatnik['prezime_djelatnika'];
		}
		echo form_dropdown('djelatnik', $options, array(), 'class="form-control"');
    	?>
		
	</div>
</div>

<?php endif; ?>
</div> <!-- Col-md-6 -->

<div class="col-md-6">

<?php $hidden = array('id'	=>	$operacija->sifra_onk); ?>
<?php echo form_open('/Operacije/unosOpisaOperacije', '', $hidden) ?>

	<h3><label for="dijagnoza">Dijagnoza</label></h3>
    	<textarea name="opis" class="form-control" rows="16"><?php echo $operacija->opis_izvrsene_operacije ?></textarea><br />
	
	<div class="checkbox">
		<label>
			<?php echo form_checkbox('operacijaIzvrsena', 'izvrseno', FALSE); ?> Operacija izvršena
		</label>
	</div>

    <input type="submit" name="submit" value="Spremi Promjene" class="btn btn-primary" />
    
</form>
</div>

</div>
</div>
</div>


</div> <!-- Row -->
</div> <!-- Container -->