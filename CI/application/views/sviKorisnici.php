<div class="container-fluid">
<div class="row">

<div class="col-md-2 sidebar">
</div>

<div class="col-md-10 col-md-offset-2 main">
<h1 class="page-header text-center">PRIKAZ KORISNIKA</h1>
<div class="row">
<div class="col-md-offset-2 col-md-8">


<br />

<?php
	
	if(isset($novi)) {
		
			echo '<div class="alert alert-success" role="alert" id="success">';
			echo $novi;
			echo '</div>';
	}

?>

<table class="table	table-bordered table-striped">
	<tbody>
		<tr>
			<th>#</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>Soba</th>
			<th>  </th>
		</tr>
	<?php $num = 1; ?>
	<?php foreach($korisnici as $rows) : ?>
		<tr>
			<td><?php echo $num; ?></td>
			<td><?php echo $rows->ime; ?></td>
    		<td><?php echo $rows->prezime; ?></td>
    		<td><?php echo $rows->naziv_sobe; ?></td>
    		<td><p><a href="<?php echo site_url('korisnik/prikazJednogKorisnika/'.$rows->sifra_korisnika); ?>">Vise o Korisniku</a></p></td>
    	</tr>
    <?php $num++; ?>
	<?php endforeach; ?>
	</tbody>
</table>

<form id="start" action="<?php echo site_url('Korisnik/upisKorisnika'); ?>" method="POST" >
   <input type="submit" name="start" value="Dodaj Novog Korisnika" class="btn btn-primary" />
</form>

</div>
</div>

</div>
</div>
</div>

<script type="text/javascript">
	
		$(document).ready(function() {
		
			$('#success').delay(5000).animate({opacity: 0});
		});
	
</script>
