<?php

return array(

    //Logare registrare
    "user/login" => "user/login",
    "user/register" => "user/register",


    "product/show/([0-9]+)" => "product/showById/$1",
    "product/show/" => "product/showAll",
    "product" => "product/showAll",
    

    //Pagina principala
    "" => "site/index"
);