<?php
require __DIR__ . '/../services/modelservice.php';


class MyModelController
{

    function __construct()
    {
        $this->modelService = new ModelService();
    }

    public function deleteModel()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $object = json_decode($body);
            $id = htmlspecialchars($object->id);
            $type = htmlspecialchars($object->type);

//            $modelFromBooking = $this->modelService->getModelByIdFromBooking($id);
            $this->modelService->deleteModel($id);

            echo json_encode($this->modelService->getModelByType($type));

        }

    }

    public function deleteBooking()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $object = json_decode($body);

            $id = htmlspecialchars($object->id);
            $this->modelService->deleteBooking($id);

            echo json_encode($this->modelService->getBooking());
        }
    }

    public function confirmBooking()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $object = json_decode($body);

            $id = htmlspecialchars($object->id);
            $this->modelService->confirmBooking($id);

            echo json_encode($this->modelService->getBooking());
        }
    }
}
