<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    public function getAll()
    {
        $repository = new UserRepository();
        return $repository->getAll();
    }
    public function deleteUser($selected_id){
        $repository = new UserRepository();
        $repository->deleteUser($selected_id);
    }
    public function editUser($selected_id,$editName,$editPhoto){
        $repository = new UserRepository();
        $repository->editUser($selected_id,$editName,$editPhoto);
    }
    public function getUserById($userId) {
        $repository = new UserRepository();
        return $repository->getUserById($userId);
    }
}