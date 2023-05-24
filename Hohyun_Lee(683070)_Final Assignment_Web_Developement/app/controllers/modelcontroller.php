<?php
require __DIR__ . '/../services/modelservice.php';
require __DIR__ . '/controller.php';

class ModelController extends controller
{
    private $modelService;
    private $selected_id;

    function __construct()
    {
        $this->modelService = new ModelService();
    }

    public function editModel()
    {
        $modelId = htmlspecialchars($_POST['id']);
        $modelById = $this->modelService->getModelById($modelId);

        if($modelId == null){
            echo "<script>alert('Please Select Model Again')</script>";
            echo "<script>location.href='/home'</script>";
        }

        if (isset($_POST['editBtn']) && isset($_POST['editModelName'])) {
            if (!empty($_FILES['editModelImage']['name'])) {
                $file = $_FILES['editModelImage'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newImageName = uniqid() . '.' . $ext;
                $upload_dir = __DIR__ . '/../public/image/';
                $success = move_uploaded_file($file['tmp_name'], $upload_dir . $newImageName);

                if ($success) {

                    $selected_id = htmlspecialchars($_POST['id']);
                    $editName = htmlspecialchars($_POST['editModelName']);
                    $editPhoto = htmlspecialchars('/image/' . $newImageName);
                    $this->modelService->editModel($selected_id, $editName, $editPhoto);
                    echo "<script>alert('Successfully edited')</script>";
                    echo "<script>location.href='/home'</script>";
                }
            }
            else{
                echo "<script>alert('Please fill out every form to edit model information')</script>";
                echo "<script>location.href='/home'</script>";
            }
        }
        require __DIR__ . '/../views/article/modelEditing.php';
    }
    public function bookModels()
    {

        $selected_id = htmlspecialchars($_POST['id']);
        $modelById = $this->modelService->getModelById($selected_id);
        $errorMessage ="";

        if($selected_id == null){
            echo "<script>alert('Please Select Model Again')</script>";
            echo "<script>location.href='/home'</script>";
        }

        if (isset($_POST['requestBtn'])) {
            $current_date = new DateTime();

            $bookingDate = htmlspecialchars($_POST['bookingDate']);
            $date = DateTime::createFromFormat('Y-m-d', $bookingDate);
            $client_id = htmlspecialchars($_SESSION['id']);
            if($selected_id == null){
                echo "<script>alert('Please Select Model Again')</script>";
                echo "<script>location.href='/home'</script>";
            }
            else if($date < $current_date){
                $errorMessage = "Please select a date that is not in the past";
            }
            else if($date === false || array_sum($date->getLastErrors()) > 0){
                $errorMessage = "please input a valid date format (YYYY-MM-DD) for birthdate";
            }
            else{
                $this->modelService->bookModels($client_id, $selected_id,$bookingDate);
                echo "<script>alert('Your booking is successfully requested')</script>";
                echo "<script>location.href='/home'</script>";
            }
        }
        require __DIR__ . '/../views/article/modelBooking.php';
    }

    public function getModelByType($type)
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $_SESSION['message'] = "";
        $_SESSION['modelId'] ="";
        $model = $this->modelService->getModelByType(htmlspecialchars($type));
        $this->respond($model);

        $_SESSION['type'] = htmlspecialchars($type);
//        echo $_SESSION['id'];

//        require __DIR__ . '/../views/article/index.php';
    }

    public function createModel()
    {
        $errorMessage = "";
        // Respond to a POST request to /api/article
        if (isset($_POST['createBtn'])) {
            if (empty($_FILES['createModelImage']['size'])) {
                $errorMessage = "Please select an image";
            } else {
                $file = $_FILES['createModelImage'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newImageName = uniqid() . '.' . $ext;
                $upload_dir = __DIR__ . '/../public/image/';
                $success = move_uploaded_file($file['tmp_name'], $upload_dir . $newImageName);
                if ($success) {
                    if (filter_var($_POST['createModelAge'], FILTER_VALIDATE_INT) === false) {
                        $errorMessage = "please input only number for age";
                    } else {
                        $birthDate = htmlspecialchars($_POST['createModelBirthDate']);
                        $date = DateTime::createFromFormat('Y-m-d', $birthDate);
                        if ($date === false || array_sum($date->getLastErrors()) > 0) {
                            $errorMessage = "please input a valid date format (YYYY-MM-DD) for birthdate";
                        } else {
                            $data = array(
                                'name' => htmlspecialchars($_POST['createModelName']),
                                'age' => htmlspecialchars($_POST['createModelAge']),
                                'type' => htmlspecialchars($_POST['createModelType']),
                                'birthDate' => htmlspecialchars($birthDate),
                                'image' => htmlspecialchars('/image/' . $newImageName),
                            );
                            $this->modelService->createModel($data);
                            echo "<script>alert('Model is successfully added to the system')</script>";
                            echo "<script>location.href='/home'</script>";
                        }
                    }
                }
            }
        }
        require __DIR__ . '/../views/article/createModel.php';
    }

    public function manageModelBooking()
    {
        $booking = $this->modelService->getBooking();

        require __DIR__ . '/../views/article/manageBooking.php';
    }
    public function deleteModelById($id){
        $this->modelService->deleteModelById($id);

        $this->respond(true);
    }

}