<?php
require __DIR__ . '/../repositories/loginrepository.php';


class LoginService {

    public function check_user($email){
        $repository = new LoginRepository();
        return $repository->check_user($email);

    }
    public function insert_user($data){
        $repository = new LoginRepository();
        $repository->insert_user($data);
    }
    public function isUserValid($email,$password):?User{
        $repository = new LoginRepository();
        return $repository->isUserValid($email,$password);
    }
}