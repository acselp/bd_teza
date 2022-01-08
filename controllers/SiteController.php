<?php

class SiteController {

    public function actionIndex() {
        
        $pageData['title'] = "Main";
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/index.php");

        return true;
    }

}