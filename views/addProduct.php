<?php include ROOT . '/views/blocks/head.php'; ?>
<?php include ROOT . '/views/blocks/header.php'; ?>


<?php if($added): ?>
    <h3 style="margin: auto;margin-top: 0">Produsul a fost adaugat cu succes</h3>
<?php elseif($edited): ?>
    <h3 style="margin: auto;margin-top: 0">Produsul a fost modificat cu succes</h3>
<?php else:?>
<section class="edit-user-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                    <div class="signup-form"><!--sign up form-->
                        <h2><?php if($addPg) {echo "Agaugati un produs";} else {echo "Editati produsul";}?></h2>
                        <form action="#" method="post">
                            <input type="text" name="den" value="<?php if($editPg){echo $den;}?>" placeholder="Denumire"/>
                            <input type="text" name="pret" value="<?php if($editPg){echo $pret;}?>" placeholder="Pret"/>
                            <input type="date" id="start" name="fabr"
                                    value="<?php if($editPg){echo $fabr;}?>"
                                    min="2021-01-01" max="2022-12-22">
                            <input type="text" name="term" value="<?php if($editPg){echo $term;}?>" placeholder="Termen de valabilitate (zile)"/>
                            <select name="unit" id="">
                                <option value="<?php if($editPg){echo $unit;}?>"><?=$unitName?></option>
                                <option value="<?=$otherUnit?>"><?=$otherUnitName?></option>
                                <option value="">--Unitatea de masura--</option>
                            </select>
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