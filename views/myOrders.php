<!DOCTYPE html>
<html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/head.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Orders.php'; ?>

<?php if(isset($deleted) && $deleted): ?>
    <h3 style="text-align: center; margin: auto;margin-top: 0">
        Produsul a fost sters cu succes<br>
        <a style="margin: auto;margin-top: 0" href="/seller/product">Comenzi <- inapoi</a>
    </h3>
<?php else: ?>

<section class="margin-bottom-150">
    <div class="row">
        <div class="container">

        <div class="container">
            <div class="row">
                
                
                <div class="col-md-12">
                <a style="margin: auto;margin-top: 0" href="/cabinet">Cabinet <- inapoi</a><br><br><br>
                <h3>Comenzile dumneavoastra</h3>
                <div class="table-responsive">

                        
                    <table id="mytable" class="table table-bordred table-striped">
                        
                        <thead>
                            <?php if(!$seller): ?>
                                <th>Id comanda</th>
                                <th>Data</th>
                                <th>Suma totala</th>
                                <th>Produse</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            <?php else: ?>
                                <th>Id comanda</th>
                                <th>Cumparator</th>
                                <th>Nr_tel</th>
                                <th>Data</th>
                                <th>Suma totala</th>
                                <th>Produse</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            <?php endif; ?>

                        </thead>

                        <tbody>
                                <?php if(!$seller): ?>
                                    <?php foreach($orderList as $order): ?>
                                        <tr>
                                            <td><?=$order['id']?></td>
                                            <td><?=$order['date']?></td>
                                            <td><?=$summ = Orders::getTotalSummOrder($id, $order['id']);?></td>
                                            <td><a href="/order/products/<?=$order['id']?>">Produse</a></td>
                                            <td><a href="/seller/product/edit/<?=$prod['id_produs']?>"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="/seller/product/remove/<?=$prod['id_produs']?>"><img class="menu_icon delete_icon" src="/template/images/trash.png" alt=""></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php foreach($orderList as $order): ?>
                                        <tr>
                                            <td><?=$order['id']?></td>
                                            <td><?=$order['fname'] . $order['lname']?></td>
                                            <td><?=$order['tel']?></td>
                                            <td><?=$order['date']?></td>
                                            <td><?=$order['summ']?></td>
                                            <td><a href="#">Produse</a></td>
                                            <td><a href="/seller/product/edit/<?=$prod['id_produs']?>"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="/seller/product/remove/<?=$prod['id_produs']?>"><img class="menu_icon delete_icon" src="/template/images/trash.png" alt=""></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                           

                        </tbody>
                            
                    </table>

                    <div class="clearfix"></div>
                    
                        
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>
</html>