<div class="container-fluid">


<div class="row">

<div class="col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          	<li><a href="<?php echo site_url('korisnik/upisKorisnika'); ?>">Upis Korisnika</a></li>
            <li><a href="<?php echo site_url('Operacije/upisOperacije'); ?>">Upis Operacija</a></li>
          </ul>
</div>

<div class="col-md-10 col-md-offset-2 main">
<h1 class="page-header text-center">UPIS NOVOG KORISNIKA</h1>

<div class="col-md-8 col-md-offset-2">
<div class="row jumbotron">

<?php
	
	$validationCheck = validation_errors();
	if(empty($validationCheck) === FALSE) {
		
			echo '<div class="alert alert-danger" role="alert">';
			echo $validationCheck;
			echo '</div>';
	}

?>

<div class="col-md-6">
<?php echo form_open('/Korisnik/unosKorisnika') ?>
	<div class="form-group">
    	<label for="ime">Ime</label>
    	<input type="text" name="ime" class="form-control" value="<?php echo set_value('ime'); ?>"/>
    </div>
    
    <div class="form-group">
    	<label for="prezime">Prezime</label>
    	<input type="text" name="prezime" class="form-control" value="<?php echo set_value('prezime'); ?>"/>
     </div>
    
    <div class="form-group">
    	<label for="oib">OIB</label>
    	<input type="text" name="oib" class="form-control" value="<?php echo set_value('oib'); ?>"/>
     </div>
    
    <div class="form-group">
    <label for="datum">Datum Rođenja</label>
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
    				$options['YYYY'] = 'YYYY';
					for($i = 1900; $i <= intval(date('Y')); $i++) {
					
						$options[strval($i)] = strval($i);
					}
					echo form_dropdown('yyyy', $options, array(), 'class="form-control"');
    			?>
    		
    		</div>
    	
    	</div>
     </div>
    
    <label for="soba">Soba</label>
    <?php
    	$options = array();

		foreach($sobe as $soba_item) {
			$options[$soba_item['sifra_sobe']] = $soba_item['naziv_sobe'];
		}
		echo form_dropdown('soba', $options, array(), 'class="form-control"');
    ?><br />
</div>

<div class="col-md-6">

    <label for="dijagnoza">Dijagnoza</label>
    <textarea name="dijagnoza" class="form-control" rows="16"><?php echo set_value('dijagnoza'); ?></textarea><br />

    <input type="submit" name="submit" value="Dodaj Novog Korisnika" class="btn btn-primary" />

</form>

</div>
</div> <!-- Kraj "col-md-6" -->
</div> <!-- Kraj "row jumbotron" -->
</div>
</div>
</div> <!-- Kraj "Container" -->

    
    
    
    
    
    