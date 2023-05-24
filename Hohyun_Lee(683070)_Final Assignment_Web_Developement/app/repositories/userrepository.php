<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository {

    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function deleteUser($selected_id){
        try{
            $stmt = $this->connection->prepare("DELETE FROM user WHERE id = :id");

            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e;
        }
    }
    function editUser($selected_id,$editName,$editPhoto){
        try{
            $stmt = $this->connection->prepare("UPDATE user SET name = :name, image = :image WHERE id = :id");

            $stmt->bindValue(':name',$editName);
            $stmt->bindValue(':image',$editPhoto);
            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e;
        }
    }
    function getUserById($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $userById = $stmt->fetchAll();

            return $userById;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}