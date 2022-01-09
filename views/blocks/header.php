<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <?php include_once(ROOT . "/models/User.php");?>
                            <?php if(isset($_SESSION['user'])):?>
                                <li><a href="#">
                                    Salut, <?=User::getUserDataById($_SESSION['user'])['fname'];?>
                                </a></li>
                            <?php endif;?>
                            
                            <li><a href="#"><i class="fa fa-phone"></i>
                            <?php if(isset($_SESSION['user'])):
                                echo User::getUserDataById($_SESSION['user'])['contact_nr'];
                            endif;?>
                            </a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>
                            <?php if(isset($_SESSION['user'])):
                                echo User::getUserDataById($_SESSION['user'])['email'];
                            endif;?>
                             
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo pull-left">
                        <a href="/"><img src="/template/images/home/logo.png" alt="" /></a>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/index.php">Home</a></li>
                            <li class="dropdown"><a href="#">Market<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/producer">Producers</a></li>
                                    <li><a href="#">Cart</a></li> 
                                </ul>
                            </li> 
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav my-nav">                                    
                            <li class="active"><a href="#"><i class="fa fa-shopping-cart active"></i> Cart</a></li>
                            <li class="<?php if(isset($_SESSION['user'])) {echo "active";}?>"><a href="/cabinet"><i class="fa fa-user"></i> Cabinet</a></li>
                            <li class="active"><a href="/user/register"> <img src="/template/images/user-plus.png" style="width: 1em; height: auto;" alt="">  Create Account</a></li>
                            <li class="<?php if(!isset($_SESSION['user'])) {echo "active";} else{echo "";}?>"><a href="/user/login"><i class="fa fa-lock"></i> Login</a></li>
                            <li class="<?php if(isset($_SESSION['user'])) {echo "active";}?>"><a href="/user/logout"><i class="fa fa-unlock"></i> Logout</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    
</header><!--/header-->