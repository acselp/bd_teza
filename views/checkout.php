<?php include_once(ROOT . "/views/blocks/head.php") ?>
<?php include_once(ROOT . "/views/blocks/header.php") ?>

	<section id="cart_items">
		<div class="container">
			<?php if(!$ordered): ?>
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-5 clearfix">
						
					</div>
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Confirmarea comenzii</p>
							<form method="POST">
								<?php if(!empty($userData)): ?>
									<input value="<?=$userData['fname']?>" type="text" name="fname" placeholder="Nume">
									<input value="<?=$userData['lname']?>" type="text" name="lname" placeholder="Prenume">
									<input value="<?=$userData['contact_nr']?>" type="text" name="tel" placeholder="Tel.">
									<input style="display: none;" type="text" name="id" value="<?=$userData['user_id']?>">
									<input type="submit" class="btn btn-primary" value="Submit" name="submit">
								<?php else:?>
									<input type="text" name="fname" placeholder="Nume">
									<input type="text" name="lname" placeholder="Prenume">
									<input type="text" name="tel" placeholder="Tel.">
									<input type="submit" class="btn btn-primary" value="Submit" name="submit">
								<?php endif;?>
							</form>
						</div>
					</div>
					<div class="col-sm-4">
						
					</div>					
				</div>
				<?php else: ?>
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
						<h4>Comanda a fost efectuata cu succes</h4>
					</div>
					<div class="col-md-4">

					</div>
				<?php endif; ?>
			</div>
	</section> <!--/#cart_items-->

	
<?php include_once(ROOT . "/views/blocks/footer.php") ?>