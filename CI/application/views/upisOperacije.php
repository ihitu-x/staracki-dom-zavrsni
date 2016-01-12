<div class="container-fluid">
<div class="row">

<div class="col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          	<li><a href="<?php echo site_url('korisnik/upisKorisnika'); ?>">Upis Korisnika</a></li>
            <li><a href="<?php echo site_url('Operacije/upisOperacije'); ?>">Upis Operacija</a></li>
          </ul>
</div>

<div class="col-md-10 col-md-offset-2 main">
<h1 class="page-header text-center">UPIS NOVE OPERACIJE</h1>
<div class="col-md-6 col-md-offset-2 jumbotron">

<!--<h2 class="text-center"><?php echo $title; ?></h2>-->

<?php
	
	$validationCheck = validation_errors();
	if(empty($validationCheck) === FALSE) {
		
			echo '<div class="alert alert-danger" role="alert">';
			echo $validationCheck;
			echo '</div>';
	}

?>

<?php echo form_open('Operacije/unosOperacije') ?>

	<?php

		foreach($vrsta as $vrsta_item) {
			
			echo '<div class="radio">';
			echo '<label>';
			echo form_radio('vrsta', $vrsta_item['sifra_vrste_operacije']);
			echo ucwords($vrsta_item['naziv']);
			echo '</label>';
			echo '</div>';
			
		}
		
    ?><br />

	<div class="form-group">
    	<label for="naziv">Naziv</label>
    	<input type="text" name="naziv" class="form-control" />
    </div>

    <label for="Opis">Opis</label>
    <textarea name="opis" class="form-control" rows="10"></textarea><br />

    <input type="submit" name="submit" value="Dodaj Novu Operaciju" class="btn btn-primary" />

</form>


</div>
</div>
</div> <!-- Kraj "row" -->
</div> <!-- Kraj "Container" -->
