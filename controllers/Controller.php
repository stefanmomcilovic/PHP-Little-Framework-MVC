<?php
require __DIR__."/../models/Model.php";

// All your models will be loaded up here and you will just initiate them in the constructor to be able to use them in your controllers //
class Controller {
    
    public function __construct(){
        $this->name_whatever_you_want = new YourModel();
    }

    /****  Loading views ****
        For example, if you just load a page you will see the home screen http://localhost, if you want to load another page you will go like http://localhost/?page=(Name of your page) that you will put in switch case.

        Example http://localhost/?page=about, if someone put a page that doesn't exist http://localhost/?page=somethingother it will show them 404 page as default.
    */
    public function __invoke(){
        $page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : "home";

        switch ($page) {
            case "home":
                $title = "Home of SOW APP";

                require __DIR__."/../views/includes/main-header.php"; 
                    require __DIR__."/../views/home.php"; 
                require __DIR__."/../views/includes/main-footer.php";
            break;

            case "about":
                echo "This is about page!";
            break;

            default:
                require __DIR__."/../views/errors/404.php"; 
            break;
        }
    }
}