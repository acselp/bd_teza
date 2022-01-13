<?php

return array(
    
    

    // 'producer' => 'producer/showAll',
    "cart/remove/all/([0-9]+)" => "cart/removeProductAll/$1",
    "cart/remove/([0-9]+)" => "cart/removeProduct/$1",
    "cart/add/([0-9]+)/([a-z]+)" => "cart/addProduct/$1/$2",
    "cart" => "cart/index",

    
    //Vanzatori
    "seller/product/add" => "sellerProduct/addProd",
    "seller/product/edit/([0-9]+)" => "sellerProduct/editProd/$1",
    "seller/product/remove/([0-9]+)" => "sellerProduct/removeProd/$1",
    "seller/product" => "sellerProduct/showAllForCurrProd",


   
    //Pentru User
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    //Cabinet
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'product/detail/([0-9]+)' => 'product/detail/$1',
    'product' => 'product/showAll',

    //Pagina de baza HOME
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
   
);
