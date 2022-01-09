<?php

class NewsController {


    public function actionShowAll() {
        echo "NewsController all news";
        return true;
    }

    public function actionShowOne($category, $id) {
        echo "NewsController only one news width<br>
        category: $category<br>id: $id";
        return true;
    }
}