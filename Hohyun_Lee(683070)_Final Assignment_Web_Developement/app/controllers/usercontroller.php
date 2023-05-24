<?php
require __DIR__ . '/../services/userservice.php';

class UserController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }
    public function index()
    {
        $user = $this->userService->getAll();

        require __DIR__ . '/../views/user/manageUser.php';
    }
    public function editUser()
    {
        $userId = htmlspecialchars($_POST['id']);
        $userById = $this->userService->getUserById($userId);

        if($userId == null){
            echo "<script>alert('Please Select User Again')</script>";
            echo "<script>location.href='/home'</script>";
        }
        if (isset($_POST['editUserBtn']) && isset($_POST['editUserName'])) {
            if (!empty($_FILES['editUserImage']['name'])) {
                $file = $_FILES['editUserImage'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newImageName = uniqid() . '.' . $ext;
                $upload_dir = __DIR__ . '/../public/image/';
                $success = move_uploaded_file($file['tmp_name'], $upload_dir . $newImageName);

                if ($success) {
                    $selected_id = htmlspecialchars($_POST['id']);
                    $editName = htmlspecialchars($_POST['editUserName']);
                    $editPhoto = htmlspecialchars('/image/' . $newImageName);

                    $this->userService->editUser($selected_id,$editName,$editPhoto);
                    echo "<script>alert('User is successfully edited')</script>";
                    echo "<script>location.href='/home/user/managing'</script>";
                }
            }
            else{
                echo "<script>alert('Please fill out every form to edit user information')</script>";
                echo "<script>location.href='/home'</script>";
            }
        }
        require __DIR__ . '/../views/user/userEditing.php';
    }
}