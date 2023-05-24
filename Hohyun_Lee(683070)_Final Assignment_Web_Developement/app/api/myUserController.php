<?php
require __DIR__ . '/../services/userservice.php';


class MyUserController{

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function deleteUser()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $object = json_decode($body);

            $id = htmlspecialchars($object->id);
            $this->userService->deleteUser($id);

            echo json_encode($this->userService->getAll());

        }
    }
}
