<?php include ROOT . "/views/blocks/head.php"?>
<?php include ROOT . "/views/blocks/header.php"?>

<?php if(isset($deleted) && $deleted): ?>
    <h3 style="text-align: center; margin: auto;margin-top: 0">
        Produsul a fost sters cu succes<br>
        <a style="margin: auto;margin-top: 0" href="/seller/product">Produse <- inapoi</a>
    </h3>
<?php else: ?>

<section class="margin-bottom-150">
    <div class="row">
        <div class="container">

        <div class="container">
            <div class="row">
                
                
                <div class="col-md-12">
                <a style="margin: auto;margin-top: 0" href="/cabinet">Cabinet <- inapoi</a><br><br><br>
                <a href="/seller/product/add"> + Adauga produs</a>
                <h3>Produsele dumneavoastra</h3>
                <div class="table-responsive">

                        
                    <table id="mytable" class="table table-bordred table-striped">
                        
                        <thead>
                            <th>Id produs</th>
                                <th>Denumire</th>
                                <th>Pret</th>
                                <th>Data fabricarii</th>
                                <th>Termen de valabilitate</th>
                                <th>Data adaugarii</th>
                                <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                        
                            <?php foreach($prodList as $prod): ?>
                                <tr>
                                    <td><?=$prod['id_produs']?></td>
                                    <td><a href="/product/detail/<?=$prod['id_produs']?>"><p><?=$prod['denumire_prod']?></p></a></td>
                                    <td><?=$prod['pret']?></td>
                                    <!-- <td><?//=$prod['fname'] . ' ' . $prod['lname'] ?></td> -->
                                    <td><?=$prod['data_fabr']?></td>
                                    <td><?=$prod['term_val'] . " zile"?></td>
                                    <td><?=$prod['data_adaug']?></td>
                                    <td><a href="/seller/product/edit/<?=$prod['id_produs']?>"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="/seller/product/remove/<?=$prod['id_produs']?>"><img class="menu_icon delete_icon" src="/template/images/trash.png" alt=""></a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                            
                    </table>

                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </ul>
                        
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
                <div class="modal-body">
                <div class="form-group">
                <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">
                
                <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
            
                
                </div>
            </div>
                <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
                </div>
            <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
            </div>
            
            
            
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
                <div class="modal-body">
            
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
            
            </div>
                <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
                </div>
            <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php include ROOT . "/views/blocks/footer.php"?>