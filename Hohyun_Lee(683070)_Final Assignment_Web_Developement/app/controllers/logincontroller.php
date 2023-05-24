<?php
require __DIR__ . '/../services/loginservice.php';

class LoginController
{
    private $loginService;

    // initialize services
    function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function register()
    {
        require __DIR__ . '/../views/login/register.php';
        if (isset($_POST['registerBtn'])) {
            $this->signup();
        }
    }
    function signup()
    {
        $email=htmlspecialchars($_POST['email']);

        $count=$this->loginService->check_user($email);
        if($count > 0){
            echo "<script>alert('This user credential is already existed in the database')</script>";
        }
        else{
            $file = $_FILES['createUserImage'];
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newImageName = uniqid() . '.' . $ext;
            $upload_dir = __DIR__ . '/../public/image/';
            $success = move_uploaded_file($file['tmp_name'], $upload_dir . $newImageName);

            if ($success) {
                // File has been successfully uploaded and moved to the desired folder
                $data = array(
                    'email' => htmlspecialchars($_POST['email']),
                    'name' => htmlspecialchars($_POST['name']),
                    'hashedPassword' => password_hash(htmlspecialchars($_POST['hashedPassword']), PASSWORD_DEFAULT),
                    'types' => htmlspecialchars($_POST['types']),
                    'image' => htmlspecialchars('/image/' . $newImageName)
                );
                $this->loginService->insert_user($data);
                echo "<script>alert('Successfully registered, please login with new user credentials')</script>";
                echo "<script>location.href='/home/login'</script>";
            }
        }
    }

    public function isUserValid()
    {
        $_SESSION['id'] = null;
        $_SESSION['types'] = "guest";
        require __DIR__ . '/../views/login/index.php';

        if (isset($_POST['loginBtn'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['hashedPassword']);

            $user = $this->loginService->isUserValid($email, $password);

            if ($user) {

                $_SESSION['id'] = $user->getId();
                $_SESSION['types'] = $user->getTypes();

                echo "<script>location.href='/home/index'</script>";
            } else {
                $_SESSION['id'] = null;
                echo "<script>alert('wrong user credential')</script>";
            }
        }
    }
}
