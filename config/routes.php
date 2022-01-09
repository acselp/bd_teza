<?php

return array(
    
    // 'product' => 'product/showAll',

    // 'producer' => 'producer/showAll',

    //Vanzatori
    "seller/product/add" => "sellerProduct/addProd",
    "seller/product/edit/([0-9]+)" => "sellerProduct/editProd/$1",
    "seller/product/remove/([0-9]+)" => "sellerProduct/removeProd/$1",
    "seller/product" => 'sellerProduct/showAllForCurrProd',
     
   
    //Pentru User
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    //Cabinet
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    
    //Pagina de baza HOME
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
   
);
