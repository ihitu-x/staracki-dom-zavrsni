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
<h1 class="page-header text-center">UNOS U KALENDAR</h1>

<div class="row">
<div class="col-md-4 col-md-offset-4 jumbotron">

<?php
	
	$validationCheck = validation_errors();
	if(empty($validationCheck) === FALSE) {
		
			echo '<div class="alert alert-danger" role="alert">';
			echo $validationCheck;
			echo '</div>';
	}

?>

<?php echo form_open('Operacije/unosOperacijeUKalendar') ?> <!-- Forma za unos nove ONK -->
	
	<!-- Dropdown za prikaz svih korisnika -->
	
	<div class="form-group">
	 <label for="korisnik">Korisnik</label>
	<?php
    	$options = array();
		$options[0] = 'Odaberite Korisnika';
		foreach($korisnici as $rows) {
			$options[$rows->sifra_korisnika] = $rows->ime .' '. $rows->prezime;
		}
		echo form_dropdown('korisnik', $options, array(), 'class="form-control"');
    ?>
    </div>
    
    <!-- Dropdown za prikaz pregleda ili zahvata () -->
    
    <div class="form-group">
     <label for="naziv">Operacija</label>
    <?php
    	$options = array();
		$options[0] = 'Odaberite Operaciju';
		foreach($operacije as $rows) {
			$options[$rows->sifra_operacije] = $rows->naziv_operacije;
		}
		echo form_dropdown('operacija', $options, array(), 'class="form-control"');
    ?>
    </div>
	
	<!-- Datum -->
	<div class="form-group">
    <label for="naziv">Datum</label>
    	<div class="row">
    	
    		<div class="col-md-4">
    			<?php
    				$options = array();
    				$options['DD'] = 'DD';
					for($i = 1; $i <= 31; $i++) {
					
						$options[strval($i)] = strval($i);
					}
					echo form_dropdown('dd', $options, array(), 'class="form-control"');
    			?>
    		</div>
    		<div class="col-md-4">
    			<?php
    				$options = array();
    				$options['MM'] = 'MM';
					for($i = 1; $i <= 12; $i++) {
					
						$options[strval($i)] = strval($i);
					}
					echo form_dropdown('mm', $options, array(), 'class="form-control"');
    			?>
    		
    		</div>
    		<div class="col-md-4">
   			 	<?php
    				$options = array();
    			/*$options['2015'] = '2015';*/
					for($i = 2014; $i <= intval(date('Y')); $i++) {
					
						$options[strval($i+1)] = strval($i+1);
					}
					echo form_dropdown('yyyy', $options, array(), 'class="form-control"');
    			?>
    		
    		</div>
    	
    	</div>
	</div>
	
	<?php if(isset($vrsta)) : ?>
	
	<!-- Vrijeme -->
	<div class="form-group">
	<label for="naziv">Vrijeme</label>
		<div class="input-group clockpicker">
    		<input type="text" class="form-control" value="00:00" name="hh">
    		<span class="input-group-addon">
        		<span class="glyphicon glyphicon-time"></span>
    		</span>
		</div>
		<script type="text/javascript">
			$('.clockpicker').clockpicker();
		</script>
	</div>  
	<?php endif; ?>
	
    <input type="submit" name="submit" value="Dodaj u Kalendar" class="btn btn-primary" />

</form>

</div>	<!-- col-md-4 col-md-offset-4 jumbotron -->
</div>  <!-- Kraj "row" -->

</div>  <!-- Kraj "col-md-10 col-md-offset-2 main" -->

</div>	<!-- Kraj "row" -->
</div>	<!-- Kraj "container fluid" -->


	
	
	
	
	