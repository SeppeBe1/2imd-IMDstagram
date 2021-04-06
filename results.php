<?php 
    namespace src;
    spl_autoload_register();

    if(isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $search = new classes\Search();
        $results = $search->searchParam($keyword);
        foreach($results as $key) {
            echo $key['username'] . " " . $key['description'] . '<br>'; //nog aan te passen voor resultaten weer te geven
        }
    }

?> 