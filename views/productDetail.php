<!DOCTYPE html>
<html lang="en">
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/blocks/head.php"); ?>

        
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/blocks/header.php"); ?>
    <body>
    

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?=$prodData['prod_img']?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2><?=$prodData['denumire_prod']?></h2>
                                        <p>Id produs: <?=$prodData['id_produs']?></p>
                                        <span>
                                            <span><?=$prodData['pret'] . ' MDL / ' . $unit['unit']?></span>
                                            <a href="/cart/add/<?=$prodData['id_produs']?>"><button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Adauga în coș
                                            </button></a>
                                        </span>
                                        <p><b>Disponibilitate:</b> <?=$disp['nume_disp']?></p>
                                        <p><b>Producator:</b> <?=$producator['fname'] . " " . $producator['lname']?></p>
                                        <p><b>Termen de valabilitate:</b> <?=$prodData['term_val']?></p>
                                        <p><b>Data fabricării:</b> <?=$prodData['data_fabr']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Descrierea produsului</h5>
                                    <p>
                                        <?=$prodData['description']?>
                                    </p>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>
    </body>
</html>