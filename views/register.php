<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Vati inregistrat cu succes!!!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Intregistrativa</h2>
                        <form action="#" method="post">
                            <input type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>"/>
                            <input type="text" name="lname" placeholder="Last name" value="<?php echo $lname; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="text" name="adress" placeholder="Adress" value="<?php echo $adress; ?>"/>
                            <select name="type">
                                <option value="Cumparator">Cumparator</option>
                                <option value="Vanzator">Vanzator</option>
                            </select>
                            <input type="text" name="nr_contact" placeholder="Contact number" value="<?php echo $nr_contact; ?>"/>
                            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Submit" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>