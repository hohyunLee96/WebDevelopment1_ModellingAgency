<?php
class SwitchRouter {
    public function route($uri) {

        $uri = $this->stripParameters($uri);

        switch($uri) {
            case 'login/register':
                require __DIR__ . '/../controllers/logincontroller.php';
                $controller = new LoginController();
                $controller->register();
                break;
            case 'home':
            case 'home/index':
                require __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;
            case 'home/model/male':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->getModelByType("male");
                break;
            case 'home/model/female':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->getModelByType("female");
                break;
            case 'home/model/curvy':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->getModelByType("curvy");
                break;
            case 'home/model/vegetarian':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->getModelByType("vegetarian");
                break;
            case 'home/model/booking':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->bookModels();
                break;
            case 'home/model/editing':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->editModel();
                break;
            case 'home/user/editing':
                require __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->editUser();
                break;
            case '':
            case 'home/login':
                require __DIR__ . '/../controllers/logincontroller.php';
                $controller = new LoginController();
                $controller->isUserValid();
                break;
            case 'api/deletemodel':
                require __DIR__ . '/../api/myModelController.php';
                $controller= new MyModelController();
                $controller->deleteModel();
                break;
            case 'api/deletebooking':
                require __DIR__ . '/../api/myModelController.php';
                $controller= new MyModelController();
                $controller->deleteBooking();
                break;
            case 'api/confirmbooking':
                require __DIR__ . '/../api/myModelController.php';
                $controller= new MyModelController();
                $controller->confirmBooking();
                break;
            case 'home/user/managing':
                require __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->index();
                break;
            case 'api/deleteuser':
                require __DIR__ . '/../api/myUserController.php';
                $controller = new MyUserController();
                $controller->deleteUser();
                break;
            case 'home/createmodel':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller= new ModelController();
                $controller->createModel();
                break;
            case 'home/booking/managing':
                require __DIR__ . '/../controllers/modelcontroller.php';
                $controller = new ModelController();
                $controller->manageModelBooking();
                break;
            default:
            http_response_code(404);
        }

    }

    private function stripParameters($uri) {
        if(str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}