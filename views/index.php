<!DOCTYPE html>
<html lang="en">
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/blocks/head.php"); ?>

        
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/blocks/header.php"); ?>
    <body>
        <section>
            <div class="container">
                <div class="row">
                    <!-- <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Categories</h2>
                            <div class="panel-group category-products">
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    </div> -->

                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            

                            <?php foreach($products as $prod): ?>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="/product/detail/<?=$prod['id_produs']?>"><img src="<?=$prod['prod_img']?>" alt="" /></a>
                                                <h2><?=$prod['pret']?></h2>
                                                <a href="/product/detail/<?=$prod['id_produs']?>"><p><?=$prod['denumire_prod']?></p></a>
                                                <a href="/cart/add/<?=$prod['id_produs']?>/index.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div><!--features_items-->

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">	


                                    


                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
                            </div>
                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

        <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/blocks/footer.php"); ?>
    </body>
</html>