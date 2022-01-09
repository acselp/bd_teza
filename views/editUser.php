<?php include ROOT . '/views/blocks/header.php'; ?>


<?php if($edited): ?>
    <h3 style="margin: auto;margin-top: 0">Datele au fost modificate cu succes</h3>
<?php else: ?>

<section class="edit-user-section">
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
                        <h2>Modificare date</h2>
                        <form action="#" method="post">
                            <input type="text" name="fname" placeholder="First name" value="<?php echo $userData['fname']; ?>"/>
                            <input type="text" name="lname" placeholder="Last name" value="<?php echo $userData['lname']; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $userData['email']; ?>"/>
                            <input type="text" name="adress" placeholder="Adress" value="<?php echo $userData['adress']; ?>"/>
                            <select name="type" value="Cumparator">
                                <option value="<?=$userData['type']?>"><?=$userData['type']?></option>
                                <option value="Vanzator"><?=$otherType?></option>
                                <option value="">--Tipul user--</option>
                            </select>
                            <input type="text" name="nr_contact" placeholder="Contact number" value="<?php echo $userData['contact_nr']; ?>"/>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $userData['password']; ?>"/>
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