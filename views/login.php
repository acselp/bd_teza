<!DOCTYPE html>
<html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/head.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>


<?php if(isset($_SESSION['user'])): ?>
    <h3 style="margin: auto;margin-top: 0">Now you are logged in</h3>
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
                        <?php endif;?>
                        <div class="login-form">
                            <h2>Logare</h2>
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="E-mail"/>
                                <input type="password" name="password" placeholder="Password"/>
                                <input type="submit" name="submit" class="btn btn-default" value="submit"/>
                            </form>
                        </div>
                    
                       
                    
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>
</html>