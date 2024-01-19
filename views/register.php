<!DOCTYPE html>
<html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/head.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>


<?php if($registered): ?>
    <h3 style="margin: auto;margin-top: 0">Registrarea a avut loc cu succes</h3>
<?php else: ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
               
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Registrare</h2>
                        <form action="#" method="post">
                            <input type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>"/>
                            <input type="text" name="lname" placeholder="Last name" value="<?php echo $lname; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="text" name="adress" placeholder="Adress" value="<?php echo $adress; ?>"/>
                            <select name="type">
                                <option value="">--Tip user--</option>
                                <option value="Cumparator">Cumparator</option>
                                <option value="Vanzator">Vanzator</option>
                            </select>
                            <input type="text" name="nr_contact" placeholder="Contact number" value="<?php echo $nr_contact; ?>"/>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
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