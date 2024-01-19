<!DOCTYPE html>
<html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/head.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>


<?php if($added): ?>
    <h3 style="text-align: center; margin: auto;margin-top: 0">
        Produsul a fost adaugat cu succes<br>
        <a style="margin: auto;margin-top: 0" href="/seller/product">Produse <- inapoi</a>
    </h3>
    
<?php elseif($edited): ?>
    <h3 style="text-align: center; margin: auto;margin-top: 0">
        Produsul a fost modificat cu succes<br>
        <a style="margin: auto;margin-top: 0" href="/seller/product">Produse <- inapoi</a>
    </h3>
<?php else:?>
<section class="edit-user-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                    <div class="signup-form"><!--sign up form-->
                    <a style="margin: auto;margin-top: 0" href="/seller/product">Produse <- inapoi</a><br><br>
                        <h2><?php if($addPg) {echo "Agaugati un produs";} else {echo "Editati produsul";}?></h2>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <input type="text" name="den" value="<?php if($editPg){echo $den;}?>" placeholder="Denumire"/>
                            <input type="text" name="pret" value="<?php if($editPg){echo $pret;}?>" placeholder="Pret"/>
                            <input type="date" id="start" name="fabr"
                                    value="<?php if($editPg){echo $fabr;}?>"
                                    min="2021-01-01" max="2022-12-22">
                            <input type="text" name="term" value="<?php if($editPg){echo $term;}?>" placeholder="Termen de valabilitate (zile)"/>
                            <select name="unit" id="">
                                <?php if(isset($editPg) && $editPg):?>
                                    <option value="<?=$unit?>"><?=$unitName?></option>
                                    <option value="<?=$otherUnit?>"><?=$otherUnitName?></option>
                                    <option value="">--Unitatea de masura--</option>
                                <?php else: ?>
                                    <option value="">--Unitatea de masura--</option>
                                    <option value="1">Kg</option>
                                    <option value="2">Litri</option>
                                <?php endif; ?>
                            </select>
                            <input type="file" name="prod_img">
                            <textarea style="margin-bottom: 10px;" placeholder="Descriere..." name="description" id="" cols="30" rows="5"></textarea>
                            <?php if($editPg): ?>
                                <div class="availability">
                                    <p>Disponibilitate:</p>
                                    <div>
                                        <input type="radio" id="disp" name="disp" value="1" checked>
                                        <label for="disp">În stoc</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="non_disp" name="disp" value="2">
                                        <label for="non_disp">Indisponibil</label>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            <input type="submit" name="submit" class="btn btn-default" value="Submit" />
                        </form>
                    </div><!--/sign up form-->
                
           
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
<?php endif;?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>
</html>