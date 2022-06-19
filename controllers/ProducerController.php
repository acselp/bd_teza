<?php

    class ProducerController {

        public function actionShowAll() {

            include ROOT . "/views/producers.php";
            return true;
        }
    }