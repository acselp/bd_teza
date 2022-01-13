    <?php include(ROOT . "/views/blocks/head.php")?>
    <?php include(ROOT . "/views/blocks/header.php")?>
    

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                            </div><!--/category-products-->

                        </div>
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
                                            <label>Cantitate:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Adauga în coș
                                            </button>
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
        
        <?php include(ROOT . "/views/blocks/footer.php")?>
    </body>
</html>