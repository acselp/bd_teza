<!DOCTYPE html>

	<?php include(ROOT . "/views/blocks/head.php")?>
    <?php include(ROOT . "/views/blocks/header.php")?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						if(isset($prodData)):
							if(!empty($prodData)):
								foreach($prodData as $prod): ?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="75" height="75" src="<?=$prod['prod_img']?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$prod['denumire_prod']?></a></h4>
								<p>ID: <?=$prod['id_produs']?></p>
							</td>
							<td class="cart_price">
								<p><?=$prod['pret']?> MDL</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="/cart/add/<?=$prod['id_produs']?>/cart"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?=$products[$prod['id_produs']]?>" autocomplete="off" size="2">
									<?php if($products[$prod['id_produs']] > 1):?>
										<a class="cart_quantity_down" href="/cart/remove/<?=$prod['id_produs']?>/cart"> - </a>
									<?php else: ?>
										<a class="cart_quantity_down" href="/cart/remove/all/<?=$prod['id_produs']?>/cart"> - </a>
									<?php endif; ?>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=$totalPerProd[$prod['id_produs']]?> MDL</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/cart/remove/all/<?=$prod['id_produs']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
								endforeach;
							endif;
						endif;
						?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total: <span><?=$total?> MDL</span></li>
						</ul>
							<a class="btn btn-default update" href="">Confirm</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include(ROOT . "/views/blocks/footer.php")?>